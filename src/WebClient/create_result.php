<?php $page='results'; ?>
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
                    <form id="registrar_resultado" action="./server/results/create_result.php" method="POST" class="tab-pane fade in active">
                        <h2 class="header">Registrar resultado:</h2>
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="login_usuario" >Resultado: </label>
                                <input type="number" class="form-control" name="result" required>
                            </div>
                            <div class="form-group">
                                <label class="login_usuario" >Usuario: </label>
                                <select name="userId" id="userId" class="form-control">
                                    <?php foreach ($users as $user) {?>
                                        <option value="<?php echo $user->getId() ?>"><?php echo $user->getUsername() ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <button id="boton_login" type="submit" class="btn btn-primary"><span id="icon_login" class="glyphicon glyphicon-user"></span>Crear resultado</button>
                        <a href="./results.php" type="button" class="btn btn-primary"><span id="icon_regis" class="glyphicon glyphicon-share-alt"></span>Volver al listado</a>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

</body>
<?php require './core/footer.php' ?>
</html>


