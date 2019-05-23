<?php

    include("database.php");

    $firstname = $_POST['uname'];
    $lastname = $_POST['ulastname'];
    $ide_user= $_POST['identi'];
    $gender = $_POST['gender'];
    $email = $_POST['uemail'];
    $error1 = 0;

    if($_FILES["photo"]["error"]){
        $error1 = 1;
        echo "<script language='javascript'>alert('Imagen no cargada o presenta errores')</script>";
        echo "<script language='javascript'>alert('Imagen predeterminada')</script>";
        header("Refresh:0;url=login.php");
    }
    

    //$pswd=MD5($_POST['pswd']);
	$pswd=password_hash($_POST['pswd'],PASSWORD_DEFAULT);

    //Validar que no se repita la identificacion en el registro
    $sql_validation = "SELECT * FROM usuarios WHERE identi = '$ide_user' ";
	$result=$conn->query($sql_validation);
    
    if($result->num_rows == 0){
        
        //Validar que no se repita el correo en el registro
        $sql_validation = "SELECT * FROM usuarios WHERE email = '$email' ";
        $result=$conn->query($sql_validation);
        
        //compara correos
        if($result->num_rows == 0){
            $peso = 2000;
            if ($_FILES["photo"]["size"] <= $peso*1024){

                if ($error1==1){
                    if($gender == "M"){
                        $direccion = "images/boy.png";
                    } else if ($gender == "O") {
                        $direccion = "images/avatar.png";
                    } else {
                        $direccion = "images/girl.png";
                    }
                } else {
                    $carpeta = "images/".$ide_user.'/';
                    $name_file = $_FILES["photo"]["name"];

                    $extension=explode(".",$_FILES['photo']['name']); 
                    $extension=$extension[count($extension)-1];
                    $direccion = $carpeta.$ide_user.".".$extension;

                    //Verifica si existe la ruta
                    if(!file_exists($carpeta)){
                        mkdir($carpeta);
                    }
                    if(!file_exists($name_file)){
                        move_uploaded_file($_FILES["photo"]["tmp_name"],$carpeta.$ide_user.".".$extension);                        
                    }  
                }

                    $sql="INSERT INTO usuarios (firstname, lastname, identi, sexo, email, password, photo) VALUES('$firstname','$lastname','$ide_user','$gender','$email','$pswd','$direccion')";
                    if ($conn->query($sql)===true) {
                        echo "<script language='javascript'>alert('Usuario regisrado con exito')</script>";
                        header("Refresh:0;url=login.php");
                    } else {
                        echo "Error:".$sql."<br>".$conn->error;
                    }

             } else {
                echo "<script language='javascript'>alert('El archivo excede el tamaño')</script>";
                header("Refresh:0;url=signup.php");
           } 
        } else {
                echo "<script language='javascript'>alert('El correo ya existe')</script>";
                header("Refresh:0;url=signup.php");
        }
    } else {
        echo "<script language='javascript'>alert('Usuario ya existe')</script>";
        header("Refresh:0;url=signup.php");
    }

?>