<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BlogsPagesPost Entity.
 */
class BlogsPagesPost extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'blogs_page_id' => true,
        'blogs_post_id' => true,
        'blogs_page' => true,
        'blogs_post' => true,
    ];
}
