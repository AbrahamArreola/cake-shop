<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    {{-- Webpage icon --}}
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/cupcake-mio-favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- ALL JS FILES -->
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    @livewireStyles

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>

    @yield('styleFiles')
</head>

<body>
    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu"
                        aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('assets/images/logo.jpg') }}"
                            class="logo" alt="cupcake mio logo"></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto mr-28 lg:mr-44" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item {{ $menu == 'menu1' ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('index') }}">Inicio</a></li>
                        <li class="nav-item {{ $menu == 'menu2' ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('about') }}">¿Quiénes somos?</a></li>
                        <li class="dropdown {{ $menu == 'menu3' ? 'active' : '' }}">
                            <a href="{{ route('product.index') }}" class="nav-link dropdown-toggle arrow"
                                data-toggle="dropdown">Tienda</a>
                            @auth
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('product.index') }}">Productos</a></li>
                                    @can('client-settings')
                                        <li><a href="{{ route('shopCart') }}">Carrito de compras</a></li>
                                    @endcan
                                    <li><a href="{{ route('orders') }}">Pedidos</a></li>
                                </ul>
                            @endauth
                        </li>
                        <li class="nav-item {{ $menu == 'menu4' ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('contact') }}">Contacto</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                @auth
                    <div class="absolute right-6 attr-nav">
                        <ul>
                            @livewire('cart-icon')

                            @livewire('profile-menu')
                        </ul>
                    </div>
                @endauth
                <!-- End Atribute Navigation -->

                @if (!Auth::user())
                    <ul
                        class="absolute top-5 lg:top-14 right-3 bottom-3 lg:flex w-1/5 md:w-auto md:text-base font-bold text-center">
                        <li class="pr-3 md:pb-2.5"><a
                                class="p-2 text-cm-main-pink md:text-white md:bg-cm-main-pink rounded-md hover:bg-cm-pink2"
                                href="{{ route('login') }}">Entrar</a>
                        </li>
                        <li><a class="p-2 text-cm-cherry md:text-white md:bg-cm-cherry rounded-md hover:bg-red-400"
                                href="{{ route('register') }}">Registrarse</a>
                        </li>
                    </ul>
                @endif
            </div>

            <!-- Start Side Menu -->
            @auth
                <div class="side">
                    <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                    <li class="cart-box">
                        @livewire('side-shop-cart')
                    </li>
                </div>
            @endauth
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    @yield('content')

    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>Acerca de Cupcake Mio</h4>
                            <p>Somos una pastelería/repostería en donde nos enfocamos en encantar el paladar de nuestros
                                clientes
                                y satisfacer sus deseos a través de nuestra imaginación para recrear sus peticiones con
                                nuestros
                                postres.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h4>Redes sociales</h4>
                            <p>Puedes contactarnos y obtener más información acerca de nuestras novedades en nuestras
                                redes sociales</p>
                            <ul>
                                <li><a href="https://www.facebook.com/cupcakemio" target="_blank"><i
                                            class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.instagram.com/cupcakemio/" target="_blank"><i
                                            class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                <!--<li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>-->
                                <!--<li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>-->
                                <!--<li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>-->
                                <!--<li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>-->
                                <!--<li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>-->
                                <!--<li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>-->
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contáctanos</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Dirección: Michael I. Days 3756 <br>Preston
                                        Street Wichita,<br> KS 67213 </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Teléfono: <a href="tel: 33 03 04 05 06">+1-888
                                            705 770</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a
                                            href="Correo: contactinfo@gmail.com">contactinfo@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    @can('admin-settings')
        <div class="hidden fixed left-0 bottom-0 z-50 w-full md:w-1/3 bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 pl-4 pr-2 pb-4 shadow-md"
            role="alert" id="newOrderMessage">
            <div>
                <p class="w-full text-right cursor-pointer" id="closeOrderMsg">Cerrar<i class="fas fa-times"></i>
                </p>
                <div class="flex">
                    <div class="py-1">
                        <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold">Usted tiene un nuevo pedido</p>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(function() {
                Echo.channel('order-update').listen('ShopUpdate', () => {
                    $('#newOrderMessage').fadeIn('slow');
                    $('#newOrderMessage').delay(4000).fadeOut('slow');

                    const audio = new Audio("{{ asset('assets/audio/giornos_theme.mp3') }}");
                    audio.play();
                });
            });

            $("#closeOrderMsg").on("click", function() {
                $('#newOrderMessage').hide();
            });

        </script>
    @endcan

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL PLUGINS -->
    <script src="{{ asset('assets/js/jquery.superslides.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/js/inewsticker.js') }}"></script>
    <script src="{{ asset('assets/js/bootsnav.js') }}"></script>
    <script src="{{ asset('assets/js/images-loded.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/baguetteBox.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>

    @livewireScripts

    @yield('scriptFiles')
</body>

</html>
