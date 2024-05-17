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

$connection = mysqli_connect($host, $user, $pass);
echo ""

$email = $_POST["email"];
$password = $_POST["password"];
$username = $_POST["username"];

if(!$connection){
    echo "no se ha podido conectar con el servidor" . mysql_error();
}
else{
    echo "<b><h3>conectado al servidor</h3></b>";
}

$datab = "partyfinder";
$db = mysqli_select_db($connection,$datab);

    if (!$db){
        echo "no se ha podido encontrar la tabla";
    }
    else{
        echo "<h3>tabla seleccionada:</h3>";
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
echo "<th><h1>iduser</th></h1>";
echo "<th><h1>User</th></h1>";
echo "<th><h1>Password</th></h1>";
echo "<th><h1>Email</th></h1>";
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


echo'<a href="index.html"> Volver Atrás</a>';


?>
