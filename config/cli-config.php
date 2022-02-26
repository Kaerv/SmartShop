<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
require_once dirname(__DIR__) . '/config.php';

return ConsoleRunner::createHelperSet($entity_manager);