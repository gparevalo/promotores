<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Personal | Cofeps</title>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://dominio.com/">
    <meta property="og:site_name" content="https://dominio.com/">
    <meta property="og:title" content="Personal | Cofeps">
    <meta property="og:description" content="sistena de enrrolamiento">
    <meta property="og:image" content="https://dominio.com/images/og.png">
    <meta property="og:image:width" content="400">
    <meta property="og:image:height" content="400">

    <!-- HEAD -->
    <?php getHead() ?>

<body>


    <!-- HEADER -->
    <?php getHeader() ?>


    <section class="baner bg-prospectos">
        <section class="shadow1-baner">
            <section class="shadow2-baner"></section>
        </section>
    </section>




    <section class="wrap-general">
        <!-- NAVEGAGOR DESKTOP -->
        <?php getPageMaster("navegador-desktop") ?>



        <section class="resultados">
            <p class="title-category"><span class="icon-users ico-d399f88"></span>Personal <!-- <span class="nros"> | 3 898 registros</span> --></p>

            <section class="topbar">
                <section class="wrap-search">
                    <input type="text" class="search disabled-link" placeholder="Buscar"> <span class="icon-search ico-dj27254f"></span>
                </section>

                <section class="topbar-right1">
                    <section class="wrap-bt-topbar">
                        <a href="#view-create" class="bt1">Agregar <span class="icon-plus-circle ico-d363"></span></a>
                    </section>
                </section>
            </section>



            <!-- ITEMS -->
            <?php foreach ($data->staffs as $row) { ?>

                <section class="item-contact">
                    <section class="itemcontact-left">
                        <p class="title-itemcontact"><?= $row->namesStaff ?></p>
                        <span class="line-itemcontact"></span>

                        <section class="wrap-item-contact">
                            <p class="item-int-data bld check"><span class="icon-check-circle ico-d62"></span><?= $row->rolStaff ?></p>
                            <p class="item-int-data check"><span class="icon-phone-call ico-d62"></span><?= $row->phoneStaff ?></p>
                            <p class="item-int-data check"><span class="icon-mail ico-d62"></span><?= $row->emailStaff ?></p>
                        </section>
                    </section>


                    <section class="itemcontact-right">
                        <?php $titulo = create_slug($row->namesStaff . " " . $row->rolStaff) ?>
                        <a href="<?= base_url() ?>/Personal/detalle/<?= $titulo ?>-<?= $row->idStaff ?>" class="icon-edit-3 ico-dj7f8s7s disabled-link"></a>
                        <a href="#view-info" class="icon-eye ico-dj7f8s7s disabled-link"></a>
                        <a href="#eliminar" class="icon-trash-2 ico-dj7f8s7s disabled-link"></a>

                        <p class="date-itemcontact">23-01-24 10:30 am</p>
                    </section>
                </section>
            <?php } ?>



            <section class="wrap-viewpl ocult">
                <button class="bt-next1">Ver 20 más<span class="icon-eye ico-djde837"></span></button>
                <span class="restante">2 847 por ver</span>
            </section>
        </section>



    </section>







    <!-- POPS -->
    <div class="awesome-nav" id="view-info">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">
            <p class="title-pop2">Datos de <span>Aprobador</span></p>

            <p class="itempop-data"><span class="icon-user ico-cjw6e5"></span> Juan Jose Peña</p>
            <p class="itempop-data"><span class="icon-phone-call ico-cjw6e5"></span> 984 8837 99383</p>
            <p class="itempop-data"><span class="icon-mail ico-cjw6e5"></span> juanjose@gmail.com</p>

            <span class="line-pop"></span>
            <p class="item-int-data1a check"><span class="icon-chevrons-right ico-d62"></span>User: juanjose@gmail.com</p>
            <p class="item-int-data1a check"><span class="icon-chevrons-right ico-d62"></span>Pass: Juan MIguel</p>
            <span class="line-pop"></span>

            <p class="txt-send">Enviar accesos por:</p>

            <section class="wrap-btnsaction">
                <a class="bt1b"><span class="icon-whatsapp ico-djde837"></span></a>
                <a class="bt1b"><span class="icon-mail ico-djde837"></span></a>
            </section>
        </div>
    </div>


    <div class="awesome-nav" id="view-edit">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">
            <p class="title-pop2">Editar <span>Aprobador</span></p>

            <input type="text" class="campo-registro" placeholder="Nombres">
            <input type="text" class="campo-registro" placeholder="Celular">
            <input type="text" class="campo-registro" placeholder="Correo">
            <input type="text" class="campo-registro" placeholder="Contraseña">

            <button class="bt-next1">Guardar <span class="icon-check-circle ico-djde837"></span></button>
        </div>
    </div>


    <div class="awesome-nav" id="view-create">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">
            <p class="title-pop2">Crear personal</p>
            <form id="frmStaff" method="POST">
                <input id="idStaff" name="idStaff" type="hidden">
                <input id="namesStaff" name="namesStaff" type="text" class="campo-registro" placeholder="Nombres">
                <input id="phoneStaff" name="phoneStaff" type="text" class="campo-registro" placeholder="Celular">
                <input id="emailStaff" name="emailStaff" type="text" class="campo-registro" placeholder="Correo">
                <input id="claveStaff" name="claveStaff" type="text" class="campo-registro" placeholder="Contraseña">


                <select id="rolStaff" name="rolStaff" class="campo-registro">
                    <option value="">Asignar Rol:</option>
                    <option value="Promotor">Promotor</option>
                    <option value="Aprobador">Aprobador</option>
                    <option value="Instalador">Instalador</option>
                </select>

                <a href="javascript:void(0)" class="bt-next1" onclick="btnAgregarStaff()">Crear <span class="icon-check-circle ico-djde837"></span></a>
            </form>
        </div>
    </div>



    <div class="awesome-nav" id="eliminar">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">
            <p class="title-pop2">¿Seguro que desea <br> eliminar este registro?</p>

            <section class="wrap-btnsaction">
                <a class="bt1a">Si, Eliminar <span class="icon-check ico-djde837"></span></a>
                <a class="bt1a">Cancelar <span class="icon-x ico-djde837"></span></a>
            </section>
        </div>
    </div>
    <!-- POPS -->





    <section class="wrap-trama">
        <section class="shadow-trama"><img src="images/cofepsback.webp" class="img-int" alt=""></section>
    </section>






    <!-- FOOTER -->
    <div class="padd-footer">
        <?php getFooter($data) ?>
    </div>


    <!-- JS -->
    <?php getJS() ?>
</body>

</html>