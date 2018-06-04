<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ingredient
 *
 * @ORM\Table(name="ingredient")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IngredientRepository")
 */
class Ingredient
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="denomination", type="string", length=255, unique=true)
     */
    private $denomination;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Dish", inversedBy="ingredients")
     * @ORM\JoinColumn(nullable=true)
     */

    private $dishes;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set denomination
     *
     * @param string $denomination
     *
     * @return Ingredient
     */
    public function setDenomination($denomination)
    {
        $this->denomination = $denomination;

        return $this;
    }

    /**
     * Get denomination
     *
     * @return string
     */
    public function getDenomination()
    {
        return $this->denomination;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dishes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add dish
     *
     * @param \AppBundle\Entity\Dish $dish
     *
     * @return Ingredient
     */
    public function addDish(\AppBundle\Entity\Dish $dish)
    {
        $dish->addIngredient($this);
        $this->dishes[] = $dish;

        return $this;
    }

    /**
     * Remove dish
     *
     * @param \AppBundle\Entity\Dish $dish
     */
    public function removeDish(\AppBundle\Entity\Dish $dish)
    {
        $dish->removeIngredient($this);
        $this->dishes->removeElement($dish);
    }

    /**
     * Get dishes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDishes()
    {
        return $this->dishes;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Ingredient
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
}
