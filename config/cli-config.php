<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
echo getcwd();
require_once __DIR__.'/../bootstrap.php';

// replace with mechanism to retrieve EntityManager in your app
//$entityManager = GetEntityManager();
return ConsoleRunner::createHelperSet($entityManager);
?>