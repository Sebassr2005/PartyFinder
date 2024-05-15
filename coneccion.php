<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta db</title>
    <style type="text/css">
     
      table {
        border: solid 2px #7e7c7c;
        border-collapse: collapse;
                     
      }
     
      th, h1 {
        background-color: #edf797;
      }

      td,
      th {
        border: solid 1px #7e7c7c;
        padding: 2px;
        text-align: center;
      }


    </style>
</head>
<body>
    
</body>
</html>


<?php

$user = "root";
$pass ="";
$host ="localhost";

$connection = mysql_connect($host, $user, $pass);

$Email = $_POST["Email"];
$Password = $_POST["Password"];
$Username = $_POST["Email"];

if(!$connection){
    echo "no se ah podido conectar con el srvidor" . mysql_error();
}
else{
    echo "<b><h3>hemos conectado al servidor</h3></b>";
}

$datab = "partyfinder";
$db = mysqli_select_db($connection,$datab);

    if (!$db){
        echo "no se ha podido encontrar la tabla";
    }
    else{
        echo "<h3>tabla seleccionada:</h3>";
    }
    $instruccion_SQL = "INSERT INTO tabla_form (nombre, usuario, contraseña)
    VALUES ('$nombre','$usuario','$contraseña')";
  
   
$resultado = mysqli_query($connection,$instruccion_SQL);


$consulta = "SELECT * FROM tabla_form";

$result = mysqli_query($connection,$consulta);
if(!$result) 
{
echo "No se ha podido realizar la consulta";
}
echo "<table>";
echo "<tr>";
echo "<th><h1>id</th></h1>";
echo "<th><h1>Nombre</th></h1>";
echo "<th><h1>Usuario</th></h1>";
echo "<th><h1>Contraseña</th></h1>";
echo "</tr>";

while ($colum = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td><h2>" . $colum['id']. "</td></h2>";
echo "<td><h2>" . $colum['nombre']. "</td></h2>";
echo "<td><h2>" . $colum['usuario'] . "</td></h2>";
echo "<td><h2>" . $colum['contraseña'] . "</td></h2>";
echo "</tr>";
}
echo "</table>";

mysqli_close( $connection );


echo'<a href="index.html"> Volver Atrás</a>';


?>
