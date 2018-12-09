<?php
/**
 * Created by PhpStorm.
 * User: Tomas
 * Date: 2018-12-09
 * Time: 11:42
 */

?>

<div id="wrapper">
    <div id="sidebar-wrapper" class="slidebar">
        <ul class="sidebar-nav">
            <li class="tabHome" id="<?php if ($page==='index') echo 'active'?>"><a href="./index.php" name="panelHome"><i class="fa fa-home"></i>Inicio</a></li>
            <li class="tabUsers" id="<?php if ($page==='users') echo 'active'?>"><a href="./users.php" name="users"><i class="fas fa-user" aria-hidden="true"></i>Usuarios</a></li>
            <li class="tabResults" id="<?php if ($page==='results') echo 'active'?>"><a href="./results.php" name="users"><i class="far fa-address-book" aria-hidden="true"></i>Resultados</a></li>
        </ul>
    </div>
</div>