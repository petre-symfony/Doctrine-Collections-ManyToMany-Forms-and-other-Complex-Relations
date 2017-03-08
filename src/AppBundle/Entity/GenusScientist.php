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
  * @ORM\ManyToOne(targetEntity="Genus")
  * @ORM\JoinColumn(nullable=false)
  */
  private $genus;
  
  /**
  *
  * @ORM\ManyToOne(targetEntity="User")
  * @ORM\JoinColumn(nullable=false)
  */
  private $user;
  /**
  * @ORM\Column(type="string")
  */
  private $yearsStudied;
}