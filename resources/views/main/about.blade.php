@extends('layouts.mainContent', ['menu' => 'menu2'])

@section('title', '¿Quiénes somos?')

@section('styleFiles')
    <link rel="stylesheet" href="{{ asset('css/productShow.css') }}">
    <link rel="stylesheet" href="{{ asset('css/productCrud.css') }}">
@endsection

@section('scriptFiles')

@endsection

@section('content')
    @include('layouts.sectionTitle', ['section' => '¿Quiénes somos?'])
    <!-- Start About Page  -->
    <div class="about-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-frame"> <img class="img-fluid" src="{{ asset('assets/images/we_are/we.jpg') }}"
                            alt="Dessert decorative image showing the general porpouse of the page" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="noo-sh-title-top">Somos <span>Cupcake Mio</span></h2>
                    <p>
                        Cupcake mio es un negocio indendiente el cual ofrece sus servicios de pastelería y repostería a
                        través de
                        diversos medios digitales como las redes sociales y a través de este sitio web en el cual podrás
                        obtener una mejor experiencia como cliente al contar con nuestro amplio catálogo de postres y un
                        carrito
                        de compras en el cual podrás agregar los productos de tu selección y realizar tu pedido de una
                        manera más
                        ágil.<br><br>
                        Si quieres conocer más al respecto te invitamos a visitar nuestras redes sociales que podrás
                        encontrar al final de esta página.
                    </p>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Somos Confiables</h3>
                        <p>Todos nuestros postres están elaborados con productos de alta calidad y estarán listos en tiempo
                            y forma para que puedas disfrutar de ellos.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Somos Profesionales</h3>
                        <p>Nuestra vocación es llevar el mejor sabor a tu paladar a través de nuestros postres elaborándolos
                            con dedicación y profesionalismo.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Somos Expertos</h3>
                        <p>Contamos con más de 3 años de experiencia, además de una gran cantidad de clientes satisfechos
                            con nuestro servicio.</p>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-12">
                    <h2 class="noo-sh-title">Conoce nuestro equipo de desarrollo</h2>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="{{ asset('assets/images/we_are/abraham.jpg') }}"
                                alt="Abraham's avatar" />
                            <div class="team-content">
                                <h3 class="title">Abraham Arreola</h3> <span class="post">Desarrollador web</span>
                            </div>
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/abraham.arreola.92/" class="fab fa-facebook"
                                        target="blank"></a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/in/abraham-arreola/" class="fab fa-linkedin-in"
                                        target="blank"></a>
                                </li>
                                <li>
                                    <a href="https://github.com/AbrahamArreola" class="fab fa-github" target="blank"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>Desarrollador con más de dos años de experiencia en la creación de sitios web haciendo uso de
                                tecnologías basadas en los lenguajes de programación javascript, php y python.
                            </p>
                        </div>
                        <hr class="my-0">
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="{{ asset('assets/images/we_are/juan.jpg') }}"
                                alt="Juan's avatar" />
                            <div class="team-content">
                                <h3 class="title">Juan Balderrama</h3> <span class="post">Desarrollador web</span>
                            </div>
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/jhonnyfasio" class="fab fa-facebook"
                                        target="blank"></a>
                                </li>
                                <li>
                                    <a href="https://github.com/Jhonnyfasio" class="fab fa-github" target="blank"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>Desarrollador con más de dos años de experiencia en la creación de sitios web y en la
                                creación
                                de aplicaciones de escritorio.
                            </p>
                        </div>
                        <hr class="my-0">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Page -->

@endsection
