<?php

namespace AppBundle\Repository;

/**
 * Plus78ApartmentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class Plus78ApartmentRepository extends \Doctrine\ORM\EntityRepository
{
    public function findMaxDatetime()
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT max(p.updated_at)
        FROM AppBundle\Entity\Plus78Apartment p'
        );
        $max_time = $query->execute();
        return $max_time[0][1];
    }

    public function findApartLessThenMaxDatetime()
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT p
        FROM AppBundle\Entity\Plus78Apartment p
        WHERE p.updated_at < :max_time'
        )->setParameter('max_time',$this->findMaxDatetime());

        /*$query = $this->createQueryBuilder('c')
            ->select('c')
            ->leftJoin('AppBundle:Plus78Block', 'cb', 'WITH', 'cb.xml = c.block')
            ->where('c.updated_at < :max_time')
            ->setParameter('max_time',$this->findMaxDatetime());*/

        return $query->execute();
    }
}
