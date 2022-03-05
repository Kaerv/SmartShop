<?php

namespace SmartShop;


class Pagination
{
    /**
     * Gets all pages
     * 
     * @return array Pages with url
     */
    public static function getPages($entity_class, $class_slug, $items_for_page, $is_admin = false)
    {
        $entity_class = "Entities\\".$entity_class; 
        $entities_count = $entity_class::getCount();
        $pages_count = (int) ($entities_count / $items_for_page);
        
        if ($entities_count % $items_for_page > 0) {
            $pages_count++;
        }

        $pages = array();

        for ($i = 1; $i <= $pages_count; $i++) {
            if ($is_admin) {
                $pages[$i] = array(
                    'url' => Link::getAdminControllerLink($class_slug, array('page' => $i))
                );
            } else {
                $pages[$i] = array(
                    'url' => Link::getControllerLink($class_slug, array('page' => $i))
                );
            }
        }

        return $pages;
    }
}