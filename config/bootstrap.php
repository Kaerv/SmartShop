<?php

$configuration = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
    $paths = [dirname(__DIR__) . '/src/Entities'],
    $isDevMode = true
);

$connection_parameters = [
    'dbname' => DB_NAME,
    'user' => DB_USER,
    'password' => DB_PASS,
    'host' => DB_HOST,
    'driver' => 'pdo_mysql'
];

$entity_manager = Doctrine\ORM\EntityManager::create($connection_parameters, $configuration);