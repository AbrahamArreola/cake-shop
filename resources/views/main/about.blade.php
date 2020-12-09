@extends('layouts.mainContent', ['menu' => 'menu2'])

@section('title', '¿Quiénes somos?')

@section('styleFiles')
  <link rel="stylesheet" href="{{ asset('css/productShow.css') }}">
  <link rel="stylesheet" href="{{ asset('css/productCrud.css') }}">
@endsection

@section('scriptFiles')

@endsection

@section('content')
  @include('layouts.sectionTitle', ['section' => 'Nosotros'])
  <!-- Start About Page  -->
  <div class="about-box-main">
      <div class="container">
          <div class="row">
      <div class="col-lg-6">
                  <div class="banner-frame"> <img class="img-fluid" src="{{ asset('assets/images/we_are/we.jpg') }}" alt="" />
                  </div>
              </div>
              <div class="col-lg-6">
                  <h2 class="noo-sh-title-top">Somos <span>Cupcake Mio</span></h2>
                  <p>Somos una pasteleria con más de 5 años de experiencias en la hermosa ciudad de Guadalajara</p>
                  <p>Contamos con una diversidad de más de 50 productos que podrás degustar</p>
        <a class="btn hvr-hover" href="#">Read More</a>
              </div>
          </div>
          <div class="row my-5">
              <div class="col-sm-6 col-lg-4">
                  <div class="service-block-inner">
                      <h3>Somos Confiables</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                  </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                  <div class="service-block-inner">
                      <h3>Somos Profesionales</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                  </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                  <div class="service-block-inner">
                      <h3>Somos Expertos</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                  </div>
              </div>
          </div>
          <div class="row my-4">
              <div class="col-12">
                  <h2 class="noo-sh-title">Meet Our Team</h2>
              </div>
              <div class="col-sm-6 col-lg-3">
                  <div class="hover-team">
                      <div class="our-team"> <img src="{{ asset('assets/images/we_are/abraham.jpg') }}" alt="" />
                          <div class="team-content">
                              <h3 class="title">Abraham</h3> <span class="post">Web Developer</span> </div>
                          <ul class="social">
                              <li>
                                  <a href="#" class="fab fa-facebook"></a>
                              </li>
                              <li>
                                  <a href="#" class="fab fa-twitter"></a>
                              </li>
                              <li>
                                  <a href="#" class="fab fa-google-plus"></a>
                              </li>
                              <li>
                                  <a href="#" class="fab fa-youtube"></a>
                              </li>
                          </ul>
                          <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                      </div>
                      <div class="team-description">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                      </div>
                      <hr class="my-0"> </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                  <div class="hover-team">
                      <div class="our-team"> <img src="{{ asset('assets/images/we_are/juan.jpg') }}" alt="" />
                          <div class="team-content">
                              <h3 class="title">Juan</h3> <span class="post">Web Developer</span> </div>
                          <ul class="social">
                              <li>
                                  <a href="#" class="fab fa-facebook"></a>
                              </li>
                              <li>
                                  <a href="#" class="fab fa-twitter"></a>
                              </li>
                              <li>
                                  <a href="#" class="fab fa-google-plus"></a>
                              </li>
                              <li>
                                  <a href="#" class="fab fa-youtube"></a>
                              </li>
                          </ul>
                          <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                      </div>
                      <div class="team-description">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                      </div>
                      <hr class="my-0"> </div>
              </div>
          </div>
      </div>
  </div>
  <!-- End About Page -->

@endsection
