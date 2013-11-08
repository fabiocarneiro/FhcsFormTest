<?php

namespace FhcsFormTest\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use FhcsFormTest\Entity\Freight;

/**
 * @ORM\Entity
 * @ORM\Table
 */
class Order {
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue 
     */
    protected $id;
    /**
     * @ORM\OneToMany(targetEntity="FhcsFormTest\Entity\Freight", mappedBy="order")
     **/
    protected $freights;
    
    function __construct() {
        $this->freights = new ArrayCollection();
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFreights() {
        return $this->freights;
    }

    public function setFreights(ArrayCollection $freights) {
        $this->freights = $freights;
    }
    
    public function addFreight(Freight $freight){
        $this->freights->add($freight);
    }
    
}