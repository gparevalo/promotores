<section class="navdesk">
    <img src="<?= media() ?>/images/logo.png" class="logo-navdeskt" alt="">

    <a href="<?= base_url() ?>/Prospectos" class="bt-navdeskt"><span class="icon-award ico-djf8393"></span>Prospectos</a>
    <span class="line-navdeesk"></span>

    <a href="<?= base_url() ?>/Comercios" class="bt-navdeskt"><span class="icon-briefcase ico-djf8393"></span>Comercios</a>
    <span class="line-navdeesk"></span>

    <a href="<?= base_url() ?>/Rechazados" class="bt-navdeskt"><span class="icon-user-x ico-djf8393"></span>Rechazados</a>
    <span class="line-navdeesk"></span>

    <?php $usuario =  $_SESSION['usuario'] ?>
    <?php if ($usuario['rolStaff'] == "Administrador") { ?>

        <a href="<?= base_url() ?>/Personal" class="bt-navdeskt"><span class="icon-award ico-djf8393"></span>Personal</a>
        <span class="line-navdeesk"></span>

        <a href="<?= base_url() ?>/Usuarios" class="bt-navdeskt"><span class="icon-key ico-djf8393"></span>Usuarios</a>
        <span class="line-navdeesk"></span>
        
    <?php } ?>
    <a href="<?= base_url() ?>/Login/cerrar" class="bt-navdeskt"><span class="icon-log-out ico-djf8393"></span>Salir</a>
</section>