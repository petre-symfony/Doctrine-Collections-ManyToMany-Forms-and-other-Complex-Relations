<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="genus_scientist")
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
  * @ORM\ManyToMany(targetEntity="Genus")
  * @ORM\JoinColumn(nullable=false)
  */
  private $genus;
  
  /**
  *
  * @ORM\ManyToMany(targetEntity="User")
  * @ORM\JoinColumn(nullable=false)
  */
  private $user;
  /**
  * @ORM\Column(type="string")
  */
  private $yearsStudied;
}