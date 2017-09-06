<?php

namespace Users\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="bids")
 */
class Bids {

    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     *
     * @ORM\Column(name="load_id")
     */
    protected $load_id;

    /**
     * @ORM\ManyToOne(targetEntity="\Bids\Entity\User", inversedBy="users")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     *
     * @ORM\Column(name="text")
     */
    protected $text;

    /**
     *
     * @ORM\Column(name="add_date")
     */
    protected $add_date;

    /**
     *
     * @ORM\Column(name="ip_addr")
     */
    protected $ip_addr;

    /*
     * Returns associated post.
     * @return \Application\Entity\User
     */

    public function getUser() {
        return $this->user;
    }

    /**
     * Sets associated post.
     * @param \Application\Entity\User
     */
    public function setUser($user) {
        $this->user = $user;
    }
    
    public function getID() {
        return $this->id;
    }
    
     public function getText() {
        return $this->text;
    }

    public function setText($text) {
        $this->text = $text;
    }
    
    public function getAddDate() {
        return $this->add_date;
    }

    public function setAddDate($AddDate) {
        $this->add_date = $AddDate;
    }
    
    public function getIpAddr() {
        return $this->ip_addr;
    }

    public function setIpAddr($ip_addr) {
        $this->ip_addr = $ip_addr;
    }
}