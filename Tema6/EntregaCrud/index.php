<?php
session_start();

include_once 'app/funciones.php';
include_once 'app/acciones.php';

// Tabla de usuarios
if (!isset ($_SESSION['tuser'])){
    $_SESSION['tuser'] = cargarDatos();  
}

// Div con contenido
$contenido="";
$altaOK = true;

if ($_SERVER['REQUEST_METHOD'] == "GET" ){
    
    if (isset($_GET['orden'])){
        switch ($_GET['orden']) {
            case "Nuevo"    : accionAlta(); break;
            case "Borrar"   : accionBorrar   ($_GET['id']); break;
            case "Modificar": accionModificar($_GET['id']); break;
            case "Detalles" : accionDetalles ($_GET['id']); break;
            case "Terminar" : accionTerminar(); break;
        }
    }
} 
// POST Formulario de alta o de modificación
else {
    if (isset($_POST['orden'])){
         switch($_POST['orden']) {
             case "Nuevo"    : 
                if(!accionPostAlta()){
                    $altaOK=false;
                } 
                break;
             case "Modificar": accionPostModificar($_GET['id']); break;
             case "Detalles":; // No hago nada
         }
    }
}

if(isset($_GET['orden']) && $_GET['orden']=="Terminar"){
    $contenido = accionTerminar();
    session_destroy();
}else{
    $contenido.= mostrarDatos();
}

if($altaOK){
    include_once "app/layout/principal.php";
}








