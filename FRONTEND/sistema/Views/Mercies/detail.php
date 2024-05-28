<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Detalle Comercios | Cofeps</title>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://dominio.com/">
    <meta property="og:site_name" content="https://dominio.com/">
    <meta property="og:title" content="Detalle Comercios | Cofeps">
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



    <?php $prospect = $data->mercie ?>
    <section class="wrap-general-detalle">
        <!-- NAVEGAGOR DESKTOP -->
        <?php getPageMaster('navegador-desktop') ?>



        <section class="resultados resultados-int">
            <section class="wrap-linkback">
                <a href="<?= base_url() ?>/Comercios" class="subtitle-category"><span class="icon-arrow-left-circle ico-hd627s77"></span>Comercios </a>
                <span class="line-catgry"></span>
            </section>

            <section class="details-prospect">
                <section class="detail-prospect-left1">
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


                    <p class="item-dataasign <?= $prospect->nombrePromotor === 'No asignado' ? 'denneg dennegbg' : 'check checkbg' ?>">
                        <span class="icon-calendar ico-dhd25131"></span>Promotor: <span class="name29387"><?= $prospect->nombrePromotor ?></span>
                    </p>
                    <p class="item-dataasign <?= $prospect->nombreAprobador === 'No asignado' ? 'denneg dennegbg' : 'check checkbg' ?>">
                        <span class="icon-calendar ico-dhd25131"></span>Aprobador: <span class="name29387"><?= $prospect->nombreAprobador ?></span>
                    </p>
                    <p class="item-dataasign <?= $prospect->nombreInstalador === 'No asignado' ? 'denneg dennegbg' : 'check checkbg' ?>">
                        <span class="icon-calendar ico-dhd25131"></span>Instalador: <span class="name29387"><?= $prospect->nombreInstalador ?></span>
                    </p>
                </section>
            </section>


            <span class="line-detailprospect"></span>


            <p class="subtitle-itemdetail"><span class="icon-trending-up ico-h8dj9ww"></span>Estado de Enrolamiento</p>

            <section class="wrap-step">
                <section class="item-step" style="opacity: <?= ($prospect->visitedProspect === 'Finalizado' || $prospect->visitedProspect === 'En proceso') ? '1' : '0.3' ?>;">
                    <span class="icon-check-circle ico-djdu27d <?= $prospect->visitedProspect === 'Finalizado' ? 'check' : ($prospect->visitedProspect === 'En proceso' ? 'pross' : '') ?>"></span>
                    <p class="title-itemstep">Prospecto visitado</p>
                    <span class="line-itemstep"></span>

                    <?php if ($prospect->date1 != '0000-00-00 00:00:00') : ?>
                        <?php $fechaFormateada = date('d-m-y', strtotime($prospect->date1)); ?>
                        <p class="fecha-item-step"><?= $fechaFormateada ?></p>
                        <a href="#<?= empty($prospect->imgVisitedProspect) ? "" : "detalle-visitado" ?>" class="view-details-step"><?= empty($prospect->imgVisitedProspect) ? "" : "ver detalles" ?></a>
                    <?php endif; ?>
                </section>

                <span class="line-nextstep" style="opacity: <?= ($prospect->visitedProspect === 'Finalizado' || $prospect->visitedProspect === 'En proceso') ? '1' : '0.3' ?>;"></span>

                <section class="item-step" style="opacity: <?= ($prospect->openingProspect === 'Finalizado' || $prospect->openingProspect === 'En proceso') ? '1' : '0.3' ?>;">
                    <span class="icon-check-circle ico-djdu27d <?= $prospect->openingProspect === 'Finalizado' ? 'check' : ($prospect->openingProspect === 'En proceso' ? 'pross' : '') ?>"></span>
                    <p class="title-itemstep">Apertura de cuenta</p>
                    <span class="line-itemstep"></span>
                    <?php if ($prospect->date2 != '0000-00-00 00:00:00') : ?>
                        <?php $fechaFormateada = date('d-m-y', strtotime($prospect->date2)); ?>
                        <p class="fecha-item-step"><?= $fechaFormateada ?></p>
                        <a href="#<?= empty($prospect->imgOpeningProspect) ? "" : "detalle-apertura" ?>" class="view-details-step"><?= empty($prospect->imgOpeningProspect) ? "" : "ver detalles" ?></a>
                    <?php endif; ?>
                </section>

                <span class="line-nextstep" style="opacity: <?= ($prospect->openingProspect === 'Finalizado' || $prospect->openingProspect === 'En proceso') ? '1' : '0.3' ?>;"></span>

                <section class="item-step" style="opacity: <?= ($prospect->trainingProspect === 'Finalizado' || $prospect->trainingProspect === 'En proceso') ? '1' : '0.3' ?>;">
                    <span class="icon-check-circle ico-djdu27d <?= $prospect->trainingProspect === 'Finalizado' ? 'check' : ($prospect->trainingProspect === 'En proceso' ? 'pross' : '') ?>"></span>
                    <p class=" title-itemstep">Afiliación y capacitación</p>
                    <span class="line-itemstep"></span>
                    <?php if ($prospect->date3 != '0000-00-00 00:00:00') : ?>
                        <?php $fechaFormateada = date('d-m-y', strtotime($prospect->date3)); ?>
                        <p class="fecha-item-step"><?= $fechaFormateada ?></p>
                        <a href="#<?= empty($prospect->imgTrainingProspect) ? "" : "detalle-capacitacion" ?>" class="view-details-step"><?= empty($prospect->imgTrainingProspect) ? "" : "ver detalles" ?></a>
                    <?php endif; ?>
                </section>

                <span class="line-nextstep" style="opacity: <?= ($prospect->trainingProspect === 'Finalizado' || $prospect->trainingProspect === 'En proceso') ? '1' : '0.3' ?>;"></span>

                <section class="item-step" style="opacity: <?= ($prospect->affiliationProspect === 'Finalizado' || $prospect->affiliationProspect === 'En proceso' || $prospect->affiliationProspect === 'Rechazado')   ? '1' : '0.3' ?>;">
                    <span class="icon-check-circle ico-djdu27d <?= $prospect->affiliationProspect === 'Finalizado' ? 'check' : ($prospect->affiliationProspect === 'En proceso' ? 'pross' : ($prospect->affiliationProspect === 'Rechazado' ? 'denneg' : '')) ?>"></span>
                    <p class="title-itemstep">Aprobación final</p>
                    <span class="line-itemstep"></span>
                    <?php if ($prospect->date4 != '0000-00-00 00:00:00') : ?>
                        <?php $fechaFormateada = date('d-m-y', strtotime($prospect->date4)); ?>
                        <p class="fecha-item-step"><?= $fechaFormateada ?></p>
                        <a href="#<?= empty($prospect->imgAffiliationProspect) ? "" : "detalle-afiliacion" ?>" class="view-details-step"><?= empty($prospect->imgAffiliationProspect) ? "" : "ver detalles" ?></a>
                    <?php endif; ?>
                </section>

                <span class="line-nextstep" style="opacity: <?= ($prospect->affiliationProspect === 'Finalizado' || $prospect->affiliationProspect === 'En proceso') ? '1' : '0.3' ?>;"></span>

                <section class="item-step" style="opacity: <?= ($prospect->installedProspect === 'Finalizado' || $prospect->installedProspect === 'En proceso' || $prospect->installedProspect === 'Rechazado')   ? '1' : '0.3' ?>;">
                    <span class="icon-check-circle ico-djdu27d <?= $prospect->installedProspect === 'Finalizado' ? 'check' : ($prospect->installedProspect === 'En proceso' ? 'pross' : ($prospect->installedProspect === 'Rechazado' ? 'denneg' : '')) ?>"></span>
                    <p class="title-itemstep">Instalado y validado</p>
                    <span class="line-itemstep"></span>
                    <?php if ($prospect->date5 != '0000-00-00 00:00:00') : ?>
                        <?php $fechaFormateada = date('d-m-y', strtotime($prospect->date5)); ?>
                        <p class="fecha-item-step"><?= $fechaFormateada ?></p>
                        <a href="#<?= empty($prospect->imgInstalledProspect) ? "" : "detalle-instalado" ?>" class="view-details-step"><?= empty($prospect->imgInstalledProspect) ? "" : "ver detalles" ?></a>
                    <?php endif; ?>
                </section>
            </section>


            <span class="line-detailprospect"></span>


            <p class="subtitle-itemdetail"><span class="icon-calendar ico-h8dj9ww"></span>Estado de Enrolamiento</p>

            <?php foreach ($data->comments as $row) { ?>
                <section class="wrap-message-detail">
                    <p class="txt-message-detail"><?= $row->comment ?></p>
                    <span class="line-messagedet"></span>
                    <?php $fecha_formateada = date("Y-m-d", strtotime($row->dateComment)); ?>
                    <p class="fecha-message"><?= $fecha_formateada ?></p>
                    <p class="id-message"><?= $row->rolStaff ?>: <?= $row->namesStaff ?></p>
                </section>
            <?php } ?>
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



    <div class="awesome-nav" id="rechazar">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">
            <p class="title-pop2"><?= $prospect->category ?></span>, <?= $prospect->nameCProspect ?></p>

            <textarea name="" id="" rows="5" class="campo-registro-txtar" placeholder="Motivo de rechazado"></textarea>

            <button class="bt-next1">Confirmar <span class="icon-edit-3 ico-djde837"></span></button>
        </div>
    </div>


    <!-- VISITADO -->
    <div class="awesome-nav" id="detalle-visitado">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">

            <p class="label-pop-step">Nombre del paso</p>
            <p class="title-pop2"><span><?= $prospect->category ?></span>, <?= $prospect->nameCProspect ?></p>

            <section class="wrap-imgs-confirm">
                <?php
                    $img_src = URL_API . "/Models/images/prospects/" . $prospect->imgVisitedProspect;
                    // Obtenemos la extensión del archivo
                    $file_extension = pathinfo($prospect->imgVisitedProspect, PATHINFO_EXTENSION);
                ?>

                <?php if (strtolower($file_extension) === 'pdf') : ?>
                    <a href="<?= $img_src ?>" target="_blank">Ver PDF</a>
                <?php else : ?>
                    <img src="<?= $img_src ?>" class="imgconfirm" alt="">
                <?php endif; ?>
                <!-- <img src="<?= media() ?>/images/bgbaner.png" class="imgconfirm" alt="">
                <img src="<?= media() ?>/images/bgbaner.png" class="imgconfirm" alt=""> -->
            </section>
        </div>
    </div>

    <!-- APERTURA -->
    <div class="awesome-nav" id="detalle-apertura">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">

            <p class="label-pop-step">Nombre del paso</p>
            <p class="title-pop2"><span><?= $prospect->category ?></span>, <?= $prospect->nameCProspect ?></p>

            <section class="wrap-imgs-confirm">
                <?php
                    $img_src = URL_API . "/Models/images/prospects/" . $prospect->imgOpeningProspect;
                    // Obtenemos la extensión del archivo
                    $file_extension = pathinfo($prospect->imgOpeningProspect, PATHINFO_EXTENSION);
                ?>

                <?php if (strtolower($file_extension) === 'pdf') : ?>
                    <a href="<?= $img_src ?>" target="_blank">Ver PDF</a>
                <?php else : ?>
                    <img src="<?= $img_src ?>" class="imgconfirm" alt="">
                <?php endif; ?>
                <!-- <img src="<?= media() ?>/images/bgbaner.png" class="imgconfirm" alt="">
                <img src="<?= media() ?>/images/bgbaner.png" class="imgconfirm" alt=""> -->
            </section>
        </div>
    </div>

    <!-- AFILIACION Y  CAPACTIACION -->
    <div class="awesome-nav" id="detalle-capacitacion">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">

            <p class="label-pop-step">Nombre del paso</p>
            <p class="title-pop2"><span><?= $prospect->category ?></span>, <?= $prospect->nameCProspect ?></p>

            <section class="wrap-imgs-confirm">
                <?php
                    $img_src = URL_API . "/Models/images/prospects/" . $prospect->imgTrainingProspect;
                    // Obtenemos la extensión del archivo
                    $file_extension = pathinfo($prospect->imgTrainingProspect, PATHINFO_EXTENSION);
                ?>

                <?php if (strtolower($file_extension) === 'pdf') : ?>
                    <a href="<?= $img_src ?>" target="_blank">Ver PDF</a>
                <?php else : ?>
                    <img src="<?= $img_src ?>" class="imgconfirm" alt="">
                <?php endif; ?>
                <!-- <img src="<?= media() ?>/images/bgbaner.png" class="imgconfirm" alt="">
                <img src="<?= media() ?>/images/bgbaner.png" class="imgconfirm" alt=""> -->
            </section>
        </div>
    </div>

    <!-- AFILIACION  -->
    <div class="awesome-nav" id="detalle-afiliacion">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">

            <p class="label-pop-step">Nombre del paso</p>
            <p class="title-pop2"><span><?= $prospect->category ?></span>, <?= $prospect->nameCProspect ?></p>

            <section class="wrap-imgs-confirm">
                <?php
                    $img_src = URL_API . "/Models/images/prospects/" . $prospect->imgAffiliationProspect;
                    // Obtenemos la extensión del archivo
                    $file_extension = pathinfo($prospect->imgAffiliationProspect, PATHINFO_EXTENSION);
                ?>

                <?php if (strtolower($file_extension) === 'pdf') : ?>
                    <a href="<?= $img_src ?>" target="_blank">Ver PDF</a>
                <?php else : ?>
                    <img src="<?= $img_src ?>" class="imgconfirm" alt="">
                <?php endif; ?>
                <!-- <img src="<?= media() ?>/images/bgbaner.png" class="imgconfirm" alt="">
                <img src="<?= media() ?>/images/bgbaner.png" class="imgconfirm" alt=""> -->
            </section>
        </div>
    </div>

    <!-- INSTALADO -->
    <div class="awesome-nav" id="detalle-instalado">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">

            <p class="label-pop-step">Nombre del paso</p>
            <p class="title-pop2"><span><?= $prospect->category ?></span>, <?= $prospect->nameCProspect ?></p>

            <section class="wrap-imgs-confirm">
                <?php
                    $img_src = URL_API . "/Models/images/prospects/" . $prospect->imgInstalledProspect;
                    // Obtenemos la extensión del archivo
                    $file_extension = pathinfo($prospect->imgInstalledProspect, PATHINFO_EXTENSION);
                ?>

                <?php if (strtolower($file_extension) === 'pdf') : ?>
                    <a href="<?= $img_src ?>" target="_blank">Ver PDF</a>
                <?php else : ?>
                    <img src="<?= $img_src ?>" class="imgconfirm" alt="">
                <?php endif; ?>
                <!-- <img src="<?= media() ?>/images/bgbaner.png" class="imgconfirm" alt="">
                <img src="<?= media() ?>/images/bgbaner.png" class="imgconfirm" alt=""> -->
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