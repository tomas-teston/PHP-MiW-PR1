<?php
/**
 * Created by PhpStorm.
 * User: Tomas
 * Date: 2018-12-09
 * Time: 19:57
 */

use MiW\Results\Entity\Result;
use MiW\Results\Utils;

require __DIR__ . '/../../vendor/autoload.php';

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(
    __DIR__ . '/../..',
    Utils::getEnvFileName(__DIR__ . '/../..')
);
$dotenv->load();

$entityManager = Utils::getEntityManager();


$resultRepository = $entityManager->getRepository(Result::class);
$results = $resultRepository->findAll();

if (empty($results)) {
    echo "No existen resultados" . PHP_EOL;
} else {
    foreach ($results as $result) {
        $entityManager->remove($result);
        $entityManager->flush();
    }
    echo "Resultados eliminados" . PHP_EOL;
}

