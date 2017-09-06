<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="comments")
 */
class Comments {

    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\Column(name="tvirti_id")
     */
    protected $tvirti_id;
    
    /**
     * @ORM\ManyToOne(targetEntity="\Application\Entity\User", inversedBy="users")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;
    
    /**
     * @ORM\Column(name="comment")
     */
    protected $comment;
    
    /**
     * @ORM\Column(name="add_date")
     */
    protected $add_date;
    
    
    public function getID(){
        return $this->id;
    }
    
    public function getTvirti_id(){
        return $this->tvirti_id;
    }
    
    public function getUser(){
        return $this->user;
    }
    
    public function getComment(){
        return $this->comment;
    }
    
    public function getAddDate(){
        return $this->add_date;
    }

}
