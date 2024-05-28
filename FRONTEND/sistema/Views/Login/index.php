<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Login | Cofeps</title>

<meta property="og:type" content="website">
<meta property="og:url" content="https://dominio.com/">
<meta property="og:site_name" content="https://dominio.com/">
<meta property="og:title" content="Login | Cofeps">
<meta property="og:description" content="sistena de enrrolamiento">
<meta property="og:image" content="https://dominio.com/images/og.png">
<meta property="og:image:width" content="400">
<meta property="og:image:height" content="400">

<!-- HEAD -->
<?php getHead()?>

<body>


<section class="wrap-login">
    <section class="shadow-login"><img src="<?= media() ?>/images/cofepsback.webp" class="img-int" alt=""></section>

    <section class="wrap-login-int">
        <span class="icon-lock ico-dkjdiwu"></span>

        <form id="frmLogin" class="wrap-campos-login">
            <p class="title-login">Login</p>

            <input name="emailStaff" id="emailStaff" type="text" class="campo-registro" placeholder="Ingrese su usuario">
            <input name="claveStaff" id="claveStaff" type="password" class="campo-registro" placeholder="Ingrese su contraseña">

            <button type="button" onclick="login()" class="bt-next2">Ingresar <span class="icon-arrow-right ico-djde837"></span></button>
        </form>

        <img src="<?= media() ?>/images/logo.png" class="img-login" alt="">
    </section>
</section>





<!-- FOOTER -->
<div class="padd-footer">
    <?php getFooter($data) ?>
</div>


<!-- JS -->
<?php getJS() ?>
</body>
</html>



