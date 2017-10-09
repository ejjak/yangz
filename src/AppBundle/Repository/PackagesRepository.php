<?php

namespace AppBundle\Repository;

/**
 * PackagesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PackagesRepository extends \Doctrine\ORM\EntityRepository
{
    public function findpackagebydestinationAction($destination){
        $em=$this->getEntityManager();
        $package = $em->createQuery("SELECT h FROM AppBundle:Packages h LEFT JOIN AppBundle:Location d with h.location = d.id WHERE d.destinationName = :destination")
            ->setParameter('destination', $destination);
        $result = $package->getResult();
        return $result;
    }
}