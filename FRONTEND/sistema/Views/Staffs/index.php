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
                    <input type="text" class="search" placeholder="Buscar"> <span class="icon-search ico-dj27254f"></span>
                </section>

                <section class="topbar-right1">
                    <section class="wrap-bt-topbar">
                        <a href="#view-create" class="bt1">Agregar <span class="icon-plus-circle ico-d363"></span></a>
                    </section>
                </section>
            </section>



            <!-- ITEMS -->

            <div id="items-container">
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
                            <a href="#view-edit-<?= $row->idStaff ?>" class="icon-edit-3 ico-dj7f8s7s"></a>
                            <a href="#view-info-<?= $row->idStaff ?>" class="icon-eye ico-dj7f8s7s"></a>
                            <a href="#eliminar-<?= $row->idStaff ?>" class="icon-trash-2 ico-dj7f8s7s"></a>

                            <p class="date-itemcontact">23-01-24 10:30 am</p>
                        </section>
                    </section>
                <?php } ?>
            </div>


            <!-- <section class="wrap-viewpl ocult">
                <button class="bt-next1">Ver 20 más<span class="icon-eye ico-djde837"></span></button>
                <span class="restante">2 847 por ver</span>
            </section> -->

            <section class="wrap-viewpl <?= count($data->staffs) > 20 ? '' : 'ocult'; ?>">
                <button id="show-more-btn" class="bt-next1">Ver 20 más<span class="icon-eye ico-djde837"></span></button>
                <span class="restante"><?= count($data->staffs); ?> por ver</span>
            </section>
        </section>



    </section>







    <!-- POPS -->
    <?php foreach ($data->staffs as $row) { ?>
        <div class="awesome-nav" id="view-info-<?= $row->idStaff ?>">
            <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
            <div class="wrap-nav-int">
                <p class="title-pop2">Datos de <span><?= $row->rolStaff ?></span></p>

                <p class="itempop-data"><span class="icon-user ico-cjw6e5"></span> <?= $row->namesStaff ?></p>
                <p class="itempop-data"><span class="icon-phone-call ico-cjw6e5"></span> <?= $row->phoneStaff ?></p>
                <p class="itempop-data"><span class="icon-mail ico-cjw6e5"></span> <?= $row->emailStaff ?></p>

                <span class="line-pop"></span>
                <p class="item-int-data1a check"><span class="icon-chevrons-right ico-d62"></span>User: <?= $row->emailStaff ?></p>
                <p class="item-int-data1a check"><span class="icon-chevrons-right ico-d62"></span>Pass: <?= $row->claveStaff ?></p>
                <span class="line-pop"></span>

                <p class="txt-send">Enviar accesos por:</p>

                <section class="wrap-btnsaction">
                    <?php
                    $mensaje = "*DATOS DE ACCESO*" . "\nCORREO: " . $row->emailStaff . "\nCLAVE: " . $row->claveStaff;
                    $mensaje_codificado = urlencode($mensaje);
                    ?>
                    <a class="bt1b" href="whatsapp://send?phone=+593<?= $row->phoneStaff ?>&text=<?= $mensaje_codificado ?>">
                        <span class="icon-whatsapp ico-djde837"></span>
                    </a>
                    <a href="<?= base_url() ?>/Personal/sendEmail/<?= $row->emailStaff ?>-<?= $row->claveStaff ?>" class="bt1b"><span class="icon-mail ico-djde837"></span></a>
                </section>
            </div>
        </div>
    <?php } ?>


    <?php foreach ($data->staffs as $row) { ?>
        <div class="awesome-nav" id="view-edit-<?= $row->idStaff ?>">
            <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
            <div class="wrap-nav-int">
                <form id="frmStaff<?= $row->idStaff ?>" method="POST">
                    <p class="title-pop2">Editar <span><?= $row->rolStaff ?></span></p>

                    <input name="namesStaffE<?= $row->idStaff ?>" type="text" class="campo-registro" placeholder="Nombres" value="<?= $row->namesStaff ?>">
                    <input name="phoneStaffE<?= $row->idStaff ?>" type="text" class="campo-registro" placeholder="Celular" value="<?= $row->phoneStaff ?>">
                    <input name="emailStaffE<?= $row->idStaff ?>" type="text" class="campo-registro" placeholder="Correo" value="<?= $row->emailStaff ?>">
                    <input name="claveStaffE<?= $row->idStaff ?>" type="text" class="campo-registro" placeholder="Contraseña" value="<?= $row->claveStaff ?>">

                    <a href="javascript: void(0)" onclick="editStaff(<?= $row->idStaff ?>)" class="bt-next1">Guardar <span class="icon-check-circle ico-djde837"></span></a>
                </form>
            </div>
        </div>
    <?php } ?>



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


    <?php foreach ($data->staffs as $row) { ?>
        <div class="awesome-nav" id="eliminar-<?= $row->idStaff ?>">
            <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
            <div class="wrap-nav-int">
                <p class="title-pop2">¿Seguro que desea <br> eliminar este registro?</p>

                <section class="wrap-btnsaction">
                    <a href="javascript: void(0)" onclick="deleteStaff(<?= $row->idStaff ?>)" class="bt1a">Si, Eliminar <span class="icon-check ico-djde837"></span></a>
                    <a href="#cerrar" class="bt1a">Cancelar <span class="icon-x ico-djde837"></span></a>
                </section>
            </div>
        </div>
    <?php } ?>
    <!-- POPS -->





    <section class="wrap-trama">
        <section class="shadow-trama"><img src="images/cofepsback.webp" class="img-int" alt=""></section>
    </section>






    <!-- FOOTER -->
    <div class="padd-footer">
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var itemsContainer = document.getElementById("items-container");

                var showMoreBtn = document.getElementById("show-more-btn");
                var allItems = document.querySelectorAll(".item-contact"); // Guarda todos los elementos originales

                let itemsToShow = 20;
                var totalItems = allItems.length;

                showItems();

                showMoreBtn.addEventListener("click", function() {
                    itemsToShow += 20;
                    showItems();
                });

                $(".search").on("input", function() {
                    var searchText = $(this).val().trim().toLowerCase();
                    if (searchText == "") {
                        itemsToShow = 20;
                        showItems();
                    } else {
                        itemsContainer.innerHTML = '';
                        allItems.forEach(function(item) {
                            var prospectName = item.querySelector(".title-itemcontact").textContent.toLowerCase();
                            var prospectCategory = item.querySelector(".item-int-data").textContent.toLowerCase();

                            if (prospectName.includes(searchText) || prospectCategory.includes(searchText)) {
                                itemsContainer.appendChild(item.cloneNode(true));
                                item.style.display = ""; // Mostramos el elemento

                            } else {
                                item.style.display = "none"; // Ocultamos el elemento
                            }
                        });
                    }


                });

                function showItems() {
                    itemsContainer.innerHTML = '';
                    allItems.forEach(function(item, index) {
                        if (index < itemsToShow) {
                            item.style.display = "";
                            itemsContainer.appendChild(item.cloneNode(true));
                        } else {
                            item.style.display = "none";
                        }
                    });

                    if (itemsToShow >= totalItems) {
                        showMoreBtn.style.display = 'none';
                    }
                }

                // ACTIVAR FILTROS
                var filtroActivo = "";

                $(".item-estados-pop").on("click", function() {
                    // Remover la clase "active" de todos los elementos
                    $(".item-estados-pop").removeClass("active");

                    // Agregar la clase "active" solo al elemento clicado
                    $(this).addClass("active");

                    // Obtener el texto del elemento clicado y almacenarlo en filtroActivo
                    filtroActivo = $(this).text().trim();
                });

                $("#guardarFiltro").on("click", function() {
                    if (filtroActivo == "Quitar filtros") {
                        console.log(itemsContainer);
                        itemsToShow = 20;
                        var enlace = document.getElementById('cerrarFiltros');
                        enlace.click();
                        $(".search").val("");
                        showItems();

                    } else {
                        if (filtroActivo == "Ver Completados") {
                            filtroActivo = "Finalizado";
                        }
                        var searchText = filtroActivo.toLowerCase();

                        itemsContainer.innerHTML = '';
                        allItems.forEach(function(item) {
                            var prospectName = item.querySelector(".title-itemcontact").textContent.toLowerCase();
                            var prospectCategory = item.querySelector(".item-int-data").textContent.toLowerCase();

                            if (prospectName.includes(searchText) || prospectCategory.includes(searchText)) {
                                itemsContainer.appendChild(item.cloneNode(true));
                                item.style.display = ""; // Mostramos el elemento
                            } else {
                                item.style.display = "none"; // Ocultamos el elemento
                            }
                        });
                        var enlace = document.getElementById('cerrarFiltros');
                        enlace.click();
                    }
                })


            });
        </script>
        <?php getFooter($data) ?>
    </div>


    <!-- JS -->
    <?php getJS() ?>
</body>

</html>