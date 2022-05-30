<?php

namespace Asdoria\SyliusRetailerPlugin\Repository\Model;

use Doctrine\ORM\QueryBuilder;
use Sylius\Component\Resource\Repository\RepositoryInterface;

interface RetailerRepositoryInterface extends RepositoryInterface
{
    /**
     * @param string $retailerGroupId
     *
     * @return QueryBuilder
     */
    public function createListQueryBuilder(string $retailerGroupId): QueryBuilder;
}
