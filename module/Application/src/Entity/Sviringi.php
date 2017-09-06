<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="sviringi")
 */
class Sviringi {

    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(name="ipaddr")
     */
    protected $ipaddr;

    /**
     * @ORM\Column(name="title")
     */
    protected $title;

    /**
     * @ORM\Column(name="desc")
     */
    protected $desc;

    /**
     * @ORM\Column(name="create_date")
     */
    protected $create_date;

    /**
     * @ORM\Column(name="photo")
     */
    protected $photo;

    public function getId() {
        return $this->id;
    }

    public function getIpaddr() {
        return $this->ipaddr;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDesc() {
        return $this->desc;
    }

    public function getCreatedate() {
        return $this->create_date;
    }

    public function setIpaddr($ipaddr) {
        $this->ipaddr = $ipaddr;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setDesc($desc) {
        $this->desc = $desc;
    }

    public function setCreatedate($create_date) {
        $this->create_date = $create_date;
    }

}
