<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="users_facebook")
 */
class UserFacebook {

    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(name="user_id")  
     */
    protected $user_id;

    /**
     * @ORM\ManyToOne(targetEntity="\Application\Entity\User", inversedBy="users")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\Column(name="fullname")  
     */
    protected $fullName;

    /**
     *
     * @ORM\Column(name="external_id") 
     */
    protected $external_id;

    /**
     * @ORM\Column(name="create_date")  
     */
    protected $create_date;

    public function getId() {
        return $this->id;
    }

    public function getFullName() {
        return $this->fullName;
    }

    public function setFullName($fullName) {
        $this->fullName = $fullName;
    }

    public function getExternalId() {
        return $this->external_id;
    }

    public function setExternalId($external_id) {
        $this->external_id = $external_id;
    }

    public function getCreateDate() {
        return $this->sex;
    }

    public function setCreateDate($create_date) {
        $this->create_date = $create_date;
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }

}