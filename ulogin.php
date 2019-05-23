<?php
include("database.php");

$email = $_POST['email'];
$pswd = $_POST['pswd'];

$sql_validation = "SELECT * FROM usuarios WHERE email = '$email'";
$result=$conn->query($sql_validation);

if($result->num_rows == 1){
    $sql_validation2 = "SELECT password FROM usuarios WHERE email = '$email'";
    $result2=$conn->query($sql_validation2);
    $row = $result->fetch_assoc();
    $compara = $row["password"];
    echo $compara . $pswd;

    if (password_verify($pswd, $compara)) {
      echo "<script language='javascript'>alert('Sesion iniciada')</script>";
      header("Refresh:0;url=index.php");
    } else {
      echo "<script language='javascript'>alert('Contraseña incorrecta')</script>";
      header("Refresh:0;url=login.php");
    }
} else {
  echo "<script language='javascript'>alert('Email incorrecto')</script>";
  header("Refresh:0;url=login.php");
}
?>
