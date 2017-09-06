<?php

namespace Backoffice\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="users")
 */
class User {

    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(name="email")  
     */
    protected $email;

    /**
     * @ORM\Column(name="password")  
     */
    protected $password;

    /**
     * @ORM\Column(name="fullname")  
     */
    protected $fullName;

    /**
     *
     * @ORM\Column(name="age") 
     */
    protected $age;

    /**
     * @ORM\Column(name="sex")  
     */
    protected $sex;

    /**
     * @ORM\Column(name="create_date")  
     */
    protected $create_date;

    /**
     * @ORM\Column(name="reg_ip")
     */
    protected $reg_ip;
    
    /**
     * @ORM\Column(name="status_id")
     */
    protected $status_id;

    /**
     * @ORM\Column(name="reg_platform_id")
     */
    protected $reg_platform_id;

    /**
     * Returns user ID.
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }

    public function getFullName() {
        return $this->fullName;
    }

    public function setFullName($fullName) {
        $this->fullName = $fullName;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function getSex() {
        return $this->sex;
    }

    public function setSex($sex) {
        $this->sex = $sex;
    }

    public function getCreateDate() {
        return $this->create_date;
    }

    public function setCreateDate($create_date) {
        $this->create_date = $create_date;
    }

    public function getStatusId() {
        return $this->status_id;
    }

    public function setStatusId($status_id) {
        $this->status_id = $status_id;
    }
    
    public function getRegIP() {
        return $this->reg_ip;
    }

    public function setRegIP($reg_ip) {
        $this->reg_ip = $reg_ip;
    }
    
    public function getRegPlatformId() {
        return $this->reg_platform_id;
    }

    public function setRegPlatformId($reg_platform_id) {
        $this->reg_platform_id = $reg_platform_id;
    }

}