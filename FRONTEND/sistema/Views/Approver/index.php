<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Aprobador | Cofeps</title>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://dominio.com/">
    <meta property="og:site_name" content="https://dominio.com/">
    <meta property="og:title" content="Aprobador | Cofeps">
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
        <section class="navdesk">
            <img src="<?= media() ?>/images/logo.png" class="logo-navdeskt" alt="">

            <a href="" class="bt-navdeskt"><span class="icon-award ico-djf8393"></span>Prospectos</a>
            <span class="line-navdeesk"></span>

            <p class="txtwelc">
                <?php $usuario =  $_SESSION['usuario'] ?>
                Hola <?= $usuario['namesStaff'] ?>, aquí podrás encontrar todos los prospectos que se te han asignado
            </p>
            <span class="line-navdeesk"></span>

            <a href="<?= base_url() ?>/Login/cerrar" class="bt-navdeskt"><span class="icon-log-out ico-djf8393"></span>Salir</a>
        </section>



        <section class="resultados">
            <p class="title-category"><span class="icon-briefcase ico-d399f88"></span>Aprobador <!-- <span class="nros"> | 3 898 registros</span> --></p>

            <section class="topbar">
                <section class="wrap-search">
                    <input type="text" class="search" placeholder="Buscar"> <span class="icon-search ico-dj27254f"></span>
                </section>

                <section class="topbar-right1">
                    <section class="wrap-bt-topbar">
                        <a href="#estados" class="bt1">Estados <span class="icon-chevron-down ico-d363"></span></a>
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
                                <?php if ($row->installedProspect == 'Finalizado' || $row->installedProspect == 'En proceso') { ?>
                                    <p class="item-int-data check"><span class="icon-trending-up ico-d62"></span>Estado: Instalado y validado | <?= $row->installedProspect ?></p>
                                <?php } elseif ($row->affiliationProspect == 'Finalizado' || $row->affiliationProspect == 'En proceso' || $row->affiliationProspect == 'Rechazado') { ?>
                                    <p class="item-int-data check"><span class="icon-trending-up ico-d62"></span>Estado: Aprobación Final | <?= $row->affiliationProspect ?></p>
                                <?php } elseif ($row->trainingProspect == 'Finalizado' || $row->trainingProspect == 'En proceso') { ?>
                                    <p class="item-int-data check"><span class="icon-trending-up ico-d62"></span>Estado: Afiliación y capacitación | <?= $row->trainingProspect ?></p>
                                <?php } elseif ($row->openingProspect == 'Finalizado' || $row->openingProspect == 'En proceso') { ?>
                                    <p class="item-int-data check"><span class="icon-trending-up ico-d62"></span>Estado: Apertura de cuenta | <?= $row->openingProspect ?> </p>
                                <?php } elseif ($row->visitedProspect == 'Finalizado' || $row->visitedProspect == 'En proceso') { ?>
                                    <p class="item-int-data check"><span class="icon-trending-up ico-d62"></span>Estado: Prospecto visitado | <?= $row->visitedProspect ?></p>
                                <?php } else { ?>
                                    <p class="item-int-data check"><span class="icon-trending-up ico-d62"></span>Estado: No iniciado</p>
                                <?php } ?>
                            </section>
                        </section>


                        <section class="itemcontact-right1">
                            <?php $titulo = create_slug($row->category . " " . $row->nameCProspect) ?>
                            <a href="<?= base_url() ?>/Aprobador/detalle/<?= $titulo ?>-<?= $row->idProspect ?>" class="icon-info ico-dj7f8s7s"></a>
                            <a href="#proceso-<?= $row->idProspect ?>" class="icon-trending-up ico-dj7f8s7s"></a>

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
        <a id="cerrarFiltros" href="#cerrar" class="icon-x-circle ico-clspop"></a>
        <div class="wrap-nav-int">
            <p class="title-pop1">Filtrar estados de avance</p>

            <p class="item-estados-pop"><span class="icon-check ico-836dh"></span> En proceso</p>
            <p class="item-estados-pop"><span class="icon-check ico-836dh"></span> Rechazados</p>

            <span class="line-pop"></span>

            <p class="item-estados-pop"><span class="icon-check ico-836dh"></span> Finalizados</p>
            <p class="item-estados-pop"><span class="icon-check ico-836dh"></span> Quitar filtros</p>

            <button class="bt-next1" id="guardarFiltro">Guardar <span class="icon-arrow-right ico-djde837"></span></button>
        </div>
    </div>

    <?php foreach ($data->prospects as $row) { ?>
        <div class="awesome-nav" id="proceso-<?= $row->idProspect ?>">
            <a href="#cerrar" class="icon-x-circle ico-clspop"></a>
            <div class="wrap-nav-int">
                <form id="frmProspect<?= $row->idProspect ?>" method="POST">
                    <p class="title-pop2"><span><?= $row->category ?></span>, <?= $row->nameCProspect ?></p>
                    <?php
                    $options = [
                        "Estado",
                        "No iniciado",
                        "En proceso",
                        "Rechazado",
                        "Finalizado"
                    ];
                    ?>

                    <input name="idProspect<?= $row->idProspect ?>" id="idProspect<?= $row->idProspect ?>" type="hidden" value="<?= $row->idProspect ?>">
                    <select name="affiliationProspect<?= $row->idProspect ?>" id="affiliationProspect<?= $row->idProspect ?>" class="campo-registro" onchange="toggleNotaProspect(<?= $row->idProspect ?>)">
                        <?php foreach ($options as $option) : ?>
                            <option value="<?= $option ?>" <?= ($row->affiliationProspect === $option) ? 'selected' : '' ?>>
                                <?= $option ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <input name="imgAffiliationProspect<?= $row->idProspect ?>" onchange="cambiarImg(event, <?= $row->idProspect ?>)" id="imgAffiliationProspect<?= $row->idProspect ?>" type="file" class="campo-registro mrdwn" accept="image/*,.pdf" placeholder="Adjuntar imagen">
                    <input id="imgAffiliationProspectValue<?= $row->idProspect ?>" name="imgAffiliationProspectValue<?= $row->idProspect ?>" type="hidden" value="<?= $row->imgAffiliationProspect ?>">

                    <section id="notaProspectContainer<?= $row->idProspect ?>" class="writting" style="display: none;">
                        <textarea name="notaProspect<?= $row->idProspect ?>" class="campo-registro-txtar" rows="3" placeholder="Escribir mensaje"></textarea>
                    </section>

                    <a href="javascript:void(0)" onclick="btnAgregarProspect(this, <?= $row->idProspect ?>)" class="bt-next1">Confirmar <span class="icon-edit-3 ico-djde837"></span></a>
                </form>
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
                            // Verificar si $row->installedProspect es igual a 'finalizado'
                            var installedProspect = item.querySelector(".item-int-data.check:nth-child(1)").textContent;
                            if (!installedProspect.includes('Instalado y validado')) {
                                item.style.display = "";
                                itemsContainer.appendChild(item.cloneNode(true));
                            } else {
                                item.style.display = "none";
                            }
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
                        if (filtroActivo == "Finalizados") {
                            filtroActivo = "Instalado y validado";
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