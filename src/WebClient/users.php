<?php $page='users'; ?>
<?php require './server/users/list_users.php' ?>
<!DOCTYPE html>
<html>
<?php require './core/head.php' ?>
<body>
<div class="menu">
    <button class="burger burger3"><span></span></button>
    <div id="menu-logo">
        <!--<i class="fa fa-graduation-cap"></i>-->
        <img class="img-logo" src="img/upmlogo.jpg" alt="imagen-raquetas-clases">
        <h1>Pádel U.P.M!</h1>
        <p></p>
    </div>
</div>

<?php require './core/sidebar.php' ?>

<div class="panels">
    <div class="main">
        <section id="panel">
            <div class="container">
                <div id="panel_login">
                    <div id="listar_usuarios" class="tab-pane fade in">
                        <h2 class="header">Lista de usuarios:</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive">
                                    <thead>
                                    <tr>
                                        <th scope="row">Id</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Habilitado</th>
                                        <th scope="col">Administrador</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($users as $user) {?>
                                        <tr>
                                            <th> <?php echo $user->getId() ?></th>
                                            <th> <?php echo $user->getUsername() ?></th>
                                            <th> <?php echo $user->getEmail() ?></th>
                                            <th> <?php echo ($user->isEnabled()) ? 'Si' : 'No' ?></th>
                                            <th> <?php echo ($user->isAdmin()) ? 'Si' : 'No' ?></th>
                                            <th><a href="user.php<?php echo '?id='.$user->getId() ?>&op=read"><span class="glyphicon glyphicon-search"></span></a></th>
                                            <th><a href="user.php<?php echo '?id='.$user->getId() ?>&op=update"><span class="glyphicon glyphicon-pencil"></span></a></th>
                                            <th><a href="./server/users/delete_one_user.php<?php echo '?id='.$user->getId() ?>"
                                                   onclick="return confirm('¿Realmente deseas eliminar el registro?');">
                                                    <span class="glyphicon glyphicon-trash"></span></a>
                                            </th>
                                        </tr>
                                    <?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="./create_user.php" type="button" class="btn btn-primary"><span id="icon_regis" class="glyphicon glyphicon-user"></span>Crear nuevo usuario</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


</body>
<?php require './core/footer.php' ?>
</html>


