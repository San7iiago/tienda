<?php
    include 'database.php';

    $id=$_GET['id'];
    $cod=$_GET['cod'];
    $ruta=$_GET['img'];
    
    
    $sql = "DELETE FROM productos WHERE item=$id AND codprod=$cod";
    $conn ->query($sql);
    
    if ($ruta != "products/default.png"){
        unlink($ruta);
    }
    
   
    echo "<script languaje='javascript'>alert('Producto eliminado')
    </script>";

    header("refresh:0; url=index.php");
?>