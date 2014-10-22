<?php

namespace Core\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

class NewsRepository extends EntityRepository
{
    public function findActiveOrderedByCreatedAt()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT n FROM CoreCoreBundle:News n WHERE n.active = 1 ORDER BY n.createdAt DESC'
            )
            ->getResult();
    }
}
