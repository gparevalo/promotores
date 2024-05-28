<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Promotor Detalle | Cofeps</title>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://dominio.com/">
    <meta property="og:site_name" content="https://dominio.com/">
    <meta property="og:title" content="Promotor Detalle | Cofeps">
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

            <a href="<?= base_url() ?>/Promotor" class="bt-navdeskt"><span class="icon-award ico-djf8393"></span>Prospectos</a>
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
                <a href="<?= base_url() ?>/Promotor"  class="subtitle-category"><span class="icon-arrow-left-circle ico-hd627s77"></span>Prospectos </a>
                <span class="line-catgry"></span>
            </section>

            <section class="details-prospect">
                <section class="detail-prospect-left">
                    <p class="title-prospect-detail"><span><?= $prospect->category ?></span>, <?= $prospect->nameCProspect ?></p>

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


                    <section class="item-dataasign1 <?= $prospect->visitedProspect === 'No iniciado' ? 'denneg dennegbg' : ($prospect->visitedProspect === 'En proceso' ? 'pross prossbg' : 'check checkbg') ?>">
                        <section class="itemdataleft">
                            <span class="icon-arrow-right ico-dhd25131"></span>Prospecto visitado
                        </section>

                        <section class="<?= $prospect->visitedProspect === 'No iniciado' ? 'wrap-btend1' : ($prospect->visitedProspect === 'En proceso' ? 'wrap-btend3' : 'wrap-btend2') ?>">
                            <?= $prospect->visitedProspect ?> <span class="icon-x-circle ico-djd7373"></span>
                        </section>
                    </section>


                    <section class="item-dataasign1 <?= $prospect->openingProspect === 'No iniciado' ? 'denneg dennegbg' : ($prospect->openingProspect === 'En proceso' ? 'pross prossbg' : 'check checkbg') ?>">
                        <section class="itemdataleft">
                            <span class="icon-arrow-right ico-dhd25131"></span>Apertura de cuenta
                        </section>

                        <section class="<?= $prospect->openingProspect === 'No iniciado' ? 'wrap-btend1' : ($prospect->openingProspect === 'En proceso' ? 'wrap-btend3' : 'wrap-btend2') ?>">
                            <?= $prospect->openingProspect ?> <span class="icon-check-circle ico-djd7373"></span>
                        </section>
                    </section>


                    <section class="item-dataasign1 <?= $prospect->trainingProspect === 'No iniciado' ? 'denneg dennegbg' : ($prospect->trainingProspect === 'En proceso' ? 'pross prossbg' : 'check checkbg') ?>">
                        <section class="itemdataleft">
                            <span class="icon-arrow-right ico-dhd25131"></span>Afiliación y capacitación
                        </section>

                        <section class="<?= $prospect->trainingProspect === 'No iniciado' ? 'wrap-btend1' : ($prospect->trainingProspect === 'En proceso' ? 'wrap-btend3' : 'wrap-btend2') ?>">
                            <?= $prospect->trainingProspect ?> <span class="icon-clock ico-djd7373"></span>
                        </section>
                    </section>


                </section>


                <section class="detail-prospect-right">
                    <a href="#editar-prosct" class="bt1">Editar información <span class="icon-edit-3 ico-d363"></span></a>
                    <a href="#proceso" class="bt1">Editar proceso <span class="icon-trending-up ico-d363"></span></a>
                    <a href="#rechazar" class="bt1">Rechazar <span class="icon-x-circle ico-d363"></span></a>
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

            <form id="frmProspectAll" method="POST">
            <?php
                $options = [
                    "Categoría",
                    "Farmacia",
                    "Supermercado/Minimercado",
                    "Tienda de barrio",
                    "Parqueadero",
                    "Servicios de alojamiento",
                    "Restaurante/Cafetería",
                    "Barbería/Peluquería",
                    "Mercado",
                    "Lavandería",
                    "Lavadora/Lubricadora",
                    "Servicios profesionales",
                    "Transporte",
                    "Papelería/Bazar",
                    "Tecnología",
                    "Servicios de salud",
                    "Servicios de educación",
                    "Otra"
                ];
                $prospectCategory = $prospect->category;

                $selectedOption = in_array($prospectCategory, $options) ? $prospectCategory : "Otra";
                ?>

                <input name="idProspect" id="idProspect" type="hidden" value="<?= $prospect->idProspect ?>">
                <select name="category" id="category" class="campo-registro">
                    <?php foreach ($options as $option) : ?>
                        <option value="<?= $option ?>" <?= ($selectedOption === $option) ? 'selected' : '' ?>>
                            <?= $option ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <input name="otraCategoria" id="otraCategoria" value="<?= $prospect->category ?>" type="text" class="campo-registro" placeholder="Otra categoría">

                <input name="nameCProspect" id="nameCProspect" value="<?= $prospect->nameCProspect ?>" type="text" class="campo-registro" placeholder="Nombre Comercial">

                <input name="directionProspect" id="directionProspect" value="<?= $prospect->directionProspect ?>" type="text" class="campo-registro" placeholder="Dirección">

                <?php
                $options = [
                    "¿Socio de la Coop. Jardín Azuayo?",
                    "si",
                    "no"
                ];
                ?>

                <select name="partnerProspect" id="partnerProspect" class="campo-registro">
                    <?php foreach ($options as $option) : ?>
                        <option value="<?= $option ?>" <?= ($prospect->partnerProspect === $option) ? 'selected' : '' ?>>
                            <?= $option ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <select name="idPromoter" id="idPromoter" class="campo-registro">
                    <option value="">Promotor</option>

                    <?php foreach ($data->staffs as $row) {
                        if ($row->rolStaff == "Promotor") { ?>
                            <option value="<?= $row->idStaff ?>" <?= ($prospect->nombrePromotor === $row->namesStaff) ? 'selected' : '' ?>><?= $row->namesStaff ?></option>
                    <?php }
                    } ?>
                </select>

                <select name="idApprover" id="idApprover" class="campo-registro">
                    <option value="">Aprobador</option>

                    <?php foreach ($data->staffs as $row) {
                        if ($row->rolStaff == "Aprobador") { ?>
                            <option value="<?= $row->idStaff ?>" <?= ($prospect->nombreAprobador === $row->namesStaff) ? 'selected' : '' ?>><?= $row->namesStaff ?></option>
                    <?php }
                    } ?>
                </select>

                <select name="idInstaller" id="idInstaller" class="campo-registro">
                    <option value="">Instalador</option>

                    <?php foreach ($data->staffs as $row) {
                        if ($row->rolStaff == "Instalador") { ?>
                            <option value="<?= $row->idStaff ?>" <?= ($prospect->nombreInstalador === $row->namesStaff) ? 'selected' : '' ?>><?= $row->namesStaff ?></option>
                    <?php }
                    } ?>
                </select>

                <input name="serviceProspect" id="serviceProspect" value="<?= $prospect->serviceProspect ?>" type="hidden">
                <input name="notaProspect" id="notaProspect" value="<?= $prospect->notaProspect ?>" type="hidden">

                <input name="nameProspect" id="nameProspect" value="<?= $prospect->nameProspect ?>" type="text" class="campo-registro" placeholder="Nombres">
                <input name="lastNameProspect" id="lastNameProspect" value="<?= $prospect->lastNameProspect ?>" type="text" class="campo-registro" placeholder="Apellidos">
                <input name="rucCIProspect" id="rucCIProspect" value="<?= $prospect->rucCIProspect ?>" type="text" class="campo-registro" placeholder="RUC o CI">
                <input name="phoneProspect" id="phoneProspect" value="<?= $prospect->phoneProspect ?>" type="text" class="campo-registro" placeholder="Celular">
                <input name="emailProspect" id="emailProspect" value="<?= $prospect->emailProspect ?>" type="text" class="campo-registro" placeholder="E-mail">
                <input name="imgProspect" id="imgProspect" value="<?= $prospect->imgProspect ?>" type="file" accept="image/*" class="campo-registro" placeholder="Adjuntar imagen">
                <input name="imgProspectValue" id="imgProspectValue" value="<?= $prospect->imgProspect ?>" type="hidden">

                <a href="javascript:void(0)" onclick="btnAgregarProspectAll()" class="bt-next1">Guardar <span class="icon-arrow-right ico-djde837"></span></a>
            </form>
        </div>
    </div>





    <div class="awesome-nav" id="proceso">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">
            <form id="frmProspect" method="POST">
                <p class="title-pop2"><span><?= $prospect->category ?></span>, <?= $prospect->nameCProspect ?></p>
                <?php
                $options = [
                    "Prospecto visitado",
                    "No iniciado",
                    "En proceso",
                    "Finalizado"
                ];
                ?>

                <input name="idProspect" id="idProspect" type="hidden" value="<?= $prospect->idProspect ?>">
                <select name="visitedProspect" id="visitedProspect" class="campo-registro">
                    <?php foreach ($options as $option) : ?>
                        <option value="<?= $option ?>" <?= ($prospect->visitedProspect === $option) ? 'selected' : '' ?>>
                            <?= $option ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <input name="imgVisitedProspect" id="imgVisitedProspect" type="file" class="campo-registro mrdwn" accept="image/*,.pdf" placeholder="Adjuntar imagen">
                <input id="imgVisitedProspectValue" name="imgVisitedProspectValue" type="hidden" value="<?= $prospect->imgVisitedProspect ?>">

                <?php
                $options = [
                    "Apertura de cuenta",
                    "No iniciado",
                    "En proceso",
                    "Finalizado"
                ];
                ?>

                <select name="openingProspect" id="openingProspect" class="campo-registro">
                    <?php foreach ($options as $option) : ?>
                        <option value="<?= $option ?>" <?= ($prospect->openingProspect === $option) ? 'selected' : '' ?>>
                            <?= $option ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <input name="imgOpeningProspect" id="imgOpeningProspect" type="file" accept="image/*,.pdf" class="campo-registro mrdwn" placeholder="Adjuntar imagen">
                <input id="imgOpeningProspectValue" name="imgOpeningProspectValue" type="hidden" value="<?= $prospect->imgOpeningProspect ?>">


                <?php
                $options = [
                    "Afiliación y capacitación",
                    "No iniciado",
                    "En proceso",
                    "Finalizado"
                ];
                ?>

                <select name="trainingProspect" id="trainingProspect" class="campo-registro">
                    <?php foreach ($options as $option) : ?>
                        <option value="<?= $option ?>" <?= ($prospect->trainingProspect === $option) ? 'selected' : '' ?>>
                            <?= $option ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <input name="imgTrainingProspect" id="imgTrainingProspect" type="file" accept="image/*,.pdf" class="campo-registro mrdwn" placeholder="Adjuntar imagen">
                <input id="imgTrainingProspectValue" name="imgTrainingProspectValue" type="hidden" value="<?= $prospect->imgTrainingProspect ?>">


                <a href="javascript:void(0)" onclick="btnAgregarProspect(this)" class="bt-next1">Confirmar <span class="icon-edit-3 ico-djde837"></span></a>
            </form>
        </div>
    </div>





    <div class="awesome-nav" id="rechazar">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">
            <form id="frmRejectedProspect" method="POST">
                <p class="title-pop2"><span><?= $prospect->category ?></span>, <?= $prospect->nameCProspect ?></p>
                <input name="idRProspect" id="idRProspect" type="hidden" value="<?= $prospect->idProspect ?>">
                <textarea name="notaRProspect" id="notaRProspect" rows="5" class="campo-registro-txtar" placeholder="Motivo de rechazado"></textarea>

                <a href="javascript:void(0)" onclick="sendRejectedProspect()" class="bt-next1">Confirmar <span class="icon-edit-3 ico-djde837"></span></a>
            </form>
        </div>
    </div>


    <div class="awesome-nav" id="detalle">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">

            <p class="label-pop-step">Nombre del paso</p>
            <p class="title-pop2"><span>Bodega</span>, El tigrillo</p>

            <section class="wrap-imgs-confirm">
                <img src="images/bgbaner.png" class="imgconfirm" alt="">
                <img src="images/bgbaner.png" class="imgconfirm" alt="">
                <img src="images/bgbaner.png" class="imgconfirm" alt="">
            </section>
        </div>
    </div>

    <div class="awesome-nav" id="pasar">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">
            <p class="title-pop2">¿Seguro que desea <br> pasar a comercio?</p>

            <section class="wrap-btnsaction">
                <a class="bt1a">Si, pasar <span class="icon-check ico-djde837"></span></a>
                <a href="#cerrar" class="bt1a">Cancelar <span class="icon-x ico-djde837"></span></a>
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