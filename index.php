<?php
session_start();
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Buscamos el usuario y la contraseña tal cual se escriben
    $sql = "SELECT * FROM usuarios WHERE username = '$user' AND password = '$pass'";
    $res = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($res) > 0) {
        $_SESSION['usuario'] = $user;
        header("Location: dashboard.php");
    } else {
        $error = "Usuario o clave incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Básico - UGB</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #2c3e50; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        form { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.3); width: 300px; }
        h2 { text-align: center; color: #333; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #27ae60; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; }
        button:hover { background: #219150; }
        .error { color: #e74c3c; font-size: 14px; text-align: center; }
    </style>
</head>
<body>
    <form method="POST">
        <h2>Laboratorio 2</h2>
        <input type="text" name="username" placeholder="Usuario (admin)" required>
        <input type="password" name="password" placeholder="Contraseña (1234)" required>
        <button type="submit">Ingresar</button>
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
    </form>
</body>
</html>