<!-- resources/views/certificados.blade.php -->
@include('page.header')

<div class="container mt-5">
    <div class="text-center">
        <i class="fas fa-check-circle text-success" style="font-size: 100px;"></i>
        <h1 class="mt-4" style="font-weight: 700;">Pago Exitoso</h1>
        <p class="lead mt-3">¡Tu inscripción ha sido completada correctamente! Gracias por tu pago.</p>
        <p class="mt-2" style="font-size: 1.2rem;">ID de la inscripción: <strong>{{ $inscripcion->id }}</strong></p>
        <a href="/" class="btn btn-primary mt-4" style="font-size: 1.1rem;">Volver al Inicio</a>
    </div>
</div>

<footer class="bg-dark text-white mt-5">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-4">
                <h5 class="text-uppercase font-weight-bold">Dulce Armonía</h5>
                <p><i class="fas fa-map-marker-alt"></i> Carrera 4 # 24-35 Barrio Francés</p>
                <p><i class="fas fa-phone-alt"></i> 3192012831</p>
                <p><i class="fas fa-envelope"></i> info@dulcearmonia.com</p>
            </div>
            <div class="col-md-4">
                <h5 class="text-uppercase font-weight-bold">Información</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">Inicio</a></li>
                    <li><a href="#" class="text-white">Nosotros</a></li>
                    <li><a href="#" class="text-white">PQR</a></li>
                    <li><a href="#" class="text-white">Contáctenos</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5 class="text-uppercase font-weight-bold">Redes Sociales</h5>
                <a href="#" class="text-white mr-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white mr-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white mr-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
</footer>


@include('page.footer')
