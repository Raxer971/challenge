<?php

namespace challenge\PaymentBundle\Entity;

use challenge\PaymentBundle\Model\Orders as BaseModel;
use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="challenge\PaymentBundle\Entity\OrdersRepository")
 */
class Orders extends BaseModel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
    * @ORM\ManyToOne(targetEntity="challenge\PaymentBundle\Entity\Formule",inversedBy="orders", cascade={"persist"}))
    * @ORM\JoinColumn(nullable=false)
    */
    protected $formule;

    /**
     * @ORM\ManyToOne(targetEntity="challenge\UserBundle\Entity\User",inversedBy="orders", cascade={"persist"}))
     * @ORM\JoinColumn(nullable=false)
     */
    protected $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer")
     */
    protected $numero;

    /**
     * @var boolean
     *
     * @ORM\Column(name="completed", type="boolean")
     */
    protected $completed;
    /**
     * @var boolean
     *
     * @ORM\Column(name="payer", type="boolean")
     */
    protected $payer;
    /**
     * @var boolean
     *
     * @ORM\Column(name="cancomment", type="boolean")
     */
    protected $cancomment;

    /**
     * @ORM\OneToOne(targetEntity="challenge\FeedBackBundle\Entity\Avis",inversedBy="orders", cascade={"persist"}))
     */

    protected $avis;


    /**
     * @var string
     *
     * @ORM\Column(name="currencycode", type="string", length=255)
     */
    protected $currencyCode;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    protected $description;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float")
     */
    protected $amount;

    /**
     *
     * @ORM\Column(name="date", type="datetime")
     */

    protected $date;




    public function __construct()
    {
        $this->date = new \Datetime();
        $this->completed=false;
        $this->payer=false;
        $this->setCancomment(false);

    }


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
     * Set numero
     *
     * @param integer $numero
     *
     * @return Orders
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set completed
     *
     * @param boolean $completed
     *
     * @return Orders
     */
    public function setCompleted($completed)
    {
        $this->completed = $completed;

        return $this;
    }

    /**
     * Get completed
     *
     * @return boolean
     */
    public function getCompleted()
    {
        return $this->completed;
    }

    /**
     * Set currencyCode
     *
     * @param string $currencyCode
     *
     * @return Orders
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * Get currencyCode
     *
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Orders
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set amount
     *
     * @param float $amount
     *
     * @return Orders
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set user
     *
     * @param \challenge\UserBundle\Entity\User $user
     *
     * @return Orders
     */
    public function setUser(\challenge\UserBundle\Entity\User $user)
    {
        $this->user = $user;
        $user->addOrder($this);

        return $this;
    }

    /**
     * Get user
     *
     * @return \challenge\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Orders
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }



    /**
     * Set payer
     *
     * @param boolean $payer
     *
     * @return Orders
     */
    public function setPayer($payer)
    {
        $this->payer = $payer;

        return $this;
    }

    /**
     * Get payer
     *
     * @return boolean
     */
    public function getPayer()
    {
        return $this->payer;
    }

    /**
     * Set formule
     *
     * @param \challenge\PaymentBundle\Entity\Formule $formule
     *
     * @return Orders
     */
    public function setFormule(\challenge\PaymentBundle\Entity\Formule $formule)
    {
        $this->formule = $formule;
        $formule->addOrder($this);
        return $this;
    }

    /**
     * Get formule
     *
     * @return \challenge\PaymentBundle\Entity\Formule
     */
    public function getFormule()
    {
        return $this->formule;
    }

    /**
     * Set avis
     *
     * @param \challenge\PaymentBundle\Entity\Avis $avis
     *
     * @return Orders
     */
    public function setAvis(\challenge\FeedBackBundle\Entity\Avis $avis = null)
    {
        $this->avis = $avis;
        $avis->setOrders($this);
        return $this;
    }

    /**
     * Get avis
     *
     * @return \challenge\PaymentBundle\Entity\Avis
     */
    public function getAvis()
    {
        return $this->avis;
    }

    /**
     * Set cancomment
     *
     * @param boolean $cancomment
     *
     * @return Orders
     */
    public function setCancomment($cancomment)
    {
        $this->cancomment = $cancomment;

        return $this;
    }

    /**
     * Get cancomment
     *
     * @return boolean
     */
    public function getCancomment()
    {
        return $this->cancomment;
    }
}
