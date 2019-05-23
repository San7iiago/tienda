<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Tienda</title>
</head>

<body>
    <header>
        <br>

        <div class="container">
            <h2>Mi tienda</h2>
            <br>
            <!-- Nav tabs -->

            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <input class="form-control mr-sm-2" name="consulta" id="consult" type="text" placeholder="Busca producto por nombre o código">
                <a class="btn btn-primary" href="index.php?search">Buscar</a>

                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="view_create.php">Registrar producto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Iniciar sesion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Registrar Usuario</a>
                    </li>
                </ul>

            </nav>
            <br>
        </div>
    </header>


    <div class="container">
        <h2>Inventario de productos</h2><br>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Item</th>
                    <th>Código</th>
                    <th>Descripción producto</th>
                    <th>Stock</th>
                    <th>Costo</th>
                    <th>Imagen</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                include "database.php";
                $n=1;
                  $sql="SELECT * FROM productos";
                  $result=$conn->query($sql);

                  if($result->num_rows > 0){
                      while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$n."</td>";
                          echo "<td>".$row['codprod']."</td>";
                          echo "<td>".$row['nomprod']."</td>";
                          echo "<td>".$row['cantprod']."</td>";
                          echo "<td>$".$row['pcosto']."</td>";
                          echo "<td align='center'><img src=".$row['imagen']." width=50></td>";
                          echo "<td><a href='form_update.php?id=".$row['item']."&cod=".$row['codprod']."&nom=".$row['nomprod']."&cant=".$row['cantprod']."'><img src='icons/edit_icon.png' width='20'></a> 
                          <a href='delete.php?id=".$row['item']."&cod=".$row['codprod']."&img=".$row['imagen']."'><img src='icons/delecte_icon.png' width='20'></a></td></tr>";
                          $n++;
                      }
                  }else{
                      echo "<div class=alert alert-success>
                      <strong>!no hay productos registrados!.</strong></div>";
                  }
            ?>
            </tbody>
        </table>
    </div>
</body>

</html>