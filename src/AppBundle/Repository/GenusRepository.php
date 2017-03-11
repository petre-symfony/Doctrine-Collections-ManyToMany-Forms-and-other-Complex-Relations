<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Genus;
use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\Criteria;

class GenusRepository extends EntityRepository
{
    /**
     * @return Genus[]
     */
    public function findAllPublishedOrderedByRecentlyActive()
    {
        return $this->createQueryBuilder('genus')
            ->andWhere('genus.isPublished = :isPublished')
            ->setParameter('isPublished', true)
            ->leftJoin('genus.notes', 'genus_note')
            ->orderBy('genus_note.createdAt', 'DESC')
//            ->leftJoin('genus.genusScientists', 'genusScientist')  
//            ->addSelect('genusScientist')
            ->getQuery()
            ->execute();
    }
    
    public static function createExpertsCriteria(){
      return Criteria::create()
        ->andWhere(Criteria::expr()->gt('yearsStudied', 20))
        ->orderBy(['yearsStudied', 'DESC']);
    }
    
    public function findAllExperts(){
      return $this->createQueryBuilder('genus')
        ->addCriteria(self::createExpertsCriteria())
        ->getQuery()
        ->execute();
    }
}
