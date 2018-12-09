<?php
/**
 * PHP version 7.2
 * src/delete_one_result.php
 *
 * @category Scripts
 * @author   Tomás Muñoz Testón <tomini18@hotmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.etsisi.upm.es ETS de Ingeniería de Sistemas Informáticos
 */


use MiW\Results\Entity\Result;
use MiW\Results\Utils;

require __DIR__ . '/../../../../vendor/autoload.php';

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(
    __DIR__ . '/../../../..',
    Utils::getEnvFileName(__DIR__ . '/../../../..')
);
$dotenv->load();

$entityManager = Utils::getEntityManager();

$resultId = (int) $_GET['id'];

$userRepository = $entityManager->getRepository(Result::class);
$result = $entityManager
    ->getRepository(Result::class)
    ->findOneBy(['id' => $resultId]);

if (null === $result) {
    echo "Resultado $resultId no encontrado" . PHP_EOL;
} else {
    try {
        $entityManager->remove($result);
    } catch (\Doctrine\ORM\ORMException $e) {
        echo "Error al intentar eliminar resultado";
    }
    $entityManager->flush();
    header('Location: ../../results.php');
}

