<?php

    include("database.php");

      $firstname=$_POST['uname'];
      $lastname=$_POST['ulastname'];
	   $gender=$_POST['gender'];
    $email=$_POST['uemail'];

	if($gender == "M")
		$photo = "images/boy.png";
	else if ($gender == "O")
		$photo = "images/avatar.png";
  else
    $photo = "images/girl.png";


    //$pswd=MD5($_POST['pswd']);
	$pswd=password_hash($_POST['pswd'],PASSWORD_DEFAULT);
//Validar que no se repita el correo en el registro
    $sql_validation = "SELECT * FROM usuarios WHERE email = '$email' ";
	$result=$conn->query($sql_validation);
  //compara correos
	if($result->num_rows == 0){
		$sql="INSERT INTO usuarios (firstname, lastname, sexo, email, password, photo) VALUES('$firstname','$lastname','$gender','$email','$pswd','$photo')";

		if ($conn->query($sql)===true) {
			echo "<script language='javascript'>alert('Usuario regisrado con exito')</script>";
			header("Refresh:0;url=login.php");
		}else{
			echo "Error:".$sql."<br>".$conn->error;
		}
	}else{
		echo "<script language='javascript'>alert('Usuario ya existe')</script>";
		header("Refresh:0;url=signup.php");
	}

?>
