<?php

namespace Backoffice\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="pages")
 */
class Pages {

    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(name="group_id")  
     */
    protected $group_id;

    /**
     * @ORM\Column(name="lang_id")  
     */
    protected $lang_id;

    /**
     * @ORM\Column(name="title")  
     */
    protected $title;

    /**
     *
     * @ORM\Column(name="content") 
     */
    protected $content;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getGroupId() {
        return $this->group_id;
    }

    public function setGroupId($group_id) {
        $this->group_id = $group_id;
    }

    public function getLangId() {
        return $this->lang_id;
    }

    public function setLangId($lang_id) {
        $this->lang_id = $lang_id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

}
