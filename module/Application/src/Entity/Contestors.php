<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="contestors")
 */
class Contestors {

    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="\Application\Entity\User", inversedBy="users")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;
    
    /**
     *
     * @ORM\Column(name="contest_id")
     */
    protected $contest_id;

    /**
     * @ORM\ManyToOne(targetEntity="\Application\Entity\Contests", inversedBy="contests")
     * @ORM\JoinColumn(name="contest_id", referencedColumnName="id")
     */
    protected $contest;

    /**
     *
     * @ORM\Column(name="full_name")
     */
    protected $full_name;

    /**
     *
     * @ORM\Column(name="birth_date")
     */
    protected $birth_date;

    /**
     *
     * @ORM\Column(name="value")
     */
    protected $value;

    /**
     *
     * @ORM\Column(name="create_date")
     */
    protected $create_date;

    public function getID() {
        return $this->id;
    }

    public function setID($id) {
        $this->id = $id;
    }

    /**
     * Sets associated post.
     * @param \Application\Entity\Contest
     */
    public function getUser() {
        $this->user;
    }

    /**
     * Sets associated post.
     * @param \Application\Entity\User
     */
    public function setUser($user) {
        $this->user = $user;
    }

    /**
     * Sets associated post.
     * @param \Application\Entity\Contests
     */
    public function getContest() {
        $this->contest;
    }

    /**
     * Sets associated post.
     * @param \Application\Entity\Contests
     */
    public function setContest($contest) {
        $this->contest = $contest;
    }

    public function getFullName() {
        return $this->full_name;
    }

    public function setFullName($full_name) {
        $this->full_name = $full_name;
    }

    public function getBirthDate() {
        return $this->birth_date;
    }

    public function setBirthDate($birth_date) {
        $this->birth_date = $birth_date;
    }

    public function getValue() {
        return $this->value;
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function getCreateDate() {
        return $this->create_date;
    }

    public function setCreateDate($create_date) {
        $this->create_date = $create_date;
    }

}
