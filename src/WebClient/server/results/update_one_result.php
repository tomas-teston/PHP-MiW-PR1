<?php
/**
 * PHP version 7.2
 * src/list__one_result.php
 *
 * @category Scripts
 * @author   Tomás Muñoz Testón <tomini18@hotmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.etsisi.upm.es ETS de Ingeniería de Sistemas Informáticos
 */

use MiW\Results\Entity\Result;
use MiW\Results\Entity\User;
use MiW\Results\Utils;

require __DIR__ . '/../../../../vendor/autoload.php';

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(
    __DIR__ . '/../../../..',
    Utils::getEnvFileName(__DIR__ . '/../../../..')
);
$dotenv->load();

$entityManager = Utils::getEntityManager();

$resultId = (int) $_POST['id'];
$userId = (int) $_POST['userId'];
$resultPts = (int) $_POST['result'];

$resultRepository = $entityManager->getRepository(Result::class);
$result = $entityManager
    ->getRepository(Result::class)
    ->findOneBy(['id' => $resultId]);

if (null === $result) {
    echo "Resultado $resultId no encontrado" . PHP_EOL;
    exit(0);
}

$userRepository = $entityManager->getRepository(User::class);
$user = $entityManager
    ->getRepository(User::class)
    ->findOneBy(['id' => $userId]);

if (null === $user) {
    echo "Usuario $userId no encontrado" . PHP_EOL;
    exit(0);
}

if ($userId > 0){
    $result->setUser($user);
}

if ($resultPts > 0){
    $result->setResult($resultPts);
}

try {
    $entityManager->persist($result);
    $entityManager->flush();
    header('Location: ../../results.php');
} catch (Exception $exception) {
    echo $exception->getMessage();
}