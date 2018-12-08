<?php
/**
 * PHP version 7.2
 * src/delete_one_user.php
 *
 * @category Scripts
 * @author   Tomás Muñoz Testón <tomini18@hotmail.com.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.etsisi.upm.es ETS de Ingeniería de Sistemas Informáticos
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
if ($argc !== 2) {
    $fich = basename(__FILE__);
    echo <<< MARCA_FIN
    Usage: $fich <UserId>
    
MARCA_FIN;
    exit(0);
}

$userId = (int) $argv[1];
$userRepository = $entityManager->getRepository(User::class);
$user = $entityManager
    ->getRepository(User::class)
    ->findOneBy(['id' => $userId]);

if (null === $user) {
    echo "Usuario $userId no encontrado" . PHP_EOL;
} else {
    echo "Usuario $userId eliminado" . PHP_EOL;
    $entityManager->remove($user);
    $entityManager->flush();
}