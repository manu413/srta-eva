<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
   <form action="interaccioBD.php" method="post">

   <label>
       identificacion:
        <input type="text" name="ident">
   </label> 
   <br><br>
   <label>
       nombre:
        <input type="text" name="nombre">
   </label> 
   <br><br>
   <label>
       gmail:
        <input type="text" name="gmail">
   </label> 
   <br><br>
   <label>
       mensaje:
        <input type="text" name="mensaje">
   </label> 
   <br><br>
    <input type="submit" value="Guardar Datos" name="btn">
    <input type="submit" value="Consultar" name="consulta">
    <input type="submit" value="modificar" name="mod">
    <input type="submit" value="eliminar" name="eli">
   </form>



   <?php
    if(isset($_POST['btn'])){ 
       include('conectar.php');


       $documento = $_POST['ident'];
       $nombre = $_POST['nombre'];
       $grado = $_POST['grado'];
       $promedio = $_POST['prom'];


       $conectar->query(" INSERT INTO $tablaEstudiante(identificacion, nombre, grado, promedio) VALUE ('$documento', '$nombre', '$grado', '$promedio')");

       include("desconectar.php");
       }  

       if(isset($_POST['consulta'])){

        include("conectar.php");


        $Documento = $_POST['ident'];
        $Nombre = $_POST['nombre'];
        $grado = $_POST['grado'];
        $promedio = $_POST['prom'];

        //En la variable $datos se guarda la consulta de la tabla estudiante.
        $datos = mysqli_query($conectar, "SELECT * FROM $tablaEstudiante WHERE promedio =  '$promedio'");
        //Se crea un while que recorra la variable $datos y cada registro que encuetre lo guarda en la variable $condulta
        while($consulta = mysqli_fetch_array($datos)){
        //imprime por pantalla lo que encuentra con cada iteracion del While
          echo $consulta['nombre'].'<br>';// unicamente muestra por pantalla el valor de lo que se pide a través de la variable $consulta
        }
        
        include("desconectar.php");
        
        }   


        if(isset($_POST['mod'])){

            include("conectar.php");
    
    
            $Documento = $_POST['ident'];
            $Nombre = $_POST['nombre'];
            $grado = $_POST['grado'];
            $promedio = $_POST['prom'];

            
            if($Documento == "" || $Nombre == "" ||  $grado == "" ||  $promedio == ""){
                echo"el campo es obligatorio para la modificacion";
            }else {
                $buscar =0;
                //En la variable $datos se guarda la consulta de la tabla estudiante.
                $datos = mysqli_query($conectar, "SELECT * FROM $tablaEstudiante WHERE identificacion = '$Documento'");
                //Se crea un while que recorra la variable $datos y cada registro que encuetre lo guarda en la variable $condulta
                while($consulta = mysqli_fetch_array($datos)){
                     $buscar++;
                }
    
                if($buscar == 0){
                    echo"el documento no existe en la base de datos";
                }else {
                    mysqli_query($conectar,"UPDATE $tablaEstudiante SET identificacion = '$Documento',nombre = '$Nombre',grado = '$grado',promedio = '$promedio' WHERE identificacion = '$Documento'");
                    echo"se modifico con exito";
    
                }
            }

            

            
            include("desconectar.php");
            
            }  
            
            

            if(isset($_POST['eli'])){

                include("conectar.php");
        
        
                $Documento = $_POST['ident'];
               /* $Nombre = $_POST['nombre'];
                $grado = $_POST['grado'];
                $promedio = $_POST['prom'];*/
    
                
                if($Documento == ""){
                    echo"el campo es obligatorio para la modificacion";
                }else {
                    $buscar =0;
                    //En la variable $datos se guarda la consulta de la tabla estudiante.
                    $datos = mysqli_query($conectar, "SELECT * FROM $tablaEstudiante WHERE identificacion = '$Documento'");
                    //Se crea un while que recorra la variable $datos y cada registro que encuetre lo guarda en la variable $condulta
                    while($consulta = mysqli_fetch_array($datos)){
                         $buscar++;
                    }
        
                    if($buscar == 0){
                        echo"el documento no existe en la base de datos";
                    }else {
                        mysqli_query($conectar,"DELETE FROM $tablaEstudiante WHERE identificacion = '$Documento'");
                        echo"el registro se elimino correctamente";
                       
        
                    }
                }
    
                
    
                
                include("desconectar.php");
                
                } 
   ?>


</body>
</html>