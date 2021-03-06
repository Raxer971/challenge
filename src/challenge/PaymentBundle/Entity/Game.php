<?php

namespace challenge\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="challenge\PaymentBundle\Entity\GameRepository")
 */
class Game
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="challenge\PaymentBundle\Entity\Formule",mappedBy="game", cascade={"persist"})
     */

    private $formule;



    /**
     *@ORM\OneToOne(targetEntity="challenge\PaymentBundle\Entity\Image",inversedBy="game", cascade={"persist"})
     */
    private $image;
    /**
     * Get id
     *
     * @return integer
     */





    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Game
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lobby = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set image
     *
     * @param \challenge\PaymentBundle\Entity\Image $image
     *
     * @return Game
     */
    public function setImage(\challenge\PaymentBundle\Entity\Image $image = null)
    {
        $this->image = $image;
        $image->setGame($this);
        return $this;
    }

    /**
     * Get image
     *
     * @return \challenge\PaymentBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add formule
     *
     * @param \challenge\PaymentBundle\Entity\Formule $formule
     *
     * @return Game
     */
    public function addFormule(\challenge\PaymentBundle\Entity\Formule $formule)
    {
        $this->formule[] = $formule;

        return $this;
    }

    /**
     * Remove formule
     *
     * @param \challenge\PaymentBundle\Entity\Formule $formule
     */
    public function removeFormule(\challenge\PaymentBundle\Entity\Formule $formule)
    {
        $this->formule->removeElement($formule);
    }

    /**
     * Get formule
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFormule()
    {
        return $this->formule;
    }
}
