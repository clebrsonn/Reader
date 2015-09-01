<?php
// bootstrap.php
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;


require_once dirname(__FILE__) . "/lib/vendor/autoload.php";
include_once dirname(__FILE__) . "/lib/config/conn.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$entities = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/src/entities"), $isDevMode);
// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);


// obtaining the entity manager
$entityManager = EntityManager::create(conn::$connection, $entities);

return $entityManager;
