<?php $page='users'; ?>
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
                    <form id="registrar_usuario" action="./server/users/create_one_user.php" method="POST" class="tab-pane fade in active">
                        <h2 class="header">Registrar usuario:</h2>
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="login_usuario" >Usuario: </label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="form-group">
                                <label class="login_usuario" >Email: </label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label class="login_usuario" >Contraseña: </label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="enabled">Habilitado</label>
                                <select name="enabled" id="enabled" class="form-control">
                                    <option value="0" selected>No</option>
                                    <option value="1" >Si</option>
                                </select>
                            </div>
                        </div>
                        <button id="boton_login" type="submit" class="btn btn-primary"><span id="icon_login" class="glyphicon glyphicon-user"></span>Crear usuario</button>
                        <a href="./users.php" type="button" class="btn btn-primary"><span id="icon_regis" class="glyphicon glyphicon-share-alt"></span>Volver al listado</a>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

</body>
<?php require './core/footer.php' ?>
</html>


