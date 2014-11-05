<?php

namespace Core\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

class NewsRepository extends EntityRepository
{
    public function findEnabledOrderedByCreatedAt()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT n FROM CoreCoreBundle:News n WHERE n.enabled = 1 ORDER BY n.createdAt DESC'
            )
            ->getResult();
    }
}
