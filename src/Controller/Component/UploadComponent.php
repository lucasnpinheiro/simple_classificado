<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;

/**
 * CakePHP UploadComponent
 * @author lucas
 */
class UploadComponent extends Component {

    /**
     * constant for error types
     * @var integer
     */
    const SUCCESS = 0;
    const FILESIZE_EXCEED_SERVER_MAX = 1;
    const FILESIZE_EXCEED_FORM_MAX = 2;
    const PARTIAL_UPLOAD = 3;
    const NO_FILE_UPLOAD = 4;
    const NO_DIRECTORY_FOR_UPLOAD = 6;
    const SERVER_WRITE_FAIL = 7;
    const FILESIZE_EXCEEDS_CODE_MAX = 98;
    const FILE_FORMAT_NOT_ALLOWED = 99;
    const DESTINATION_NOT_AVAILABLE = 100;

    /**
     * array of mime types that will be accepted by the UploadComponent
     * left empty it will accept any
     */
    public $error = [];
    private $file_types = [];
    public $filename = null;
    private $destination = null;
    private $max_size = null;
    private $content_only = false;
    private $create_destination = true;

    /**
     * component constructor - set up local vars based on settings array in controller
     */
    public function initialize(array $config) {
        parent::initialize($config);
        $this->max_size = (($this->digits(ini_get('upload_max_filesize')) * 1024) * 1024);
        if (!empty($config['file_types']))
            $this->file_types = $config['file_types'];
        if (!empty($config['max_size']))
            $this->max_size = $config['max_size'];
    }

    /**
     * set the allowed file types for this upload
     * values are passed as string arguments to the
     * method
     * @example allowed_files('image/jpg', 'image/gif', 'image/png');
     * @return UploadComponent
     */
    public function allowed_types() {
        $types = func_get_args();
        $this->file_types = $this->file_types + $types;
        return $this;
    }

    /**
     * set a custom name to use for the final uploaded file
     * if not set then the original name of the uploaded file is used
     * @param string $name
     * @return UploadComponent
     */
    public function custom_name($name) {
        $this->filename = $name;
        return $this;
    }

    /**
     * set the destination path for the uploaded file
     * @param string $path
     * @return UploadComponent
     */
    public function destination($path) {
        $d = rtrim(WWW_ROOT . 'files' . DS . rtrim(ltrim($path, DS), DS) . DS, DS) . DS;
        $this->destination = $d;
        return $this;
    }

    /**
     * set the max file size for uploads for added validation
     * if $this->max_size = 0 (default) then upload size is governed
     * by PHP.ini settings and/or form settings.
     * @param integer $size - max size of upload in bytes
     * @return UploadComponent
     */
    public function set_max_size($size) {
        $this->max_size = $size;
        return $this;
    }

    /**
     * setter for the content_only flag
     * if true then the upload is read into buffer
     * and returned rather than being written to server
     * @param boolean $flag
     * @return UploadComponent
     */
    public function content_only($flag = true) {
        $this->content_only = $flag;
        return $this;
    }

    /**
     * setter for the create destination flag. 
     * can be turned off if an error on missing destination is required
     * @param boolean $flag
     * @return UploadComponent
     */
    public function create_destination($flag = true) {
        $this->create_destination = $flag;
        return $this;
    }

    public function digits($element) {
        return (float) filter_var($element, FILTER_SANITIZE_NUMBER_INT);
    }

    /**
     * run the upload.
     * the path param is optional and can be set separately
     * @param array $form_data - The posted form data for the file element
     * @param string $path - Optionally set the destination path here
     * @return mixed - 
     */
    public function run($form_data, $path = null) {
        // silent fail on no image
        if (trim($form_data['name']) != '') {
            if ($form_data['error'] == self::NO_FILE_UPLOAD) {
                $this->error[] = $this->errors(self::NO_FILE_UPLOAD);
            }

            if (!empty($this->error)) {
                return 0;
            }

            // handle optional path passed in
            if (empty($path))
                $this->destination($path);

            $this->form_data = $form_data;

            // check we have a path - only if not returning the content
            if ($this->content_only === false) {
                if (empty($path) && empty($this->destination)) {
                    $this->form_data['error'] = self::NO_DIRECTORY_FOR_UPLOAD;
                }
            }

            // check file types
            if (!empty($this->file_types)) {
                if (!in_array($this->form_data['type'], $this->file_types)) {
                    $this->form_data['error'] = self::FILE_FORMAT_NOT_ALLOWED;
                }
            }

            // check max size set in code
            if ($this->max_size > 0 && $this->form_data['size'] > $this->max_size) {
                $this->form_data['error'] = self::FILE_SIZE_EXCEEDS_CODE_MAX;
            }

            // check error code		
            if ($this->form_data['error'] !== self::SUCCESS) {
                $this->error[] = $this->errors($this->form_data['error']);
            }
            if (!empty($this->error)) {
                return 0;
            }
            // if only content required read file and return
            if ($this->content_only) {
                return file_get_contents($this->form_data['tmp_name']);
            }

            // parse out class params to make the final destination string
            if (empty($this->filename)) {
                $ext = explode('/', $this->form_data['type']);
                $this->filename = md5($this->form_data['name'] . time()) . '.' . $ext[1];
            }

            $destination = $this->destination . $this->filename;
            // create the destination unless otherwise set
            if ($this->create_destination) {
                $dir = dirname($destination);
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }
            } else {
                $dir = dirname($destination);
                if (!is_dir($dir)) {
                    $this->error[] = $this->errors(self::DESTINATION_NOT_AVAILABLE);
                }
            }

            if (!move_uploaded_file($this->form_data['tmp_name'], $destination)) {
                $this->error[] = $this->errors(self::SERVER_WRITE_FAIL);
            }

            // if we get here without returning something has definitely gone wrong
            if (empty($this->error)) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return -1;
        }
    }

    /**
     * parse the response type and return an error string
     * @param integer $type
     * @return string - error text
     */
    private function errors($type = null) {
        switch ($type) {
            case self::FILESIZE_EXCEED_SERVER_MAX:
                return 'File size exceeds allowed size for server';
                break;
            case self::FILESIZE_EXCEED_FORM_MAX:
                return 'File size exceeds allowed size in form';
                break;
            case self::PARTIAL_UPLOAD:
                return 'File was partially uploaded. Please check your Internet connection and try again';
                break;
            case self::NO_FILE_UPLOAD:
                return 'No file was uploaded.';
                break;
            case self::NO_DIRECTORY_FOR_UPLOAD:
                return 'No upload directory found';
                break;
            case self::SERVER_WRITE_FAIL:
                return 'Failed to write to the server';
                break;
            case self::FILE_FORMAT_NOT_ALLOWED:
                return 'File format of uploaded file is not allowed';
                break;
            case self::FILESIZE_EXCEEDS_CODE_MAX:
                return 'File size exceeds maximum allowed size';
                break;
            case self::DESTINATION_NOT_AVAILABLE:
                return 'Destination path does not exist';
                break;
            default:
                return 'There has been an unexpected error, processing upload failed';
        }
    }

    public function clear() {
        $this->error = [];
        $this->file_types = [];
        $this->filename = null;
        $this->destination = null;
        $this->max_size = null;
        $this->content_only = false;
        $this->create_destination = true;
    }

}
