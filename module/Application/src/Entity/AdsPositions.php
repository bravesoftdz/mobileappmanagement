<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="ads_positions")
 */
class AdsPositions {

    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     *
     * @ORM\Column(name="position_name")
     */
    protected $position_name;

    public function getID() {
        return $this->id;
    }

    public function getPositionName() {
        return $this->position_name;
    }

}
