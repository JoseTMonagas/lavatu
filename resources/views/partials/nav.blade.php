<header class="container-fluid bg-primary">
    <nav class="row p-md-3 justify-content-around">
        <div class="col-xs-2">
            <v-btn fab dark small color="primary">
                <v-icon>mdi-whatsapp</v-icon>
            </v-btn>
        </div>
        <div class="col-xs-1">
            <div class="ml-md-2 d-flex flex-column">
                <h4 class="text-info">+56 9 5699 3082</h4>
            </div>

            <div class="d-flex flex-row">
                <form method="POST" action="{{ route('changeLocale') }}">
                    @csrf
                    <input name="locale" type="hidden" value="es" />

                    <button class="btn" type="submit"><img src="{{ asset('img/esp.png') }}" alt="Bandera de Espa単a" /></button>
                </form>

                <form method="POST" action="{{ route('changeLocale') }}">
                    @csrf
                    <input name="locale" type="hidden" value="en" />

                    <button class="btn" type="submit"><img src="{{ asset('img/eng.png') }}" alt="Bandera de Estados Unidos" /></button>
                </form>
            </div>
        </div>

        <div class="offset-md-8 col-xs-4 py-3 py-md-0">

            <a class="btn btn-outline-info" target="_blank" href="https://www.facebook.com/lavatu.cl">
                <i class="fab fa-facebook-f" style="font-size: 2rem"></i>
            </a>

            <a class="btn btn-outline-info" target="_blank" href="https://www.instagram.com/lavatu_castro/">
                <i class="fab fa-instagram" style="font-size: 2rem"></i>
            </a>
        </div>
    </nav>
