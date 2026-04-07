<?php
session_start();
if (!isset($_SESSION['usuario'])) { header("Location: index.php"); exit(); }
require 'conexion.php';

if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $desc = $_POST['descripcion'];

    if (!empty($nombre) && !empty($desc)) {
        mysqli_query($conn, "INSERT INTO registros (nombre_item, descripcion) VALUES ('$nombre', '$desc')");
    }
}
$items = mysqli_query($conn, "SELECT * FROM registros ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Datos</title>
    <style>
        body { font-family: sans-serif; background: #ecf0f1; padding: 40px; }
        .container { background: white; padding: 20px; border-radius: 8px; max-width: 800px; margin: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #bdc3c7; padding: 12px; text-align: left; }
        th { background: #3498db; color: white; }
        tr:nth-child(even) { background: #f2f2f2; }
        .logout { float: right; color: #e74c3c; text-decoration: none; font-weight: bold; }
        .form-box { background: #f9f9f9; padding: 15px; border-left: 5px solid #3498db; margin-bottom: 20px; }
        input { padding: 8px; margin-right: 10px; border: 1px solid #ccc; }
        input[type="submit"] { background: #3498db; color: white; border: none; cursor: pointer; padding: 8px 20px; }
    </style>
</head>
<body>
    <div class="container">
        <a href="logout.php" class="logout">Cerrar Sesión</a>
        <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?></h1>

        <div class="form-box">
            <h3>Registrar Nuevo Dato</h3>
            <form method="POST">
                <input type="text" name="nombre" placeholder="Nombre del Equipo" required>
                <input type="text" name="descripcion" placeholder="Descripción breve" required>
                <input type="submit" name="guardar" value="Guardar">
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($items)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre_item']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>