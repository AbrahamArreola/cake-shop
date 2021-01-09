@extends('layouts.mainContent', ['menu' => 'menu4'])

@section('title', 'Contacto')

@section('styleFiles')
    <link rel="stylesheet" href="{{ asset('css/productShow.css') }}">
    <link rel="stylesheet" href="{{ asset('css/productCrud.css') }}">
@endsection

@section('scriptFiles')

@endsection

@section('content')
    @include('layouts.sectionTitle', ['section' => 'Contacto'])
    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>¡Contáctacte con Nosotros!</h2>
                        <p>Envíanos un mensaje con tus quejas y sugerencias respecto a nuestro servicio ;)</p>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Tu Nombre" required data-error="Por favor ingresa tu nombre">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Tu Email" id="email" class="form-control"
                                            name="name" required data-error="Por favor ingresa tu email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" name="name"
                                            placeholder="Asunto" required data-error="Por favor ingresa un asunto">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" placeholder="Tu mensaje" rows="4"
                                            data-error="Escribe tu mensaje" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="submit" type="submit">Enviar Comentario</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>INFORMACIÓN DE CONTACTO</h2>
                        <p>Si lo deseas, puedes contactarte con nosotros visitando nuestra pastelería, llamando o
                            enviándonos un correo. </p>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i> <a href="https://goo.gl/maps/gZ4cNaSr6PQdqt2dA"
                                        target="_blank"> Address: Michael I. Days 9000 <br>Preston Street Wichita,<br> KS
                                        87213 </p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+1-888 705 770</a>
                                </p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a
                                        href="mailto:cupcakemio@cupcakemio.com">cupcakemio@cupcakemio.com</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->

@endsection
