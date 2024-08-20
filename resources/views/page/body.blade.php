<!-- Por ejemplo, en resources/views/index.blade.php -->
@include('page.header')


    <!-- Modal de imágenes -->
    <!-- Este modal se utiliza para buscar imágenes en la página. No tiene contenido visible hasta que se activa. -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <!-- Contenido del modal -->
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Formulario de búsqueda en el modal -->
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Buscar ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Inicio del banner (carrusel de imágenes) -->
    <div id="Carrusel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicadores de carrusel -->
        <ol class="carousel-indicators">
            <li data-bs-target="#Carrusel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#Carrusel" data-bs-slide-to="1"></li>
            <li data-bs-target="#Carrusel" data-bs-slide-to="2"></li>
        </ol>
        <!-- Slides del carrusel -->
        <div class="carousel-inner">
            <!-- Slide 1 (activo) -->
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <!-- Columna con imagen -->
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="https://www.cali.gov.co/educacion/info/principal/media/pubInt/thumbs/thpub_700x400_166589.jpg" alt="">
                        </div>
                        <!-- Columna de texto -->
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Dulce Armonia </b></h1>
                                <h3 class="h2">Educación física</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <!-- Columna con imagen -->
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="https://sandiegowbc.org/wp-content/uploads/2022/05/SDI-WBC-Inicie-su-negocio-de-cuidado-de-ninos-en-su-casa-blog-post-image-small.jpg" alt="">
                        </div>
                        <!-- Columna de texto -->
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Excelente</h1>
                                <h3 class="h2">Cuidado de tus Niños</h3>
                                <p>
                                    En el jardín Dulce Armonía nos encargamos de cuidar muy bien de tus hijos. No permitimos ningún tipo de negligencia al momento de cuidar de tu niño.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <!-- Columna con imagen -->
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="https://png.pngtree.com/background/20210711/original/pngtree-double-eleven-mother-and-baby-big-carnival-toy-cartoon-banner-picture-image_1112763.jpg" alt="">
                        </div>
                        <!-- Columna de texto -->
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Mes de Promociones</h1>
                                <h3 class="h2">30 % de descuento en la Matrícula de tu niño</h3>
                                <p>
                                    ¿Qué esperas para matricularlo? Recibimos cualquier medio de pago.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Controles de navegación -->
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#Carrusel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#Carrusel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- Finaliza el banner -->

    <!-- Inicio sección de mejores estudiantes -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Niños del Mes</h1>
                <p>
                    Este espacio se toma para condecorar a los mejores tres estudiantes del mes en nuestra institución.
                </p>
            </div>
        </div>
        <div class="row">
            <!-- Card 1 -->
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="https://th.bing.com/th/id/R.b5ab24345d079bc47abd3c73bd18120f?rik=3qcgLAIjaRejDA&riu=http%3a%2f%2f4.bp.blogspot.com%2f-wWD5gpaMNyY%2fT6h7CHlhMJI%2fAAAAAAAADE8%2f6i_I4agRJWQ%2fs640%2fIMG_8347.jpg&ehk=3%2f6SZP6JUibQvZDShZuRvc2QkCkDKfB8c5JV7aD%2b4as%3d&risl=&pid=ImgRaw&r=0" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Andrés Pérez</h5>
                <!-- Puedes añadir más detalles si es necesario -->
            </div>
            <!-- Card 2 -->
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="https://th.bing.com/th/id/R.b1339c72cef433e7a8f80ca825ef6ec9?rik=ByY9wAsWvMP%2fNA&riu=http%3a%2f%2f1.bp.blogspot.com%2f_ziJI7hSTg3g%2fTFOWVygk_zI%2fAAAAAAAADBM%2fswA0MML27h0%2fs1600%2flf20.jpg&ehk=qhzjJkb%2fnGG5tsAQzeos3UgKyD3CR9g7kGYpY6AR7yk%3d&risl=&pid=ImgRaw&r=0" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">José Torres</h2>
                <!-- Puedes añadir más detalles si es necesario -->
            </div>
            <!-- Card 3 -->
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="https://4.bp.blogspot.com/-Bsu4wOnW_zM/UXXnUni9Z8I/AAAAAAAAG1c/vTaS_YuNGrc/s1600/19+53.jpg" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Ashley Puentes</h2>
                <!-- Puedes añadir más detalles si es necesario -->
            </div>
        </div>
    </section>
    <!-- Finaliza la sección de mejores estudiantes -->

    <!-- Inicio de sección de Mensualidades -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Mensualidades</h1>
                    <p>
                        En este espacio se encuentran los servicios con los que cuenta nuestro Jardín.
                    </p>
                </div>
            </div>
            <div class="row">
                <!-- Card 1 -->
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="Comprar_Plan.html">
                            <img src="https://i.pinimg.com/736x/49/50/d1/4950d18824cc351a9845b559471bfd81.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li class="text-muted text-right"></li>
                            </ul>
                            <a href="Comprar_Plan.html" class="h2 text-decoration-none text-dark">Plan Completo</a>
                            <p class="card-text">
                                En esta mensualidad se incluyen meriendas de mañana/tarde (No incluye Almuerzo).
                            </p>
                            <!-- Puedes añadir más detalles si es necesario -->
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="Comprar_Plan.html">
                            <img src="https://i.pinimg.com/736x/49/50/d1/4950d18824cc351a9845b559471bfd81.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li class="text-muted text-right"></li>
                            </ul>
                            <a href="Comprar_Plan.html" class="h2 text-decoration-none text-dark">Plan Premium</a>
                            <p class="card-text">
                                En el plan premium se cuenta con jornada completa, desayunos, meriendas y frutas disponibles en el plantel, además, contarás con el acompañamiento de un adulto la mayor parte del día.
                            </p>
                            <!-- Puedes añadir más detalles si es necesario -->
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="Comprar_Plan.html">
                            <img src="https://i.pinimg.com/736x/49/50/d1/4950d18824cc351a9845b559471bfd81.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li class="text-muted text-right"></li>
                            </ul>
                            <a href="Comprar_Plan.html" class="h2 text-decoration-none text-dark">Plan Basico </a>
                            <p class="card-text">
                                Este plan no incluye refrigerios ni almuerzo; el niño solo podrá asistir en horas de la mañana o tarde.
                            </p>
                            <!-- Puedes añadir más detalles si es necesario -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Finaliza la sección de Mensualidades -->

<!-- Incluir el pie de página -->
@include('page.footer')
