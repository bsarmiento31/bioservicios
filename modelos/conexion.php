<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=ingbio_appBdingb",
			            "ingbio_userappin",
			            "app.1240aa");

		$link->exec("set names utf8");

		return $link;

	}

}