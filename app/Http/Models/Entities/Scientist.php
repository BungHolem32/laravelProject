<?php
/**
 * Created by PhpStorm.
 * User: ilanv
 * Date: 04/07/2016
 * Time: 17:41
 */

namespace app\Http\Models\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Class Scientist
 * @package app\Http\Models\Entities
 * @ORM\entity
 * @ORM\Table(name="scientist")
 */
class Scientist
{

    /**
     * @ORM\id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $lastname;

    /**
     * @ORM\Column(type="string")
     */
    protected $firstname;

    /**
     * @ORM\OneToMany(targetEntity="Theory", mappedBy="scientist", cascade={"persist"})
     * @var ArrayCollection|Theory[]
     */
    protected $theories;

    /**
     * Scientist constructor.
     * @param $lastname
     * @param $firstname
     */
    public function __construct($lastname, $theories, $firstname)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->theories = new ArrayCollection;

    }


    public function getId()
    {
        return $this->id;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return mixed
     */
    public function getTheories()
    {
        return $this->theories;
    }

    public function addTheory(Theory $theory)
    {
        if(!$this->theories->contains($theory)) {
            $theory->setScientist($this);
            $this->theories->add($theory);
        }
    }

    public function getTheories()
    {
        return $this->theories;
    }


}