<?php
/**
 * Created by PhpStorm.
 * User: Tomas
 * Date: 2018-12-09
 * Time: 19:57
 */

use MiW\Results\Entity\User;
use MiW\Results\Utils;

require __DIR__ . '/../../vendor/autoload.php';

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(
    __DIR__ . '/../..',
    Utils::getEnvFileName(__DIR__ . '/../..')
);
$dotenv->load();

$entityManager = Utils::getEntityManager();


$userRepository = $entityManager->getRepository(User::class);
$users = $userRepository->findAll();

if (empty($users)) {
    echo "No existen usuarios" . PHP_EOL;
} else {
    foreach ($users as $user) {
        $entityManager->remove($user);
        $entityManager->flush();
    }
    echo "Usuarios eliminados" . PHP_EOL;
}