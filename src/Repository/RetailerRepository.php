<?php

namespace Asdoria\SyliusRetailerPlugin\Repository;

use Asdoria\SyliusRetailerPlugin\Repository\Model\RetailerRepositoryInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class RetailerRepository extends EntityRepository implements RetailerRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createListQueryBuilder(string $retailerGroupId): QueryBuilder
    {
        return $this->createQueryBuilder('o')
            ->where('o.retailerGroup = :retailerGroupId')
            ->setParameter('retailerGroupId', (int)$retailerGroupId)
            ;
    }
}
