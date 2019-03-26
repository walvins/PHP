<?php
// Incluir la lógica del modelo
require_once('../Modelo/modelo.php');

// Obtener la lista de artículos
$datos = getDatos();

// Incluir la lógica de la vista
require('../Vista/vista.php');
?>