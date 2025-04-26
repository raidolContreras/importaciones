<?php

Class ControllerTemplate{

	/*=============================================
	Llamada a la plantilla
	=============================================*/

	public function ctrBringTemplate(){

		include "view/template.php";

	}

	public function ctrBringLogin(){

		include "view/login.php";

	}

}