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
require __DIR__ . '/../../vendor/autoload.php';
// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(
    __DIR__ . '/../..',
    Utils::getEnvFileName(__DIR__ . '/../..')
);


$dotenv->load();
$entityManager = Utils::getEntityManager();

if ($argc < 2 || $argc > 6) {
    $fich = basename(__FILE__);
    echo <<< MARCA_FIN
    Usage: $fich <UserId> [<Username>] [<Email>] [<Password>] [<IsEnabled>]
MARCA_FIN;
    exit(0);
}

$userId = (int) $argv[1];

echo "ID User: " . $userId . PHP_EOL;

$userRepository = $entityManager->getRepository(User::class);

/** @var User $user */
$user = $entityManager
    ->getRepository(User::class)
    ->findOneBy(['id' => $userId]);


if (null === $user) {
    echo PHP_EOL."Usuario $userId no encontrado".PHP_EOL.PHP_EOL;
    exit(0);
}

foreach ($argv as $k=>$v)
{
    if ($k === 0 || $k === 1) continue;
    else if ($k === 2) {
        $user->setUsername($v);
    } else if ($k === 3) {
        $user->setEmail($v);
    } else if ($k === 4) {
        $user->setPassword($v);
    } else if ($k === 5) {
        $enabled = (string) $v;
        if ($enabled === 'true' || $enabled === 'false'){
            $enabled = ($enabled === 'true') ? true : false;
            $user->setEnabled($enabled);
        }
    }
}

try {
    $entityManager->persist($user);
    $entityManager->flush();
    echo 'Updated User with ID #' . $user->getId() . PHP_EOL;
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}