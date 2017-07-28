<?php
define(BASE_URL, 'wp-content/themes/'.get_template().'/');
// Code à insérer au début du fichier functions.php
require_once "core/pdoext/pdoext.inc.php";
$db = new pdoext_Connection("mysql:dbname=".DB_NAME.";host=".DB_HOST, DB_USER, DB_PASSWORD);
require_once "core/Autoloader.php";
Core\Autoloader::register();
use Core\App; // ici une classe MyClass de test dans le namespace Core (situé à la racine de /Core)
use Core\Voyage\Voyage; // ici une classe de test dans le namespace Core\Html (Donc le dossier /Core/Html)
use Core\CPT\CPT; // ici une classe de test dans le namespace Core\Html (Donc le dossier /Core/Html)
// global $post;
// var_dump($post);
$App = App::get($db);
 // pour instancier MyClass : Sinon si on a pas mis les 'use' au dessus c'est new Core/MyClass;
// new OtherClass; // pour instancier OtherClass : Sinon si on a pas mis les 'use' au dessus c'est new Core/Html/OtherClass;

/**
 * Création des postypes
 * https://github.com/KevinLedoyen/wp-custom-post-type-class
 * 
 **/
$voyage = new CPT(array(
	'post_type_name' => 'voyage',
	'singular' => 'voyage',
	'plural' => 'voyages',
	'slug' => 'voyage'
	));
$voyage->menu_icon("dashicons-location-alt");

$escale = new CPT(array(
	'post_type_name' => 'escale',
	'singular' => 'escale',
	'plural' => 'escales',
	'slug' => 'escale'
	));
$escale->menu_icon("dashicons-location");

?>
