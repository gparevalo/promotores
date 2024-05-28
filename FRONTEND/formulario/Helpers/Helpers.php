<?php

function base_url()
{
    return BASE_URL;
}

function getModal(string $nameModal, $data)
{
    $view_modal = "Views/Template/Modals/{$nameModal}.php";
    require_once $view_modal;
}

function getFile(string $url, $data)
{
    ob_start();
    require_once("Views/{$url}.php");
    $file = ob_get_clean();
    return $file;
}

function media()
{
    return BASE_URL . "/Assets";
}

function getHeader($data = "")
{
    $view_header = "Views/Templates/header.php";
    require_once($view_header);
}

function getHead($data = "")
{
    $view_head = "Views/Templates/head.php";
    require_once($view_head);
}

function getFooter($data = "")
{
    $view_footer = "Views/Templates/footer.php";
    require_once($view_footer);
}

function getJS($data = "")
{
    $view_JS = "Views/Templates/js.php";
    require_once($view_JS);
}

function getLoading($data = "")
{
    $view_loading = "Views/Templates/loading.php";
    require_once($view_loading);
}

function getPageMaster($ruta = "")
{
    $view_page_master = "Views/Templates/page-master/$ruta.php";
    require_once($view_page_master);
}

function create_slug($str)
{
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $str)));
    $slug = rtrim($slug, '-');
    return $slug;
}

function formatearFecha($fecha, $zonaHoraria = 'America/Lima')
{
    $diasSemana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    $fechaObj = new DateTime($fecha, new DateTimeZone($zonaHoraria));

    if (!$fechaObj) {
        return 'Fecha no válida';
    }

    $diaSemana = $diasSemana[$fechaObj->format('w')];
    $mesNombre = $meses[$fechaObj->format('n') - 1];

    $fechaFormateada = "{$diaSemana} {$fechaObj->format('j')}, {$mesNombre} {$fechaObj->format('Y')}";
    return $fechaFormateada;
}

function formatearHora($hora)
{
    $horaObj = DateTime::createFromFormat('H:i:s', $hora);

    if ($horaObj) {
        return $horaObj->format('h:i A');
    } else {
        return '';
    }
}
