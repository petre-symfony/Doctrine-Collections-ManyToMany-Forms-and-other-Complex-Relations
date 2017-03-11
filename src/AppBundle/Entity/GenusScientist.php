<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="genus_scientist")
 * @UniqueEntity(
 *   fields={"genus", "user"},
 *   message="This user is already studying this genus",
 *   errorPath="user"
 * )
 */
class GenusScientist{
  /**
  * @ORM\Id
  * @ORM\GeneratedValue(strategy="AUTO")
  * @ORM\Column(type="integer")
  */
  private $id;
  
  /**
  *
  * @ORM\ManyToOne(targetEntity="Genus", inversedBy="genusScientists")
  * @ORM\JoinColumn(nullable=false)
  */
  private $genus;
  
  /**
  *
  * @ORM\ManyToOne(targetEntity="User", inversedBy="studiedGenuses")
  * @ORM\JoinColumn(nullable=false)
  */
  private $user;
  /**
  * @ORM\Column(type="integer")
   *@Assert\NotBlank() 
  */
  private $yearsStudied;

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
     * Set yearsStudied
     *
     * @param string $yearsStudied
     *
     * @return GenusScientist
     */
    public function setYearsStudied($yearsStudied)
    {
        $this->yearsStudied = $yearsStudied;

        return $this;
    }

    /**
     * Get yearsStudied
     *
     * @return string
     */
    public function getYearsStudied()
    {
        return $this->yearsStudied;
    }

    /**
     * Set genus
     *
     * @param \AppBundle\Entity\Genus $genus
     *
     * @return GenusScientist
     */
    public function setGenus(\AppBundle\Entity\Genus $genus)
    {
        $this->genus = $genus;

        return $this;
    }

    /**
     * Get genus
     *
     * @return \AppBundle\Entity\Genus
     */
    public function getGenus()
    {
        return $this->genus;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return GenusScientist
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
