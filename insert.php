<?php

    include "database.php";

    $codigo=$_POST['codigo'];
    $nombre=strtoupper( $_POST['producto']);
    $cantidad=$_POST['cantidad'];
    $costo=$_POST['costo'];
    $error1 = 0;

    $sql_validation = "SELECT * FROM productos WHERE codprod = '$codigo' ";
	$result=$conn->query($sql_validation);
    
    if($result->num_rows == 0){
        if($_FILES["foto"]["error"]){
            $error1 = 1;
            echo "<script language='javascript'>alert('Imagen no cargada o presenta errores')</script>";
            echo "<script language='javascript'>alert('Imagen predeterminada')</script>";
            header("Refresh:0;url=view_create.php");
        }

        $peso = 2000;
        if ($_FILES["foto"]["size"] <= $peso*1024){
            if ($error1==1){
                $direccion = "products/default.png";
            } else {
                $name_file = $_FILES["foto"]["name"];

                $extension=explode(".",$_FILES['foto']['name']); 
                $extension=$extension[count($extension)-1];
                $direccion = "products/".$codigo.".".$extension;

                if(!file_exists($name_file)){
                    move_uploaded_file($_FILES["foto"]["tmp_name"],"products/".$codigo.".".$extension);                        
                }  
            }
            $sql="INSERT INTO productos (codprod,nomprod,cantprod,pcosto,imagen)VALUES('$codigo','$nombre',$cantidad,$costo,'$direccion')";

            if ($conn->query($sql)===true) {
            echo "<script languaje='javascript'>alert('Producto registrado con exito')</script>";
            header("Refresh:0;url=index.php");   
            } else {
            echo "Error:".$sql."<br>".$conn->error;
            }
        } else {
            echo "<script language='javascript'>alert('El archivo excede el tamaño')</script>";
            header("Refresh:0;url=view_create.php");
        }
    } else {
        echo "<script language='javascript'>alert('El producto ya existe')</script>";
        header("Refresh:0;url=view_create.php");
    }

?>