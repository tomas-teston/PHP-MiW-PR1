<?php
/**
 * Created by PhpStorm.
 * User: Tomas
 * Date: 2018-12-08
 * Time: 18:39
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
$userRepository = $entityManager->getRepository(User::class);
$users = $userRepository->findAll();