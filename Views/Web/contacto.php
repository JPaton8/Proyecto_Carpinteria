<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carpinteria - Contacto</title>
    <link rel="stylesheet" href="../../public\css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Raleway:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/app.css">
    <link rel="stylesheet" href="../../public/css/norma.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="shortcut icon" href="../../public/img/logo3.ico">
</head>
<body>
    <header class="header inicio">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.html">
                    <img src="../../public/img/Logo1.png" width="280px" alt="Logotipo">
                </a>

                <div class="mobile-menu">
                    <img src="../../public/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="../../public/img/dark-mode.svg">
                    <nav class="navegacion">
                        <a href="index.php">Inicio</a>
                        <a href="nosotros.php">Nosotros</a>
                        <a href="tienda.php">Tienda</a>
                        <a href="galeria.php">Productos</a>
                        <a href="contacto.php">Contacto</a>
                    </nav>
                </div>
    </header>

    
    <main class="contenido-principal contenedor ">
        <h2 class="text-center">Contacto</h2>
        <img src="" alt="">
        <form class="formulario">
            <fieldset>
                <legend>Tus Datos</legend>
                
                <div class="campo">
                    <label for="nombre">Nombre: </label>
                    <input  id="nombre" type="text" placeholder="Tu Nombre" required>
                </div>

                <div class="campo">
                    <label for="asunto">Asunto:</label>
                    <input id="asunto" type="text" placeholder="Tu Asunto"  required>
                </div>

                <div class="campo">
                    <label for="email">E-mail:</label>
                    <input id="email" type="email" placeholder="Tu Email" >
                </div>

                <div class="campo">
                    <label for="tel">Teléfono:</label>
                    <input id="tel" type="tel" placeholder="Tu Teléfono" >
                </div>

                <div class="campo">
                    <label for="tel">Mensaje:</label>
                    <textarea rows="10" cols="20"></textarea>
                </div>

            </fieldset>

            

            <fieldset>
                <legend>Información Extra</legend>
                
                <div class="campo">
                    <label for="cliente">Cliente</label>
                    <input id="cliente" type="radio" name="tipo" value="cliente">
                </div>

                <div class="campo">
                    <label for="proveedor">Proveedor</label>
                    <input id="proveedor" type="radio" name="tipo" value="proveedor">
                </div>
                
            </fieldset>

            <input class="btn" type="submit" value="Enviar Formulario" >
        </form>
        
    </main>




    <footer class="site-footer">
        <div class="grid-footer contenedor">
            <div>
                <h3>Categorías</h3>

                <nav class="footer-menu">
                    <a href="#">Cocina</a>
                    <a href="#">Oficina</a>
                    <a href="#">Jardín</a>
                    <a href="#">Cochera</a>
                    <a href="#">Dormitorios</a>
                </nav>
            </div>

            <div>
                <h3>Sobre Nosotros</h3>
                <nav class="footer-menu">
                    <a href="#">Nuestra Historia</a>
                    <a href="#">Política de Privacidad</a>
                    <a href="#">Términos del Servicio</a>
                </nav>
            </div>

            <div>
                <h3>Soporte</h3>
                <nav class="footer-menu">
                    <a href="#">Preguntas Frecuentes</a>
                    <a href="#">Ayuda en línea</a>
                    <a href="#">Confianza y Seguridad</a>
                </nav>
            </div>

        </div>

        <p class="copyright">Todos los derechos Reservados
            <a href="#"><i class="fab fa-facebook"></i></a> 
            <a href="#"><i class="fab fa-twitter"></i></a>
        </p>
    </footer>
    <script src="../../public/js/app1.js"></script>
</body>
</html>