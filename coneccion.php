<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilosp.css">
    <title>consulta db</title>
    <style type="text/css">

      *{
        background-color:#081b29;
      }
      
      body{
    height: 100hv;
    background: url(imagenes/fondo2.png) no-repeat;
    background-size: cover;
    background-position: center;
    display:absolute;
    align-items: center;
    padding: 15% 10%;
      }

      table {
        margin-left:5px;
        background:#fff;
        margin-bottom:15px;
        margin-top:50px;
        border: solid 5px rgba(29,39,88);
        border-collapse: collapse;
                     
      }
     
      th, h1 {
        background-color: #edf797;
        color:#000;
      }

      td,
      th {
        color:#fff;
        border: solid 3px rgba(29,39,88);
        padding: 2px;
        text-align: center;
      }
       a{
        text-decoration:none;
       }
b,h3{
  
  width: 200px;
  margin-left:200px;
}


    </style>
</head>
<body>
<header class="header">
    <a href="index.html" class="logo">PartyFinder</a>

    <nav>
        <a href="index.html">INICIO<span></span></a>
      
    </nav>
</header>

    
</body>
</html>


<?php

$email = $_POST['email'];
$password = md5($_POST['password']);
$username = $_POST['username'];

$user = "root";
$pass ="";
$host ="localhost";

$connection = mysqli_connect($host, $user, $pass);



if(!$connection){
    echo "no se ha podido conectar con el servidor" . mysql_error();
}
else{
    echo "<b><h3>Conectado al servidor</h3></b>";
}

$datab = "partyfinder";
$db = mysqli_select_db($connection,$datab);

    if (!$db){
        echo "no se ha podido encontrar la tabla";
    }
    else{
        echo "<h3>Tabla seleccionada</h3>";
    }
    $instruccion_SQL = "INSERT INTO usuarios(Username, Pasword, Email)
    VALUES ('$username','$password','$email')";
  
   
$resultado = mysqli_query($connection,$instruccion_SQL);


$consulta = "SELECT * FROM usuarios";

$result = mysqli_query($connection,$consulta);
if(!$result) 
{
echo "No se ha podido realizar la consulta";
}
echo "<table>";
echo "<tr>";
echo "<th><h1>ID</th></h1>";
echo "<th><h1>USUARIO</th></h1>";
echo "<th><h1>CONTRASEÑA</th></h1>";
echo "<th><h1>CORREO</th></h1>";
echo "</tr>";

while ($colum = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td><h2>" . $colum['iduser']. "</td></h2>";
echo "<td><h2>" . $colum['Username']. "</td></h2>";
echo "<td><h2>" . $colum['Pasword'] . "</td></h2>";
echo "<td><h2>" . $colum['Email'] . "</td></h2>";
echo "</tr>";
}
echo "</table>";

mysqli_close( $connection );





?>
