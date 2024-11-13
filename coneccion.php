<?php
// config.php
session_start();

$DB_HOST= 'localhost';
$DB_USER= 'root';
$DB_PASS= '';
$DB_NAME= 'partyfinder';

function getDBConnection() {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    return $conn;
}

// Procesar el registro
if (isset($_POST['bsubmit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); 
    
    $conn = getDBConnection();
    
    // Verificar si el usuario ya existe
    $checkUser = $conn->prepare("SELECT Username FROM usuarios WHERE Username = ? OR Email = ?");
    $checkUser->bind_param("ss", $username, $email);
    $checkUser->execute();
    $result = $checkUser->get_result();
    
    if ($result->num_rows > 0) {
        echo "<script>alert('El usuario o email ya existe');</script>";
        echo "<script>window.location.href = 'login.html';</script>";
    } else {
        // Insertar nuevo usuario
        $stmt = $conn->prepare("INSERT INTO usuarios (Username, Pasword, Email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $email);
        
        if ($stmt->execute()) {
            $_SESSION['username'] = $username;
            echo "<script>alert('Registro exitoso');</script>";
            echo "<script>window.location.href = 'page.html';</script>";
        } else {
            echo "<script>alert('Error en el registro');</script>";
            echo "<script>window.location.href = 'login.html';</script>";
        }
        $stmt->close();
    }
    $conn->close();
}

// Procesar el login
if (isset($_POST['blogin'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    $conn = getDBConnection();
    
    $stmt = $conn->prepare("SELECT Username FROM usuarios WHERE Username = ? AND Pasword = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        echo "<script>window.location.href = 'page.html';</script>";
    } else {
        echo "<script>alert('Usuario o contraseña incorrectos');</script>";
        echo "<script>window.location.href = 'login.html';</script>";
    }
    
    $stmt->close();
    $conn->close();
}
?>
