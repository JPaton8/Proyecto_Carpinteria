<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carpinteria - Home</title>
    <link rel="stylesheet" href="../../public/css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Raleway:wght@400;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="shortcut icon" href="../../public/img/logo3.ico">
</head>

<body>
    <header class="header inicio">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php" class="log-container">
                    <img src="../../public/img/Logo1.png" class="logo" alt="Logotipo">
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
                        <a href="../login.php">Login</a>
                    </nav>
                </div>


            </div> <!--.barra-->

            <h1>Venta de Muebles </h1>
        </div>
    </header>

    <main class="contenedor seccion">
        <h2>Más Sobre Nosotros</h2>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="../../public/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>En Carpintería J&J, la seguridad es nuestra principal prioridad. Nos esforzamos por crear un entorno de trabajo y servicio que garantice la protección y el bienestar de nuestros empleados, clientes y visitantes. Para lograr esto, implementamos rigurosas medidas de seguridad en todas las facetas de nuestra operación.</p>
            </div>
            <div class="icono">
                <img src="../../public/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Ofrecemos una consulta inicial gratuita para entender las necesidades del cliente y discutir ideas y opciones.</p>
                <p> Cada proyecto se evaluará individualmente, y proporcionaremos cotizaciones detalladas basadas en el alcance del trabajo, materiales seleccionados y el tiempo estimado de producción.</p>
            </div>
            <div class="icono">
                <img src="../../public/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>En  Carpintería J&J, entendemos que cada proyecto es único y merece una atención especial. Nos enorgullece ofrecer servicios de carpintería a medida con un enfoque claro: la puntualidad. Comprometidos con la calidad y la eficiencia, en A Tiempo nos esforzamos por entregar proyectos excepcionales dentro de los plazos establecidos.</p>
            </div>
        </div>
    </main>



    <div class="hero"></div>

    <section class="contenedor categorias">
        <h2 class="text-center">Categorías de Muebles</h2>

        <div class="listado-categorias">
            <div class="categoria">
                <img src="../../public/img/categoria1.jpg" alt="Imagen Categoría" />
                <a href="#">Oficina</a>
            </div>

            <div class="categoria">
                <img src="../../public/img/categoria2.jpg" alt="Imagen Categoría" />
                <a href="#">Hogar</a>
            </div>

            <div class="categoria">
                <img src="../../public/img/categoria3.jpg" alt="Imagen Categoría" />
                <a href="#">Cocina</a>
            </div>
        </div>
    </section>


    <section class="sobre-nosotros">
        <div class="contenedor sobre-nosotros-grid">
            <div class="texto-nosotros">
                <h2>Sobre Nosotros</h2>
                <p>Bienvenido a Carpintería J&J, donde la artesanía excepcional se encuentra con la dedicación personal. Somos más que carpinteros; somos creadores de espacios y contadores de historias a través de la madera. Fundada con la pasión por la carpintería de alta calidad, J&J se ha convertido en un referente en la creación de muebles y ambientes únicos.</p>
            </div>
        </div>
    </section>

    <div class="alinear-derecha">
        <a href="nosotros.php" class="boton-verde">Ver Todas</a>
    </div>
    </section>
    
    <section class="imagen-contacto">
    <h2>Encuentra el mueble de tus sueños</h2>
    <p>Llena el formulario de contacto </p>
    <a href="contacto.php" class="boton-amarillo">Contactános</a>
    </section>


    <section class="contenido-principal contenedor ">
        <h2 class="text-center">Nuestros Productos</h2>

        <div class="listado-productos">
            <div class="producto">
                <img src="../../public/img/producto1.jpg" alt="Imagen Producto">

                <div class="texto-producto">
                    <h3>Producto 1</h3>
                    <p>El aparador "Harmony" es la pieza perfecta para elevar la estética de tu sala de estar, fusionando funcionalidad y diseño con un toque de sofisticación.</p>
                    <p class="precio">Bs 80</p>

                    <a class="btn" href="producto1.php">Ver Producto</a>
                </div> <!-- Info Producto -->
            </div> <!-- Producto -->

            <div class="producto">
                <img src="../../public/img/producto2.jpg" alt="Imagen Producto">

                <div class="texto-producto">
                    <h3>Producto 2</h3>
                    <p> Mesa de Centro "Armonía Natural", una pieza exquisita diseñada para elevar la estética de tu sala de estar. Esta mesa de centro no es solo un mueble; es una obra maestra que fusiona funcionalidad con elegancia atemporal.</p>
                    <p class="precio">Bs 100</p>

                    <a class="btn" href="producto2.php">Ver Producto</a>
                </div> <!-- Info Producto -->
            </div> <!-- Producto -->

            <div class="producto">
                <img src="../../public/img/producto3.jpg" alt="Imagen Producto">

                <div class="texto-producto">
                    <h3>Producto 3</h3>
                    <p>Sumérgete en el lujo y la comodidad con nuestro sofá "Elegancia Contemporánea" de la colección exclusiva de [Nombre de tu Carpintería]. Este sofá no es solo un mueble; es una declaración de estilo y una invitación a un mundo de relajación y refinamiento.</p>
                    <p class="precio">Bs 153</p>

                    <a class="btn" href="producto3.php">Ver Producto</a>
                </div> <!-- Info Producto -->
            </div> <!-- Producto -->

            <div class="producto">
                <img src="../../public/img/producto4.jpg" alt="Imagen Producto">

                <div class="texto-producto">
                    <h3>Producto 4</h3>
                    <p>Sumérgete en la exquisitez del diseño con nuestra Mesa de Comedor Redonda "Elegancia Circular" de la colección exclusiva de J&J Carpintería. Este impresionante mueble no solo redefine la estética de tu comedor.</p>
                    <p class="precio">Bs 120</p>

                    <a class="btn" href="producto4.php">Ver Producto</a>
                </div> <!-- Info Producto -->
            </div> <!-- Producto -->

            <div class="producto">
                <img src="../../public/img/producto5.jpg" alt="Imagen Producto">

                <div class="texto-producto">
                    <h3>Producto 5</h3>
                    <p>Comodidad en nuestra Cama Harmony, una creación excepcional de J&J Carpintería esta cama combina la artesanía tradicional con un toque contemporáneo, sino también una obra maestra estética.</p>
                    <p class="precio">Bs 2100</p>

                    <a class="btn" href="producto5.php">Ver Producto</a>
                </div> <!-- Info Producto -->
            </div> <!-- Producto -->

            <div class="producto">
                <img src="../../public/img/producto6.jpg" alt="Imagen Producto">

                <div class="texto-producto">
                    <h3>Producto 6</h3>
                    <p>Sumérgete en un mundo de comodidad y elegancia con nuestra cama. Diseñada meticulosamente para ofrecer una experiencia de sueño inigualable, esta cama fusiona estilo y funcionalidad con un toque de lujo</p>
                    <p class="precio">Bs 1500</p>

                    <a class="btn" href="producto6.php">Ver Producto</a>
                </div> <!-- Info Producto -->
            </div> <!-- Producto -->

        </div> <!-- Fin de Listado de Productos -->
    
</section>




    <footer class="site-footer">
        <div class="grid-footer contenedor">
            <div>
                <h3>Categorías</h3>

                <nav class="footer-menu">
                    <a href="#">Cocina</a>
                    <a href="#">Oficina</a>
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
            <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </p>
        <a href="https://www.facebook.com/TuPaginaDeFacebook" target="_blank" rel="noopener noreferrer">
          
        </a>

    </footer>
    <script src="../../public/js/app1.js"></script>
</body>

</html>