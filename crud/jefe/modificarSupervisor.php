<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos/style.css">
    <link rel="stylesheet" href=".css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>GENNS|Supervisor</title>
</head>

<body>

    <header>
        <a href="../../JefeProyecto.php" class="logo"><img class="log" src="../../img/GENNS-PhotoRoom.png-PhotoRoom.png" alt=""></i>Jefe de Proyecto</a>

        <div class='bx bx-menu' id="menu-icon"></div>

        <ul class="navbar">
            <li><a href="formularioJ.php">Supervisores</a></li>
            <li><a href="formularioE.php">Encuestadores</a></li>
        </ul>

        <div class="header-btn">
            <a href="index.php" class="login">Cerrar Sesion</a>
        </div>

    </header>
    <main>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "encuestas";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $dni = $usuario = $contraseña = "";

    if (isset($_GET['dni'])) {
        $dni = $_GET['dni'];

        $query = "SELECT * FROM superiores WHERE DNI = $dni";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $dni = $row['DNI'];
            $usuario = $row['USUARIO'];
            $contraseña = $row['CONTRASEÑA'];
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dni = $_POST['dni'];
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];

        $sql = "UPDATE superiores SET USUARIO = '$usuario', CONTRASEÑA = '$contraseña' WHERE DNI = '$dni'";

        if ($conn->query($sql) === TRUE) {
            echo "Cambios guardados con éxito";
            header("Location: ../../JefeProyecto.php");
        } else {
            echo "Error al modificar el supervisor: " . $conn->error;
        }
    }


?>
    <h1>Modifique los datos del supervisor</h1>
    <form action="modificarSupervisor.php" method="POST">
        <label for="dni">DNI:</label>
        <input type="text" name="dni" value="<?php echo $dni; ?>" readonly>
        
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" value="<?php echo $usuario; ?>">
        
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" value="<?php echo $contraseña; ?>">
        
        <input type="submit" value="Guardar Cambios">
    </form>
    </main>
    <br>

    <footer>
        <div class="container__footer">
            <div class="box__footer">
                <div class="logof">
                    <a href="Supervisor"><img src="img/GENNS-PhotoRoom.png-PhotoRoom.png" alt=""></a>
                </div>
                <div class="terms">
                    <p></p>
                </div>
            </div>
            <div class="box__footer">
                <h2>Info</h2>
                <a href="#">Empleados</a>
                <a href="#">Nosotros</a>
                <a href="#">Ayuda</a>
            </div>

            <div class="box__footer">
                <h2>Compañia</h2>
                <a href="#">Empleo</a>
                <a href="#">Servicios</a>
                <a href="#">Politica y Privacidad</a>
            </div>

            <div class="box__footer">
                <h2>Redes Sociales</h2>
                <a href="#"> <i class="fab fa-facebook-square"></i> Facebook</a>
                <a href="#"><i class="fab fa-twitter-square"></i> Twitter</a>
                <a href="#"><i class="fab fa-instagram-square"></i> Instagram</a>
            </div>

        </div>
    </footer>

    <script src="acciones/js.js"></script>
</body>

</html>