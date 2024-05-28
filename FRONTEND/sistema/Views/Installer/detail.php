<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Instalador detalle | Cofeps</title>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://dominio.com/">
    <meta property="og:site_name" content="https://dominio.com/">
    <meta property="og:title" content="Instalador detalle | Cofeps">
    <meta property="og:description" content="sistena de enrrolamiento">
    <meta property="og:image" content="https://dominio.com/images/og.png">
    <meta property="og:image:width" content="400">
    <meta property="og:image:height" content="400">

    <!-- HEAD -->
    <?php getHead() ?>

<body>
    <section class="hedrcolo">
        <!-- HEADER -->
        <?php getHeader() ?>
    </section>


    <!-- <section class="baner bg-prospectos">
    <section class="shadow1-baner">
        <section class="shadow2-baner"></section>
    </section>
</section> -->



    <?php $prospect = $data->prospect ?>

    <section class="wrap-general-detalle">
        <section class="navdesk">
            <img src="<?= media() ?>/images/logo.png" class="logo-navdeskt" alt="">

            <a href="<?= base_url() ?>/Instalador" class="bt-navdeskt"><span class="icon-award ico-djf8393"></span>Prospectos</a>
            <span class="line-navdeesk"></span>

            <p class="txtwelc">
                <?php $usuario =  $_SESSION['usuario'] ?>
                Hola <?= $usuario['namesStaff'] ?> aquí podrás encontrar todos los prospectos que se te han asignado
            </p>
            <span class="line-navdeesk"></span>

            <a href="<?= base_url() ?>/Login/cerrar" class="bt-navdeskt"><span class="icon-log-out ico-djf8393"></span>Salir</a>
        </section>



        <section class="resultados resultados-int">
            <section class="wrap-linkback">
                <a class="subtitle-category"><span class="icon-arrow-left-circle ico-hd627s77"></span>Prospectos </a>
                <span class="line-catgry"></span>
            </section>

            <section class="details-prospect">
                <section class="detail-prospect-left">
                    <p class="title-prospect-detail"><span><?= $prospect->category ?></span>, <?= $prospect->nameCProspect ?></p>

                    <?php if ($prospect->notaProspect) { ?>
                        <p class="notait">
                            <span>Nota de salida o rechazo:</span>
                            <?= $prospect->notaProspect ?>
                        </p>
                    <?php } ?>

                    <section class="wrap-img-detail"><img src="<?= URL_API ?>/Models/images/prospects/<?= empty($prospect->imgProspect) ? "pred.webp" : $prospect->imgProspect ?>" class="img-int" alt=""></section>

                    <section class="dataperson">
                        <?php $fechaFormateada = date('d-m-y h:i a', strtotime($prospect->dateProspect)); ?>
                        <p class="item-dataperson"><span class="icon-calendar ico-jdj2827"></span><?= $fechaFormateada ?></p>
                        <p class="item-dataperson"><span class="icon-user ico-jdj2827"></span><?= $prospect->nameProspect ?> <?= $prospect->lastNameProspect ?></p>
                        <p class="item-dataperson"><span class="icon-phone-call ico-jdj2827"></span><?= $prospect->phoneProspect ?></p>
                        <p class="item-dataperson"><span class="icon-mail ico-jdj2827"></span><?= $prospect->emailProspect ?></p>
                        <p class="item-dataperson"><span class="icon-briefcase ico-jdj2827"></span>RUC: <?= $prospect->rucCIProspect ?></p>
                        <?php
                        $es_socio = $prospect->partnerProspect === 'si';
                        $texto = $es_socio ? 'Es socio' : 'No es socio';
                        $icono_clase = $es_socio ? 'icon-thumbs-up' : 'icon-thumbs-down';
                        ?>
                        <p class="item-dataperson"><span class="<?= $icono_clase ?> ico-jdj2827"></span><?= $texto ?></p>
                        <p class="item-dataperson"><span class="icon-map-pin ico-jdj2827"></span><?= $prospect->directionProspect ?></p>
                    </section>

                    <section class="int-map">
                        <section class="wrap-btviewmap"><a href="#estados" class="bt1 disabled-link">Ver en el mapa <span class="icon-chevron-down ico-d363"></span></a></section>
                        <iframe src="<?= API_MAP . $prospect->directionProspect ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>

                    <section class="item-dataasign1 <?= $prospect->installedProspect === 'No iniciado' ? 'denneg dennegbg' : ($prospect->installedProspect === 'En proceso' ? 'pross prossbg' : 'check checkbg') ?>">
                        <section class="itemdataleft">
                            <span class="icon-arrow-right ico-dhd25131"></span>Instalado y validado
                        </section>

                        <section class="<?= $prospect->installedProspect === 'No iniciado' ? 'wrap-btend1' : ($prospect->installedProspect === 'En proceso' ? 'wrap-btend3' : 'wrap-btend2') ?>">
                            <?= $prospect->installedProspect ?> <span class="icon-x-circle ico-djd7373"></span>
                        </section>
                    </section>


                </section>


                <section class="detail-prospect-right">
                    <a href="#proceso" class="bt1">Editar proceso <span class="icon-trending-up ico-d363"></span></a>
                </section>
            </section>


            <span class="line-detailprospect"></span>


            <p class="subtitle-itemdetail"><span class="icon-message-circle ico-h8dj9ww"></span>Observaciones</p>

            <?php foreach ($data->comments as $row) { ?>
                <section class="wrap-message-detail">
                    <p class="txt-message-detail"><?= $row->comment ?></p>
                    <span class="line-messagedet"></span>
                    <?php $fecha_formateada = date("Y-m-d", strtotime($row->dateComment)); ?>
                    <p class="fecha-message"><?= $fecha_formateada ?></p>
                    <p class="id-message"><?= $row->rolStaff ?>: <?= $row->namesStaff ?></p>
                </section>
            <?php } ?>


            <span class="line-detailprospect"></span>


            <form id="frmComment" method="post">

                <input name="idProspectC" type="hidden" value="<?= $prospect->idProspect ?>">
                <section class="writting">
                    <textarea name="commentC" class="campo-registro-txtar" rows="10" placeholder="Escribir mensaje"></textarea>
                </section>

                <section class="wrap-btsendmes">
                    <a href="javascript: void(0)" onclick="addComments()" class="bt-next1">Publicar <span class="icon-arrow-right ico-djde837"></span></a>
                </section>
            </form>
        </section>


    </section>







    <!-- POPS -->
    <div class="awesome-nav" id="editar-prosct">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">
            <p class="title-pop1">Editar prospecto</p>

            <select name="" id="" class="campo-registro">
                <option value="">Categoría</option>
                <option value="">Opción 1</option>
                <option value="">Opción 2</option>
                <option value="">Opción 3</option>
                <option value="">Otra</option>
            </select>

            <input type="text" class="campo-registro" placeholder="Otra categoría">

            <input type="text" class="campo-registro" placeholder="Nombre Comercial">

            <input type="text" class="campo-registro" placeholder="Dirección">

            <select name="" id="" class="campo-registro">
                <option value="">¿Socio de la Coop. Jardín Azuayo?</option>
                <option value="">Si</option>
                <option value="">No</option>
            </select>

            <select name="" id="" class="campo-registro">
                <option value="">Promotor</option>
                <option value="">Nombre 1</option>
                <option value="">Nombre 2</option>
                <option value="">Nombre 3</option>
                <option value="">Nombre 4</option>
            </select>

            <input type="text" class="campo-registro" placeholder="Nombres">
            <input type="text" class="campo-registro" placeholder="Apellidos">
            <input type="text" class="campo-registro" placeholder="RUC o CI">
            <input type="text" class="campo-registro" placeholder="Celular">
            <input type="text" class="campo-registro" placeholder="E-mail">
            <input type="text" class="campo-registro" placeholder="Adjuntar imagen">

            <button class="bt-next1">Guardar <span class="icon-arrow-right ico-djde837"></span></button>
        </div>
    </div>





    <div class="awesome-nav" id="proceso">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">
            <form id="frmProspect" method="POST">
                <p class="title-pop2"><span><?= $prospect->category ?></span>, <?= $prospect->nameCProspect ?></p>

                <?php
                $options = [
                    "Estado de instalación",
                    "No iniciado",
                    "En proceso",
                    "Finalizado"
                ];
                ?>

                <input name="idProspect" id="idProspect" type="hidden" value="<?= $prospect->idProspect ?>">
                <select name="installedProspect" id="installedProspect" class="campo-registro">
                    <?php foreach ($options as $option) : ?>
                        <option value="<?= $option ?>" <?= ($prospect->installedProspect === $option) ? 'selected' : '' ?>>
                            <?= $option ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <input name="imgIProspect" onchange="cambiarValue(event)" type="file" class="campo-registro mrdwn" accept="image/*,.pdf" placeholder="Adjuntar imagen">
                <input id="imgInstalledProspectValue" name="imgInstalledProspectValue" type="hidden" value="<?= $prospect->imgInstalledProspect ?>">

                <a href="javascript:void(0)" onclick="btnAgregarProspect(this)" class="bt-next1">Confirmar <span class="icon-edit-3 ico-djde837"></span></a>
            </form>
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