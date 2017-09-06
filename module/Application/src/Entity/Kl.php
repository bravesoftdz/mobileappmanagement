<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="kl")
 */
class Kl {

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
     * @ORM\Column(name="username")
     */
    protected $username;

    /**
     * @ORM\Column(name="content")
     */
    protected $content;

    /**
     * @ORM\Column(name="create_date")
     */
    protected $create_date;

    public function getId() {
        return $this->id;
    }

    public function getIpaddr() {
        return $this->ipaddr;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getContent() {
        return $this->content;
    }

    public function getCreatedate() {
        return $this->create_date;
    }

    public function setIpaddr($ipaddr) {
        $this->ipaddr = $ipaddr;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setCreatedate($create_date) {
        $this->create_date = $create_date;
    }

}
