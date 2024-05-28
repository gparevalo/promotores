<?php 
	$urlTranslations = [
		'Inicio' => 'Home',
		'Prospectos' => 'Prospects',
		'Personal' => 'Staffs',
		'Rechazados' => 'Rejected'
	];

	$urlTranslationsMethod = [
		'index' => 'index',
		'detalle' => 'detail',
		'mapa' => 'mapa',
		'agregarProspect' => 'agregarProspect',
		'agregarStaff' => 'agregarStaff'
	];

	$controller = ucwords($controller);

	$controller = $urlTranslations[$controller];
	$method = $urlTranslationsMethod[$method];
	
	$controllerFile = "Controllers/".$controller.".php";
	if(file_exists($controllerFile))
	{
		require_once($controllerFile);
		$controller = new $controller();
		if(method_exists($controller, $method))
		{
			$controller->{$method}($params);
		}else{
			require_once("Controllers/Error.php");
		}
	}else{
		require_once("Controllers/Error.php");
	}

 ?>