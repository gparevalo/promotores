<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Detalle de Prospecto | Cofeps</title>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://dominio.com/">
    <meta property="og:site_name" content="https://dominio.com/">
    <meta property="og:title" content="Detalle de Prospecto | Cofeps">
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
        <!-- NAVEGAGOR DESKTOP -->
        <?php getPageMaster("navegador-desktop") ?>



        <section class="resultados resultados-int">
            <section class="wrap-linkback">
                <a class="subtitle-category"><span class="icon-arrow-left-circle ico-hd627s77"></span>Prospectos </a>
                <span class="line-catgry"></span>
            </section>

            <section class="details-prospect">
                <section class="detail-prospect-left">
                    <p class="title-prospect-detail"><span><?= $prospect->category ?></span>, <?= $prospect->nameCProspect ?></p>

                    <section class="wrap-img-detail"><img src="<?= base_url() ?>/Models/images/prospects/<?= $prospect->imgProspect ?>" class="img-int" alt=""></section>

                    <section class="dataperson">
                        <p class="item-dataperson"><span class="icon-calendar ico-jdj2827"></span>23-01-24 10:30am</p>
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


                <section class="detail-prospect-right">
                    <a href="#editar-prosct" class="bt1">Editar información <span class="icon-edit-3 ico-d363"></span></a>
                    <a href="#pasar" class="bt1 disabled-link">Pasar a Comercio <span class="icon-check-circle ico-d363"></span></a>
                    <a href="#rechazar" class="bt1 disabled-link">Rechazar <span class="icon-x-circle ico-d363"></span></a>
                </section>
            </section>


            <span class="line-detailprospect"></span>


            <p class="subtitle-itemdetail"><span class="icon-trending-up ico-h8dj9ww"></span>Estado de Enrolamiento</p>

            <section class="wrap-step">
                <section class="item-step">
                    <span class="icon-check-circle ico-djdu27d"></span>
                    <p class="title-itemstep">Prospecto visitado</p>
                    <span class="line-itemstep"></span>
                    <p class="fecha-item-step">02-09-23</p>
                    <a href="#detalle" class="view-details-step">ver detalles</a>
                </section>

                <span class="line-nextstep"></span>

                <section class="item-step">
                    <span class="icon-check-circle ico-djdu27d"></span>
                    <p class="title-itemstep">Apertura de cuenta</p>
                    <span class="line-itemstep"></span>
                    <p class="fecha-item-step">02-09-23</p>
                    <a href="#detalle" class="view-details-step">ver detalles</a>
                </section>

                <span class="line-nextstep"></span>

                <section class="item-step">
                    <span class="icon-check-circle ico-djdu27d"></span>
                    <p class="title-itemstep">Afiliación y capacitación</p>
                    <span class="line-itemstep"></span>
                    <p class="fecha-item-step">02-09-23</p>
                    <a href="#detalle" class="view-details-step">ver detalles</a>
                </section>

                <span class="line-nextstep"></span>

                <section class="item-step">
                    <span class="icon-check-circle ico-djdu27d"></span>
                    <p class="title-itemstep">Afiliación final</p>
                    <span class="line-itemstep"></span>
                    <p class="fecha-item-step">02-09-23</p>
                    <a href="#detalle" class="view-details-step">ver detalles</a>
                </section>

                <span class="line-nextstep"></span>

                <section class="item-step">
                    <span class="icon-check-circle ico-djdu27d"></span>
                    <p class="title-itemstep">Instalado y validado</p>
                    <span class="line-itemstep"></span>
                    <p class="fecha-item-step">02-09-23</p>
                    <a href="#detalle" class="view-details-step">ver detalles</a>
                </section>
            </section>


            <span class="line-detailprospect"></span>


            <p class="subtitle-itemdetail"><span class="icon-calendar ico-h8dj9ww"></span>Estado de Enrolamiento</p>

            <section class="wrap-message-detail">
                <p class="txt-message-detail">Se hizo la visita el día de hoy y no se encontró al dueño, esperamos 45min y optamos por retirarnos dejando la indicación que volveríamos y nos indicaron que el responsable volvería pasado mañana</p>
                <span class="line-messagedet"></span>
                <p class="fecha-message">02-09-23</p>
                <p class="id-message">Promotor: Juan Jose</p>
            </section>

            <section class="wrap-message-detail">
                <p class="txt-message-detail">Llegamos a instalar a la hora indicada (8:00am) y en el establecimiento nos indicaron que volviéramos en 3 días por los nuevos módulos que les iban a traer. La segunda visita se le hará previa coordinación</p>
                <span class="line-messagedet"></span>
                <p class="fecha-message">02-09-23</p>
                <p class="id-message">Instalador: Miguel Angel</p>
            </section>
        </section>


    </section>







    <!-- POPS -->
    <div class="awesome-nav" id="editar-prosct">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">
            <p class="title-pop1">Editar prospecto</p>
            <form id="frmProspect" method="POST">
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

                ?>

                <input name="idProspect" id="idProspect" type="hidden" value="<?= $prospect->idProspect ?>">
                <select name="category" id="category" class="campo-registro">
                    <?php foreach ($options as $option) : ?>
                        <option value="<?= $option ?>" <?= ($prospect->category === $option) ? 'selected' : '' ?>>
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

                <a href="javascript:void(0)" onclick="btnAgregarProspect()" class="bt-next1">Guardar <span class="icon-arrow-right ico-djde837"></span></a>
            </form>
        </div>
    </div>



    <div class="awesome-nav" id="rechazar">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">
            <p class="title-pop2"><span>Bodega</span>, El tigrillo</p>

            <textarea name="" id="" rows="5" class="campo-registro-txtar" placeholder="Motivo de rechazado"></textarea>

            <button class="bt-next1">Confirmar <span class="icon-edit-3 ico-djde837"></span></button>
        </div>
    </div>


    <div class="awesome-nav" id="detalle">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">

            <p class="label-pop-step">Nombre del paso</p>
            <p class="title-pop2"><span>Bodega</span>, El tigrillo</p>

            <section class="wrap-imgs-confirm">
                <img src="<?= media() ?>/images/bgbaner.png" class="imgconfirm" alt="">
                <img src="<?= media() ?>/images/bgbaner.png" class="imgconfirm" alt="">
                <img src="<?= media() ?>/images/bgbaner.png" class="imgconfirm" alt="">
            </section>
        </div>
    </div>

    <div class="awesome-nav" id="pasar">
        <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">
            <p class="title-pop2">¿Seguro que desea <br> pasar a comercio?</p>

            <section class="wrap-btnsaction">
                <a class="bt1a">Si, pasar <span class="icon-check ico-djde837"></span></a>
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
        <?php getFooter($data) ?>
    </div>


    <!-- JS -->
    <?php getJS() ?>
</body>

</html>