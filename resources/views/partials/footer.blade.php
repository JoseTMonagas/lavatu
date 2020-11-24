<footer class="container-fluid bg-primary">
    <div class="row justify-content-between align-items-end">
        <div class="col-md-2">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/logo.png') }}" class="img-fluid" style="width: 8rem" />
            </a>
        </div>
        <div class="col-md-4">
            <p class="text-light">Gamboa 594, Castro, Chiloe</p>
            <p class="text-light">@lang('text.direccion-2')</p>
            <a href="{{ route('home') }}">www.lavatu.cl</a>
        </div>
        <div class="offset-md-4 col-md-2">
            <div class="d-flex flex-column">
                <span class="my-1 text-light">
                    <a class="btn btn-outline-info">
                        <i class="fab fa-whatsapp" style="font-size: 2rem"></i>
                    </a>
                    +56 9 5699 3082
                </span>

                <span class="my-1 text-light">
                    <a class="btn btn-outline-info" target="_blank" href="https://www.instagram.com/lavatu_castro/">
                        <i class="fab fa-instagram" style="font-size: 2rem"></i>
                    </a>
                    lavatu_castro
                </span>
                <span class="my-1 text-light">
                    <a class="btn btn-outline-info" target="_blank" href="https://www.facebook.com/lavatu.cl">
                        <i class="fab fa-facebook-f px-1" style="font-size: 2rem"></i>
                    </a>
                    lavatu.cl
                </span>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <small class="text-light text-center">Lavatu. Todos los derechos reservados. {{ date("Y") }}</small>
    </div>
</footer>
