<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Prospectos Rechazados | Cofeps</title>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://dominio.com/">
    <meta property="og:site_name" content="https://dominio.com/">
    <meta property="og:title" content="Prospectos Rechazados | Cofeps">
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
            <p class="title-category"><span class="icon-user-x ico-d399f88"></span>Rechazados <!-- <span class="nros"> | 3 898 registros</span> --></p>

            <section class="topbar">
                <section class="wrap-search">
                    <input type="text" class="search" placeholder="Buscar"> <span class="icon-search ico-dj27254f"></span>
                </section>

                <section class="topbar-right1">
                    <section class="wrap-bt-topbar">
                        <a href="javascript: void(0)" id="exportarExcel" class="bt1">Exportar <span class="icon-chevron-down ico-d363"></span></a>
                    </section>
                </section>
            </section>



            <!-- ITEMS -->



            <div id="items-container">
                <?php foreach ($data->prospects as $row) { ?>
                    <section class="item-contact">
                        <section class="itemcontact-left">
                            <p class="title-itemcontact"><span><?= $row->category ?></span>, <?= $row->nameCProspect ?></p>
                            <span class="line-itemcontact"></span>

                            <section class="wrap-item-contact">
                                <p class="item-int-data <?= $row->nombrePromotor === 'No asignado' ? 'denneg' : 'check' ?>"><span class="icon-chevrons-right ico-d62"></span>Promotor: <?= $row->nombrePromotor ?></p>
                                <p class="item-int-data1b denneg"><span class="icon-chevrons-right ico-d62"></span>Rechazado por: <?= $row->notaProspect ?></p>
                            </section>
                        </section>


                        <section class="itemcontact-right">
                            <?php $titulo = create_slug($row->category . " " . $row->nameCProspect) ?>
                            <a href="<?= base_url() ?>/Rechazados/detalle/<?= $titulo ?>-<?= $row->idProspect ?>" class="icon-info ico-dj7f8s7s"></a>
                            <a href="#view-info-<?= $row->idProspect ?>" class="icon-eye ico-dj7f8s7s"></a>
                            <a href="#eliminar-<?= $row->idProspect ?>" class="icon-trash-2 ico-dj7f8s7s"></a>

                            <?php $fechaFormateada = date('d-m-y h:i a', strtotime($row->dateProspect)); ?>
                            <p class="date-itemcontact"><?= $fechaFormateada ?></p>
                        </section>
                    </section>
                <?php } ?>
            </div>

            <section class="wrap-viewpl <?= count($data->prospects) > 20 ? '' : 'ocult'; ?>">
                <button id="show-more-btn" class="bt-next1">Ver 20 más<span class="icon-eye ico-djde837"></span></button>
                <span class="restante"><?= count($data->prospects); ?> por ver</span>
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

            <p class="item-estados-pop"><span class="icon-check ico-836dh"></span> Quitar filtros</p>

            <button class="bt-next1">Guardar <span class="icon-arrow-right ico-djde837"></span></button>
        </div>
    </div>


    <?php foreach ($data->prospects as $row) { ?>
        <div class="awesome-nav" id="view-info-<?= $row->idProspect ?>">
            <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
            <div class="wrap-nav-int">
                <p class="title-pop2"><span><?= $row->category ?></span>, <?= $row->nameCProspect ?></p>

                <p class="ruc-pop">RUC: <?= $row->rucCIProspect ?></p>
                <?php $fechaFormateada = date('d-m-y h:i a', strtotime($row->dateProspect)); ?>
                <p class="itempop-data"><span class="icon-calendar ico-cjw6e5"></span> <?= $fechaFormateada ?></p>
                <p class="itempop-data"><span class="icon-user ico-cjw6e5"></span> <?= $row->nameProspect ?> <?= $row->lastNameProspect ?></p>
                <p class="itempop-data"><span class="icon-phone-call ico-cjw6e5"></span> <?= $row->phoneProspect ?></p>
                <p class="itempop-data"><span class="icon-mail ico-cjw6e5"></span> <?= $row->emailProspect ?></p>
                <?php
                $es_socio = $row->partnerProspect === 'si';
                $texto = $es_socio ? 'Es socio' : 'No es socio';
                $icono_clase = $es_socio ? 'icon-thumbs-up' : 'icon-thumbs-down';
                ?>
                <p class="itempop-data"><span class="<?= $icono_clase ?> ico-cjw6e5"></span> <?= $texto ?></p>
                <p class="itempop-data"><span class="icon-map-pin ico-cjw6e5"></span> <?= $row->directionProspect ?></p>

                <span class="line-pop"></span>

                <p class="item-int-data <?= $row->nombrePromotor === 'No asignado' ? 'denneg' : 'check' ?>">
                    <span class="icon-chevrons-right ico-d62"></span>Promotor: <?= $row->nombrePromotor ?>
                </p>
                <p class="item-int-data <?= $row->nombreAprobador === 'No asignado' ? 'denneg' : 'check' ?>">
                    <span class="icon-chevrons-right ico-d62"></span>Aprobador: <?= $row->nombreAprobador ?>
                </p>
                <p class="item-int-data <?= $row->nombreInstalador === 'No asignado' ? 'denneg' : 'check' ?>">
                    <span class="icon-chevrons-right ico-d62"></span>Instalador: <?= $row->nombreInstalador ?>
                </p>

                <?php $titulo = create_slug($row->category . " " . $row->nameCProspect) ?>
                <a href="<?= base_url() ?>/Rechazados/detalle/<?= $titulo ?>-<?= $row->idProspect ?>" class="bt-next1">Editar <span class="icon-edit-3 ico-djde837"></span></a>
            </div>
        </div>
    <?php } ?>


    <?php foreach ($data->prospects as $row) { ?>
        <div class="awesome-nav" id="eliminar-<?= $row->idProspect ?>">
            <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
            <div class="wrap-nav-int">
                <p class="title-pop2">¿Seguro que desea <br> eliminar este registro?</p>

                <section class="wrap-btnsaction">
                    <a href="javascript: void(0)" onclick="deleteProspect(<?= $row->idProspect ?>)" class="bt1a">Si, Eliminar <span class="icon-check ico-djde837"></span></a>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.full.min.js"></script>
        <script>
            document.getElementById('exportarExcel').addEventListener('click', function() {
                var datosFiltrados = [];

                <?php foreach ($data->prospects as $row) { ?>
                    <?php
                    $status = "No iniciado";
                    if ($row->installedProspect == 'Finalizado' || $row->installedProspect == 'En proceso') {
                        $status = "Instalado y validado | " . $row->installedProspect;
                    } elseif ($row->affiliationProspect == 'Finalizado' || $row->affiliationProspect == 'En proceso') {
                        $status = "Aprobación Final | " . $row->affiliationProspect;
                    } elseif ($row->trainingProspect == 'Finalizado' || $row->trainingProspect == 'En proceso') {
                        $status = "Afiliación y capacitación | " . $row->trainingProspect;
                    } elseif ($row->openingProspect == 'Finalizado' || $row->openingProspect == 'En proceso') {
                        $status = "Apertura de cuenta | " . $row->openingProspect;
                    } elseif ($row->visitedProspect == 'Finalizado' || $row->visitedProspect == 'En proceso') {
                        $status = "Prospecto visitado | " . $row->visitedProspect;
                    }
                    ?>

                    datosFiltrados.push(["<?= $row->dateProspect ?>", "<?= $row->category ?>", "<?= $row->nameCProspect ?>", "<?= $row->nombrePromotor ?>", "<?= $row->nombreAprobador ?>", "<?= $row->nombreInstalador ?>", "<?= $row->nameProspect ?> <?= $row->lastNameProspect ?>", "<?= $row->phoneProspect ?>", "<?= $row->directionProspect ?>", "<?= $row->serviceProspect ?>", "<?= $row->partnerProspect ?>", "<?= $row->nombrePromotor ?>", "<?= $row->rucCIProspect ?>", "<?= $row->emailProspect ?>", "<?= URL_API ?>/Models/images/prospects/<?= $row->imgProspect ?>", "<?= $status ?>", "<?= $row->notaProspect ?>"]);
                <?php } ?>

                var datosFiltradosConEnlaces = datosFiltrados.map(function(row) {
                    var urlImagen = row[14];
                    row[14] = {
                        t: 's',
                        v: "Ver imagen",
                        l: {
                            Target: urlImagen,
                            Tooltip: "Ver imagen",
                            Address: urlImagen
                        }
                    };
                    return row;
                });

                var libroDeExcel = XLSX.utils.book_new();
                var hojaDeExcelConEnlaces = XLSX.utils.aoa_to_sheet([
                    ["Fecha", "Categoría", "Nombre", "Promotor", "Aprobador", "Instalador", "Nombre completo", "Teléfono", "Dirección", "¿Desea el servicio?", "Es socio", "Me enteré por:", "RUC", "Email", "URL DE IMAGEN", "Estado", "Nota"]
                ].concat(datosFiltradosConEnlaces));

                XLSX.utils.book_append_sheet(libroDeExcel, hojaDeExcelConEnlaces, "Prospects Rechazados");

                var fecha = new Date();
                var fechaFormateada = fecha.getFullYear() + '-' + (fecha.getMonth() + 1).toString().padStart(2, '0') + '-' + fecha.getDate().toString().padStart(2, '0');

                var nombreArchivo = "Rechazados_" + fechaFormateada + ".xlsx";

                XLSX.writeFile(libroDeExcel, nombreArchivo);
            });
        </script>
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
                            var itemDataElements = item.querySelectorAll(".item-int-data");

                            var found = false;
                            itemDataElements.forEach(function(element) {
                                var prospectData = element.textContent.toLowerCase();
                                if (prospectData.includes(searchText)) {
                                    found = true;
                                }
                            });

                            if (prospectName.includes(searchText) || found) {
                                itemsContainer.appendChild(item.cloneNode(true));
                                item.style.display = "";
                            } else {
                                item.style.display = "none";
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
                            item.style.display = "";
                            var prospectName = item.querySelector(".title-itemcontact").textContent.toLowerCase();
                            var itemDataElements = item.querySelectorAll(".item-int-data");

                            var found = false;
                            itemDataElements.forEach(function(element) {
                                var prospectData = element.textContent.toLowerCase();
                                if (prospectData.includes(searchText)) {
                                    found = true;
                                    console.log("si");
                                }
                            });

                            if (prospectName.includes(searchText) || found) {
                                var clonedItem = item.cloneNode(true);
                                itemsContainer.appendChild(clonedItem);
                                item.style.display = "";
                            } else {
                                item.style.display = "none";
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