<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-qrnge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>GENNS|Promedio</title>
    <style>
        #myChart {
            width: 100px;
            height: 100px;
        }
        .header-btn2 a {
        padding: 10px 20px;
        color: #fff;
        font-size: 15px;
        font-weight: 600;
        }

        .header-btn2 .login2 {
            background: #04BD7D;
            border: 2px solid transparent;
            border-radius: 5px;
            transition: all .50s ease;
            
        }

        .header-btn2 .login2:hover {
            border: 2px solid #04BD7D;
            opacity: 50%;
        }

        .header-btn3 a {
        padding: 10px 20px;
        color: #fff;
        font-size: 15px;
        font-weight: 600;
        }

        .header-btn3 .login3 {
            background: #04BD7D;
            border: 2px solid transparent;
            border-radius: 5px;
            transition: all .50s ease;
            

        }

        .header-btn3 .login3:hover {
            border: 2px solid #04BD7D;
            opacity: 50%;
        }
    </style>
</head>
<body>
    <?php
    // llamado al archivo con las funciones
    require_once("prueba_promedio/extraerDatos.php");
    ?>

    <header>
        <a href="index.php" class="logo"><img class="log" src="img/GENNS-PhotoRoom.png-PhotoRoom.png" alt="GENNS">GENNS</a>
        <div class="bx bx-menu" id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="nosotros.php">Nosotros</a></li>
            <li><a href="contacto.php">Contacto</a></li>
        </ul>
        <div class="header-btn">
            <a href="login.php" class="login">Iniciar Sesión</a>
        </div>
    </header>
    <main>
        <br>
        <br>
        <div>
            <!-- Objeto canvas -->
            <canvas id="myChart" width="50" height="10"></canvas>
        </div>
        <!-- Llamado a la librería -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('myChart');
            const data = JSON.parse(`<?php echo obtenerConocimientoSiUsaInternet(); ?>`);
            const niveles = ["Bajo", "Medio", "Alto"];
            const internetLabels = ["No", "Si"];
            
            const datasets = niveles.map(nivel => ({
                label: nivel,
                data: internetLabels.map(internet => {
                    const items = data.filter(item => item.Nivel === nivel && item.Internet === internet);
                    return items.length > 0 ? items[0].Cantidad : 0;
                }),
                backgroundColor: getRandomColor()
            }));
            
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: internetLabels,
                    datasets: datasets
                },
                options: {
                    scales: {
                        x: {
                            stacked: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            
            function getRandomColor() {
                const letters = '0123456789ABCDEF';
                let color = '#';
                for (let i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }
        </script>
        <br>
        <br>
        <div class="header-btn2">
                <a href="promedio4.php" class="login2">Siguiente Grafico</a>
        </div>
        <br>
        <br>
        <div class="header-btn3">
                <a href="promedio2.php" class="login3">Grafico Anterior</a>
        </div>
    </main>
    <br>
    <footer>
        <div class="container__footer">
            <div class="box__footer">
                <div class="logof">
                    <a href="index.php"><img src="img/GENNS-PhotoRoom.png-PhotoRoom.png" alt="GENNS"></a>
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
                <h2>Compañía</h2>
                <a href="#">Empleo</a>
                <a href="#">Servicios</a>
                <a href="#">Política y Privacidad</a>
            </div>
            <div class="box__footer">
                <h2>Redes Sociales</h2>
                <a href="#"><i class="fab fa-facebook-square"></i> Facebook</a>
                <a href="#"><i class="fab fa-twitter-square"></i> Twitter</a>
                <a href="#"><i class="fab fa-instagram-square"></i> Instagram</a>
            </div>
        </div>
    </footer>
    <script src="acciones/js.js"></script>
</body>
</html>
