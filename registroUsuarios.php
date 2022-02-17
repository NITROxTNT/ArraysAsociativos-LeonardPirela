<?php 

session_start();

if (!empty($_POST['reiniciar'])) {$_SESSION['contador'] = ""; $_SESSION['usuario'] = ""; echo json_encode(3); die();} 

if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['cedula']) && !empty($_POST['trabajo']) && !empty($_POST['departamento']) && !empty($_POST['sueldo'])){

    if ($_SESSION['contador'] >= 3) {echo json_encode(2); die();}

    if(!isset($_SESSION['contador'])){
        
        $_SESSION['contador'] = 0; 
        $_SESSION['usuario'] = array();
        

    } 
    
    $usuario = array (
        "nombre" => $_POST['nombre'],
        "apellido" => $_POST['apellido'],
        "cedula" => $_POST['cedula'],
        "trabajo" => $_POST['trabajo'],
        "departamento" => $_POST['departamento'],
        "sueldo" => $_POST['sueldo'],
    );

    $_SESSION['usuario'][] = $usuario;
    $_SESSION['contador']++;
    if ($_SESSION['contador'] >= 3)
    {echo json_encode($_SESSION['usuario']);}

}

else {echo json_encode(1);} 

?>