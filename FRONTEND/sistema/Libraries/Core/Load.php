<?php 
	$urlTranslations = [
		'Inicio' => 'Home',
		'Prospectos' => 'Prospects',
		'Personal' => 'Staffs',
		'Rechazados' => 'Rejected',
		'Login' => 'Login',
		'Promotor' => 'Promoter',
		'Aprobador' => 'Approver',
		'Instalador' => 'Installer',
		'Comercios' => 'Mercies',
		'Usuarios' => 'Users'
	];

	$urlTranslationsMethod = [
		'index' => 'index',
		'detalle' => 'detail',
		'eliminar' => 'delete',
		'mapa' => 'mapa',
		'agregarProspect' => 'agregarProspect',
		'agregarStaff' => 'agregarStaff',
		'agregarUser' => 'agregarUser',
		'validar' => 'validar',
		'sendRejected' => 'sendRejected',
		'editarStaff' => 'editarStaff',
		'editarUser' => 'editarUser',
		'pasarComercio' => 'pasarComercio',
		'addComments' => 'addComments',
		'cerrar' => 'logout',
		'sendEmail' => 'sendEmail'
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