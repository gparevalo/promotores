<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Prospectos | Cofeps</title>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://dominio.com/">
    <meta property="og:site_name" content="https://dominio.com/">
    <meta property="og:title" content="Prospectos | Cofeps">
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
            <p class="title-category"><span class="icon-award ico-d399f88"></span>Prospectos <!-- <span class="nros"> | 3 898 registros</span> --></p>

            <section class="topbar">
                <section class="wrap-search">
                    <input type="text" class="search disabled-link" placeholder="Buscar"> <span class="icon-search ico-dj27254f"></span>
                </section>

                <section class="topbar-right">
                    <section class="wrap-bt-topbar">
                        <a href="#estados" class="bt1 disabled-link">Estados <span class="icon-chevron-down ico-d363"></span></a>
                    </section>

                    <section class="wrap-bt-topbar">
                        <a href="" class="bt1 disabled-link">Exportar <span class="icon-chevron-down ico-d363"></span></a>
                    </section>
                </section>
            </section>



            <!-- ITEMS -->
            <?php foreach ($data->prospects as $row) { ?>

                <section class="item-contact">

                    <section class="itemcontact-left">
                        <p class="title-itemcontact"><span><?= $row->category ?></span>, <?= $row->nameCProspect ?></p>
                        <span class="line-itemcontact"></span>

                        <section class="wrap-item-contact">
                            <p class="item-int-data <?= $row->nombrePromotor === 'No asignado' ? 'denneg' : 'check' ?>">
                                <span class="icon-chevrons-right ico-d62"></span>Promotor: <?= $row->nombrePromotor ?>
                            </p>
                            <p class="item-int-data <?= $row->nombreAprobador === 'No asignado' ? 'denneg' : 'check' ?>">
                                <span class="icon-chevrons-right ico-d62"></span>Aprobador: <?= $row->nombreAprobador ?>
                            </p>
                            <p class="item-int-data <?= $row->nombreInstalador === 'No asignado' ? 'denneg' : 'check' ?>">
                                <span class="icon-chevrons-right ico-d62"></span>Instalador: <?= $row->nombreInstalador ?>
                            </p>
                        </section>

                        <section class="wrap-item-contact">
                            <p class="item-int-data check"><span class="icon-user ico-d62"></span><?= $row->nameProspect ?> <?= $row->lastNameProspect ?></p>
                            <p class="item-int-data check"><span class="icon-phone-call ico-d62"></span><?= $row->phoneProspect ?></p>
                            <p class="item-int-data check"><span class="icon-trending-up ico-d62"></span>Estado: Visitado</p>
                        </section>
                    </section>


                    <section class="itemcontact-right">
                        <?php $titulo = create_slug($row->category . " " . $row->nameCProspect) ?>
                        <a href="<?= base_url() ?>/Prospectos/detalle/<?= $titulo ?>-<?= $row->idProspect ?>" class="icon-info ico-dj7f8s7s"></a>
                        <a href="#view-info" class="icon-eye ico-dj7f8s7s disabled-link"></a>
                        <a href="#eliminar" class="icon-trash-2 ico-dj7f8s7s disabled-link"></a>

                        <?php $fechaFormateada = date('d-m-y h:i a', strtotime($row->dateProspect)); ?>
                        <p class="date-itemcontact"><?= $fechaFormateada ?></p>
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
    <div class="awesome-nav" id="estados">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">
            <p class="title-pop1">Filtrar estados de avance</p>

            <p class="item-estados-pop"><span class="icon-check ico-836dh"></span> Prospecto visitado</p>
            <p class="item-estados-pop"><span class="icon-check ico-836dh"></span> Apertura de cuenta</p>
            <p class="item-estados-pop"><span class="icon-check ico-836dh"></span> Afiliación y capacitación</p>
            <p class="item-estados-pop"><span class="icon-check ico-836dh"></span> Aprobación Final</p>
            <p class="item-estados-pop"><span class="icon-check ico-836dh"></span> Instalado y validado</p>

            <span class="line-pop"></span>

            <p class="item-estados-pop"><span class="icon-check ico-836dh"></span> En proceso</p>

            <span class="line-pop"></span>

            <p class="item-estados-pop"><span class="icon-check ico-836dh"></span> Ver Completados</p>
            <p class="item-estados-pop"><span class="icon-check ico-836dh"></span> Quitar filtros</p>

            <button class="bt-next1">Guardar <span class="icon-arrow-right ico-djde837"></span></button>
        </div>
    </div>



    <div class="awesome-nav" id="view-info">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">
            <p class="title-pop2"><span>Bodega</span>, El tigrillo</p>

            <p class="ruc-pop">RUC: 98498478383</p>
            <p class="itempop-data"><span class="icon-calendar ico-cjw6e5"></span> 23-01-24 | 10:30am</p>
            <p class="itempop-data"><span class="icon-user ico-cjw6e5"></span> Juan Jose Peña</p>
            <p class="itempop-data"><span class="icon-phone-call ico-cjw6e5"></span> 984 8837 99383</p>
            <p class="itempop-data"><span class="icon-mail ico-cjw6e5"></span> juanjose@gmail.com</p>
            <p class="itempop-data"><span class="icon-thumbs-down ico-cjw6e5"></span> No es socio</p>
            <p class="itempop-data"><span class="icon-map-pin ico-cjw6e5"></span> Jr. Valdelomar 145 - Jesús María Lima</p>

            <span class="line-pop"></span>

            <p class="item-int-data check"><span class="icon-chevrons-right ico-d62"></span>Promotor: Juan MIguel</p>
            <p class="item-int-data denneg"><span class="icon-chevrons-right ico-d62"></span>Aprobador: No asignado</p>
            <p class="item-int-data denneg"><span class="icon-chevrons-right ico-d62"></span>Instalador: No asignado</p>

            <button class="bt-next1">Editar <span class="icon-edit-3 ico-djde837"></span></button>
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
        <section class="shadow-trama"><img src="<?= media() ?>/images/cofepsback.webp" class="img-int" alt=""></section>
    </section>






    <!-- FOOTER -->
    <div class="padd-footer">
        <?php getFooter() ?>
    </div>


    <!-- JS -->
    <?php getJS() ?>
</body>

</html>