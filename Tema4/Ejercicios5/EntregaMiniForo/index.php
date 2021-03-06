<html>
<head>
<meta charset="UTF-8">
<link href="web/default.css" rel="stylesheet" type="text/css" />
<title>MINIFORO</title>
</head>
<body>
<div id="container" style="width: 450px;">
<div id="header">
<img src="web/logo.png" alt="mini foro logo" width="100px" height="100px">
<h1>MINIFORO versión 1.0</h1>
</div>

<div id="content">

<?php 
// PRIMERA APROXIMACIÓN AL MODELO VISTA CONTROLADOR. 
// Funciones auxiliars Ej- usuarioOK
session_start();
include_once 'app/funciones.php';

if (!isset($_REQUEST['orden']) ){
    include_once 'app/entrada.php';
    exit();
} 

if($_REQUEST['orden'] == "Entrar"){
    // Chequear usuario
    if(isset($_REQUEST['nombre']) && isset($_REQUEST['contraseña']) && 
               usuarioOK($_REQUEST['nombre'], $_REQUEST['contraseña'] )) {
               echo " Bienvenido <b>".$_REQUEST['nombre']."</b><br>";               
               $_SESSION['usuario'] = $_REQUEST['nombre'];
               include_once  'app/comentario.html';
               
    }else {
            include_once 'app/entrada.php';
            echo " <br> Usuario no válido </br>";
    }
        exit();
}else{
    if(!isset($_SESSION['usuario'])){
        include_once 'app/entrada.php';
        exit();
    }   

    switch($_REQUEST['orden']){
        case "Nueva opinion":
            echo " Nueva opinión <br>";
            include_once  'app/comentario.html';
            break;
        case "Detalles": // Mensaje y detalles
            echo "Detalles de su opinión";
            include_once 'app/comentariorelleno.php';
            include_once 'app/detalles.php';
            break;
        case "Terminar": // Formulario inicial
            include_once 'app/entrada.php';
            session_destroy();
    }    
}

?>
</div>
</div>
</body>
</html>
