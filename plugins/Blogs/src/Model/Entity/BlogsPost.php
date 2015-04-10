<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BlogsPost Entity.
 */
class BlogsPost extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'titulo' => true,
        'conteudo' => true,
        'status' => true,
        'blogs_pages_posts' => true,
    ];
}
