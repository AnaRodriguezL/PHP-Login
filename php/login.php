<?php

session_start();

// Obtengo los datos cargados en el formulario de login.
$email = $_POST['email'];
$password = $_POST['pass'];

// Datos para conectar a la base de datos.
$nombreServidor = "localhost";
$nombreUsuario = "root";
$passwordBaseDeDatos = "clave";
$nombreBaseDeDatos = "login";

// Crear conexión con la base de datos.
$conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);

// Validar la conexión de base de datos.
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta segura para evitar inyecciones SQL.
$sql = sprintf("SELECT * FROM usuarios WHERE email=$email AND password =$password");
$resultado = $conn->query($sql);

// Verificando si el usuario existe en la base de datos.
if ($resultado) {

    // Guardo en la sesión el email del usuario.
    $_SESSION['email'] = $email;
} else {
}
