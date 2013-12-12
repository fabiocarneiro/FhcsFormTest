<?php

namespace FhcsFormTest\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use FhcsFormTest\Entity\Order;
use FhcsFormTest\Entity\Product;

/**
 * @ORM\Entity
 * @ORM\Table
 */
class Freight {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="FhcsFormTest\Entity\Order", inversedBy="features")
     * @ORM\JoinColumn
     **/
    protected $order;
    /**
     * @ORM\ManyToMany(targetEntity="FhcsFormTest\Entity\Product", cascade={"persist"})
     * @ORM\JoinTable
     *      joinColumns={@JoinColumn},
     *      inverseJoinColumns={@JoinColumn}
     *      )
     **/
    protected $products;

    function __construct() {
        $this->products = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function getOrder() {
        return $this->order;
    }

    public function setOrder(Order $order) {
        $this->order = $order;
    }

    public function getProducts() {
        return $this->products;
    }

    public function setProducts(ArrayCollection $products) {
        $this->products = $products;
    }

    public function addProduct(Product $product)
    {
        $this->products->add($product);
    }

    public function addProducts(Collection $products)
    {
        foreach ($products as $product) {
            $this->products->add($product);
        }
    }

    public function removeProducts(Collection $products)
    {
        foreach ($products as $product) {
            $this->products->removeElement($product);
        }
    }
}
