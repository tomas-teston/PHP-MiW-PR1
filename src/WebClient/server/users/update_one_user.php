<?php
/**
 * PHP version 7.2
 * src/update_one_user.php
 *
 * @category Scripts
 * @author   Tomás Muñoz Testón <tomini18@hotmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.etsisi.upm.es ETS de Ingeniería de Sistemas Informáticos
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

$userId = (int) $_POST['id'];
$username = (string) $_POST['username'];
$email = (string) $_POST['email'];
$password = (string) $_POST['password'];
$enabled = (string) $_POST['enabled'];

$userRepository = $entityManager->getRepository(User::class);

/** @var User $user */
$user = $entityManager
    ->getRepository(User::class)
    ->findOneBy(['id' => $userId]);


if (null === $user) {
    echo PHP_EOL."Usuario $userId no encontrado".PHP_EOL.PHP_EOL;
    exit(0);
}

if ($username !== ''){
    $user->setUsername($username);
}

if ($email !== ''){
    $user->setEmail($email);
}


if ($enabled === '0' || $enabled === '1') {
    $enabled = ($enabled === '1') ? true : false;
    $user->setEnabled($enabled);
}

try {
    $entityManager->persist($user);
    $entityManager->flush();
    header('Location: ../../users.php');
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}