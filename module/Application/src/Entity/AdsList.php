<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a registered user.
 * @ORM\Entity()
 * @ORM\Table(name="ads_list")
 */
class AdsList {

    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     *
     * @ORM\Column(name="ads_content_html")
     */
    protected $ads_content_html;

    public function getID() {
        return $this->id;
    }

    public function getAdsContentHTML() {
        return $this->ads_content_html;
    }

}
