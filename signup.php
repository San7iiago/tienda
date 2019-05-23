<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function comprobarClave() {
            var clave1 = document.getElementById("pwd").value;
            var clave2 = document.getElementById("pwd2").value;

            if (clave1 == clave2) {
                return true;
            } else {
                alert("Las dos claves son distintas...");
                return false;
            }
        }
    </script>
</head>

<body>

    <div class="container">
        <h2>Sign Up</h2>
        <p>Formulario de registro de usuarios</p>
        <form action="uregister.php" class="was-validated" onSubmit="return comprobarClave()" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="uname">Firstname:</label>
                <input type="text" class="form-control" id="uname" placeholder="Enter Firstname" name="uname" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="uname">Lastname:</label>
                <input type="text" class="form-control" id="ulastname" placeholder="Enter Lastname" name="ulastname" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="uname">Identification:</label>
                <input type="number" class="form-control" id="identi" placeholder="Enter identification" name="identi" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="uname">Gender:</label>
                <select name="gender" class="form-control">
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="O">Other</option>
                </select>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="uname">Email:</label>
                <input type="email" class="form-control" id="uemail" placeholder="Enter email" name="uemail" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="pwd">Confirmar password:</label>
                <input type="password" class="form-control" id="pwd2" placeholder="Enter password" name="pswd2" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
            <font>Subir Imagen</font>
            <input type="file" name="photo" accept="image/gif, .jpg, .png">
            </div>    
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>

</html>