@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-6 mx-auto">
            <v-card>
                <v-card-title>Withdrawal and Delivery Service</v-card-title>
                <v-card-text>
                    <strong>Terms of Service, Price and Recommendations</strong>
                </v-card-text>
                <v-card-text>
                    Washing-drying value of a load of clothes: <b>$8.700. (eight thousand, seven hundred pesos)</b>
                </v-card-text>
                <v-card-text>The coverage of our Retirement and Home Delivery service is free for the so-called urban area of ​​Castro. For services outside the urban area of ​​Castro, contact us (called or WhatsApp) at <b>+56 9 5699 3082</b> or at <a href="mailto:contacto@lavatu.cl">contacto@lavatu.cl</a></v-card-text>
                <v-card-text>Currently we do not provide the service of washing and drying down, covers, blankets, curtains, pillows, slippers, backpacks and other larger pieces.</v-card-text>
                <v-card-text>LavaTú does not provide its services for washing and drying pet clothes.</v-card-text>
                <v-card-text>LavaTú does not perform spotting on any type of clothing. The stain removal process is the sole responsibility of the client.</v-card-text>
                <v-card-text>We know that the time of our clients is invaluable, so we try to respond to their requirements in the shortest possible time. We have designed a collection and delivery schedule with the purpose that our clients plan, take advantage of and enjoy their time.</v-card-text>
                <v-card-text>Withdrawal and delivery hours: <b>Monday to Friday from 10:00 a.m. to 6:00 p.m.</b></v-card-text>
                <v-card-text>
                    The delivery time will depend on the magnitude of the service, but our efforts are aimed at being able to deliver the clothes the next business day after they have been removed from our client's home.</v-card-text>
                <v-card-text>Once the client completes the service request, we will contact you shortly to coordinate the withdrawal. Also, once the clothes are ready (washed and dried), we will contact our client to confirm the delivery time in order to make sure that there is someone at the client's residence who receives the clothes.</v-card-text>
                <v-card-text>
                    For the delivery to be effective in the established period, the service must be previously paid.</v-card-text>
                <v-card-text>The washing and drying cycle is by load of clothes. The size of the load is determined more by the volume of the clothing than by its weight. For reference, a load of clothes is considered to be approximately 7 Kg to 7.5 Kg. Overloading the washing machine with clothes means that we will not obtain a good result of washing the clothes.</v-card-text>
                <v-card-text>
                    Once the clothes are received and before putting them in the washing machine, they could be separated into additional loads if any of the following situations occurs:
                    <ul>
                        <li>There are clothes with excess dirt.</li>
                        <li>The volume of the received laundry exceeds the recommended load volume for the washing machine</li>
                    </ul>
                    In the event of any of the situations previously described, we will contact the client to request their authorization in order to process additional loads of clothing.
                </v-card-text>
                <v-card-text>The value of the operation of an additional load is $ 6,000 (six thousand pesos)</v-card-text>
                <v-card-text>
                    <strong>
                        General recommendations regarding the shipment of clothing
                    </strong>
                </v-card-text>
                <v-card-text>
                    <ul>
                        <li>Always check clothing labels with the manufacturer's recommendations regarding washing and drying.
                        </li>
                        <img class="img-fluid" src="{{ asset('img/condiciones.png') }}" alt="Etiquetas de ropa" />
                        <li>
                            We advise:
                            <ul>
                                <li>Separate clothes by color</li>
                                <li>Separate clothes by washing temperature</li>
                                <li>Separate clothes by level of dirt</li>
                            </ul>
                        </li>
                        <li>
                            Before sending clothes to be washed:
                            <ul>
                                <li>Empty their pockets</li>
                                <li>Remove non-washable belts</li>
                                <li>Remove all kinds of removable decoration</li>
                                <li>Repair ripped or torn garments</li>
                            </ul>
                        </li>
                    </ul>
                </v-card-text>
            </v-card>
        </div>
    </div>
@endsection
