<?php
/**
 * Created by PhpStorm.
 * User: Tomas
 * Date: 2018-12-08
 * Time: 18:46
 */

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

$userId = (int) $_GET['id'];

$userRepository = $entityManager->getRepository(User::class);
$user = $entityManager
    ->getRepository(User::class)
    ->findOneBy(['id' => $userId]);

if (null === $user) {
    echo "Usuario $userId no encontrado" . PHP_EOL;
} else {
    $entityManager->remove($user);
    $entityManager->flush();
    header('Location: ../../users.php');
}
