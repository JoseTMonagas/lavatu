@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-md-6 mx-auto">
            <v-card>
                <v-card-title>Servicio de Retiro y Entrega</v-card-title>
                <v-card-text>
                    <strong>Condiciones del Servicio, Precio y Recomendaciones</strong>
                </v-card-text>
                <v-card-text>
                    Valor de lavado-secado de una carga de ropa: <b>$8.700. (ocho mil, setecientos pesos)</b>
                </v-card-text>
                <v-card-text>La cobertura de nuestro servicio de Retiro y Entrega a domicilio es gratuito para la denominada zona urbana de Castro. Para servicios fuera de la zona urbana de Castro, contáctenos (llamado o WhatsApp) al <b>+56 9 5699 3082</b> o bien al correo <a href="mailto:contacto@lavatu.cl">contacto@lavatu.cl</a></v-card-text>
                <v-card-text>Actualmente no prestamos el servicio de lavado y secado de plumones, cobertores, frazadas, cortinas, almohadas, zapatillas, mochilas  y otras piezas de tamaño mayor.</v-card-text>
                <v-card-text>LavaTú no presta sus servicios para lavado y secado de ropa de mascotas.</v-card-text>
                <v-card-text>LavaTú no realiza el desmanchado en ningún tipo de ropa. El proceso de desmanchado de ropa es de exclusiva responsabilidad del cliente.</v-card-text>
                <v-card-text>Sabemos que el  tiempo de nuestros clientes es invaluable por lo cual intentamos responder a sus requerimientos en el menor tiempo posible. Hemos diseñado un horario de retiro y entrega con el propósito que nuestros clientes planifiquen, aprovechen y disfruten de su tiempo. </v-card-text>
                <v-card-text>Horario de retiros y entregas: <b>De lunes a viernes desde las 10:00 horas hasta las 18:00 horas</b></v-card-text>
                <v-card-text>El plazo de entrega dependerá de la magnitud del servicio pero nuestros esfuerzos están dirigidos a poder entregar la ropa al día hábil siguiente de haber sido retirada del domicilio de nuestro cliente.</v-card-text>
                <v-card-text>Una vez que el cliente finalice la solicitud de servicio, a la brevedad nos pondremos en contacto para coordinar el retiro. Así también, una vez que la ropa esté ya lista (lavada y secada), nos pondremos en contacto con nuestro cliente para confirmar el horario de entrega con el propósito de asegurarnos que haya alguna persona en la residencia del cliente que reciba la ropa.</v-card-text>
                <v-card-text>Para que la entrega se haga efectiva en el período establecido, el servicio debe estar previamente pagado.</v-card-text>
                <v-card-text>El ciclo de Lavado y Secado es por carga de ropa. El tamaño de la carga se determina más por el volumen de la ropa que por su peso. Como referencia, se considera que una carga de ropa es aproximadamente 7 Kg a 7,5 Kg. Sobrecargar la máquina lavadora con ropa conlleva a que no obtendremos un buen resultado del lavado de la ropa.</v-card-text>
                <v-card-text>
                    Una vez recepcionada la ropa y antes de ponerla en la lavadora, ésta podría ser separada en cargas adicionales si alguna de las siguientes situaciones sucede:
                    <ul>
                        <li>Hay prendas con exceso de suciedad.</li>
                        <li>El volumen de la ropa recepcionada excede el volumen recomendable de carga para la lavadora</li>
                    </ul>
                    En caso de ocurrir alguna de las situaciones previamente descritas, contactaremos al cliente  para requerir su autorización con el objetivo de procesar cargas de ropa adicionales.
                </v-card-text>
                <v-card-text>El valor de la operación de una carga adicional es de $6.000 (seis mil pesos)</v-card-text>
                <v-card-text>
                    <strong>Recomendaciones generales respecto del envío de ropa</strong>
                </v-card-text>
                <v-card-text>
                    <ul>
                        <li>Siempre revisar las etiquetas de la ropa con las recomendaciones del fabricante respecto de lavado y secado</li>
                        <img class="img-fluid" src="{{ asset('img/condiciones.png') }}" alt="Etiquetas de ropa" />
                        <li>
                            Aconsejamos:
                            <ul>
                                <li>Separa la ropa por color</li>
                                <li>Separa la ropa por temperatura de lavado</li>
                                <li>Separa la ropa por nivel de suciedad</li>
                            </ul>
                        </li>
                        <li>
                            Antes de enviar la ropa a lavar:
                            <ul>
                                <li>Vaciar sus bolsillos</li>
                                <li>Retirar cinturones no lavables</li>
                                <li>Retirar todo tipo de adornos removibles</li>
                                <li>Repara prendas descosidas o rotas</li>
                            </ul>
                        </li>
                    </ul>
                </v-card-text>
            </v-card>
        </div>
    </div>
@endsection
