<?php

namespace SmartShop;

abstract class Entity
{
    /**
     * @var string Entity repository
     */
    protected static $repository;

    /**
     * Gets all entities
     * 
     * @return array<Entity> Array with all entities
     */
    public static function getAll($page, $limit)
    {
        global $entity_manager;

        $page -= 1;

        return $entity_manager->getRepository(static::$repository)->findBy(
            array(),
            array('id' => 'ASC'),
            $limit,
            $page * $limit
        );
    }

    /**
     * Search by id
     * 
     * @param int $id Product ID
     * 
     * @return Entity Product found
     */
    public static function getById($id)
    {
        global $entity_manager;
        return $entity_manager->getRepository(static::$repository)->find($id);
    }

    /**
     * Counts all entities
     * 
     * @return int Entities count
     */
    public static function getCount()
    {
        global $entity_manager;

        $qb = $entity_manager->createQueryBuilder();

        $qb->select($qb->expr()->count('r'))
        ->from(static::$repository, 'r');

        $query = $qb->getQuery();

        return $query->getSingleScalarResult();
    }
}