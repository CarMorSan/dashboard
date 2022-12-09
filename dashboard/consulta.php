<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include_once "config.php";
    $array = array();
    $arrayNuevo=array();

    $consulta="SELECT genero, matematicas,espanol,historia, geografia, ciencias FROM estudiantes";
    $sentencia=$db->prepare($consulta);
    
    if($sentencia->execute()){
        $sentencia->bind_result($genero, $matematicas,$espanol,$historia, $geografia, $ciencias);
        while($sentencia->fetch()){
            $array['genero']=$genero;
            $array['matematicas']=$matematicas;
            $array['espanol']=$espanol;
            $array['historia']=$historia;
            $array['geografia']=$geografia;
            $array['ciencias']=$ciencias;
            $arrayNuevo[]=$array;
        }
        echo json_encode($arrayNuevo);
    }
    
}


?>