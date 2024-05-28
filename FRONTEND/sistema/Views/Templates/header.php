



<header>
    <img src="<?= media() ?>/images/logo.png" class="logoheader" alt="">

    <section class="header-right">
    <?php $usuario =  $_SESSION['usuario'] ?>
                    
        <section class="username"><span class="nametxt"><?= $usuario['namesStaff'] ?></span> <span class="inicial">A</span></section>
        <span class="line-header"></span>
        <span class="icon-menu ico-sjduuwj"></span>
    </section>
</header>

