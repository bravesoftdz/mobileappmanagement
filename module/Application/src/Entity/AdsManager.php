<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="ads_manager")
 */
class AdsManager {

    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     *
     * @ORM\Column(name="controller")
     */
    protected $controller;

    /**
     *
     * @ORM\Column(name="action")
     */
    protected $action;

    /**
     * @ORM\ManyToOne(targetEntity="\Application\Entity\AdsPositions", inversedBy="ads_positions")
     * @ORM\JoinColumn(name="position_id", referencedColumnName="id")
     */
    protected $position;

    /**
     * @ORM\ManyToOne(targetEntity="\Application\Entity\AdsList", inversedBy="ads_list")
     * @ORM\JoinColumn(name="ads_id", referencedColumnName="id")
     */
    protected $ads;

    public function getID() {
        return $this->id;
    }

    public function getController() {
        $this->id = $id;
    }

    public function getAction() {
        return $this->action;
    }

    public function getPostion() {
        return $this->position;
    }

    public function getAds() {
        return $this->ads;
    }

}
