<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Cofeps</title>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://dominio.com/">
    <meta property="og:site_name" content="https://dominio.com/">
    <meta property="og:title" content="Cofepss">
    <meta property="og:description" content="sistena de enrrolamiento">
    <meta property="og:image" content="https://dominio.com/images/og.png">
    <meta property="og:image:width" content="400">
    <meta property="og:image:height" content="400">

    <!-- HEAD -->
    <?php getHead() ?>

<body>

    <section class="wrap-form">

        <section class="wrapform-int">
            <span class="icon-logo ico-djfj378d"></span>

            <form id="frmProspect" method="POST" class="registro-comercio">
                <p class="title-form">Registra <br> tu comercio</p>
                <div id="primera-parte">
                    <input type="hidden" id="idProspect" name="idProspect">
                    <select name="category" id="category" class="campo-registro">
                        <option value="">Categoría</option>
                        <option value="Farmacia">Farmacia</option>
                        <option value="Supermercado/Minimercado">Supermercado/Minimercado</option>
                        <option value="Tienda de barrio">Tienda de barrio</option>
                        <option value="Parqueadero">Parqueadero</option>
                        <option value="Servicios de alojamiento">Servicios de alojamiento</option>
                        <option value="Restaurante/Cafetería">Restaurante/Cafetería</option>
                        <option value="Barbería/Peluquería">Barbería/Peluquería</option>
                        <option value="Mercado">Mercado</option>
                        <option value="Lavandería">Lavandería</option>
                        <option value="Lavadora/Lubricadora">Lavadora/Lubricadora</option>
                        <option value="Servicios profesiones">Servicios profesiones</option>
                        <option value="Transporte">Transporte</option>
                        <option value="Papelería/Bazar">Papelería/Bazar</option>
                        <option value="Tecnología">Tecnología</option>
                        <option value="Servicios de salud">Servicios de salud</option>
                        <option value="Servicios de educación">Servicios de educación</option>
                        <option value="Otra">Otra</option>
                    </select>

                    <input name="otraCategoria" id="otraCategoria" type="text" class="campo-registro" placeholder="Otra categoría" style="display: none;">

                    <input name="nameCProspect" id="nameCProspect" type="text" class="campo-registro" placeholder="Nombre Comercial">


                    <input name="directionProspect" id="directionProspect" type="text" class="campo-registro" placeholder="Dirección">
                    
                    <section class="itemcontact-left">
                        <a id="search" class="icon-search ico-dj7f8s7s"></a>
                        <a id="delete" class="icon-trash ico-dj7f8s7s"></a>
                    </section>

                    <div id="map"></div>
                    
                    <select name="serviceProspect" id="serviceProspect" class="campo-registro">
                        <option value="">¿Desea el servicio?</option>
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>

                    <select name="partnerProspect" id="partnerProspect" class="campo-registro">
                        <option value="">¿Socio de la Coop. Jardín Azuayo?</option>
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>

                    <select name="idPromoter" id="idPromoter" class="campo-registro">
                        <option value="">Promotor</option>

                        <?php foreach ($data->promoters as $row) { ?>
                            <option value="<?= $row->idStaff ?>"><?= $row->namesStaff ?></option>
                        <?php } ?>

                        <option value="">Sin promotor</option>
                    </select>
                    <input name="idApprover" id="idApprover" value="0" type="hidden" >
                    <input name="idInstaller" id="idInstaller" value="0" type="hidden" >

                    <input type="text" name="notaProspect" id="notaProspect" class="campo-registro" placeholder="Nota:" style="display: none;">
                    <a href="javascript:void(0)" onclick="btnAgregarProspect()" name="btnNext" id="btnNext" class="bt-next2">Guardar <span class="icon-save ico-djde837"></span></a>

                </div>

                <!-- SEGUNDA PARTE -->

                <div id="segunda-parte" style="display: none;">
                    <input id="nameProspect" name="nameProspect" type="text" class="campo-registro" placeholder="Nombres">
                    <input id="lastNameProspect" name="lastNameProspect" type="text" class="campo-registro" placeholder="Apellidos">
                    <input id="rucCIProspect" name="rucCIProspect" type="text" class="campo-registro" placeholder="RUC o CI">
                    <input id="phoneProspect" name="phoneProspect" type="text" class="campo-registro" placeholder="Celular">
                    <input id="emailProspect" name="emailProspect" type="text" class="campo-registro" placeholder="E-mail">
                    <input id="imgProspect" name="imgProspect" type="file" accept="image/*" class="campo-registro" placeholder="Adjuntar imagen">
                    <input id="imgProspectValue" name="imgProspectValue" type="hidden">
                    <a href="javascript:void(0)" onclick="btnAgregarProspect()" class="bt-next2">Guardar <span class="icon-save ico-djde837"></span></a>
                </div>
            </form>
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