<?php 
	
	class Views
	{
		function getView($controller, $view, $data="")
		{
			if ($data) {
				$data = json_decode(json_encode($data), false);
			}
			$controller = get_class($controller);
			if($controller == "Home"){
				$view = "Views/".$view.".php";
			}else{
				$view = "Views/".$controller."/".$view.".php";
			}
			require_once ($view);
		}
	}

 ?>