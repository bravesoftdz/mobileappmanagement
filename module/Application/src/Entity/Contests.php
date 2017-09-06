<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="contests")
 */
class Contests {

    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     *
     * @ORM\Column(name="contest_name")
     */
    protected $contest_name;

    /**
     *
     * @ORM\Column(name="start_date")
     */
    protected $start_date;

    /**
     *
     * @ORM\Column(name="enddate")
     */
    protected $enddate;
    

    public function getId() {
        return $this->id;
    }

    public function getContestName() {
        return $this->contest_name;
    }

    public function getStartDate() {
        return $this->start_date;
    }

    public function getEndDate() {
        return $this->enddate;
    }

}
