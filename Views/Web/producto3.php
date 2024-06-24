<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carpinteria - Pr3</title>
    <link rel="stylesheet" href="../../public/css/app.css">
    <link rel="stylesheet" href="../../public/css/anuncios.css">
    <link rel="stylesheet" href="../../public/css/norma.css">
    <link rel="shortcut icon" href="../../public/img/logo3.ico">
</head>
<body>
    
    <header class="header inicio">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.html">
                    <img src="../../public/img/Logo1.png" width="340px" alt="Logotipo">
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

    <main class="contenedor seccion contenido-centrado">
        <h1>Mueble de Lujo</h1>

        <picture>
            <source srcset="img/producto1.jpg" type="image/jpg">
            <img loading="lazy" src="../../public/img/producto3.jpg" alt="anuncio">
        </picture>
        <div class="resumen-propiedad">
            <p class="precio">255Bs</p>
           

            <p>El sofá "Elegancia Contemporánea" fusiona líneas limpias y elegancia atemporal. Su diseño contemporáneo se destaca con detalles sutiles que elevan instantáneamente cualquier sala. Los reposabrazos esculpidos y las patas de acero inoxidable aportan un toque moderno y refinado.</p>

                

            </p>
        </div>
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
                    <a href="#">Misión, Visión y Valores</a>
                    <a href="#">Carreras</a>
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
        <a href="https://www.facebook.com/TuPaginaDeFacebook" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-facebook"></i>
        </a>

        </footer>

        <script src="../../public/js/app1.js"></script>
</body>
</html>