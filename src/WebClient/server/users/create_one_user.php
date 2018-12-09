<?php
/**
 * Created by PhpStorm.
 * User: Tomas
 * Date: 2018-12-08
 * Time: 18:21
 */

?>

<?php
/**
 * PHP version 7.2
 * src\create_one_user.php
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
    __DIR__ . '/../../../../',
    Utils::getEnvFileName(__DIR__ . '/../../../../')
);
$dotenv->load();

$entityManager = Utils::getEntityManager();


$newUsername = $_POST['username'];
$newUserEmail = $_POST['email'];
$newUserPassword = $_POST['password'];
$newUserEnabled = ($_POST['enabled']==='1') ? true: false;
$user = new User($newUsername, $newUserEmail, $newUserPassword, $newUserEnabled, false);

try {
    $entityManager->persist($user);
    $entityManager->flush();
    header('Location: ../../users.php');
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}
