@extends('layouts.mainContent', ['menu' => 'menu1'])

@section('title', 'Inicio')

@section('styleFiles')
  <link rel="stylesheet" href="{{ asset('css/paypal-status.css') }}">
@endsection

@section('scriptFiles')

@endsection

@section('content')

    @if (Session::has('status'))
      <br />
      <br />
      @if (Session::get('status-id') == "1")
        <div class="text-center">
          <h2 class="noo-sh-title-top">Estado del pago: </h2>
          <h5 class="status-approved"> {{ Session::get('status') }} </h5>
          <br />
          <p><a class="btn hvr-hover" href="/index">Inicio</a></p>
        </div>
      @else
      <div class="text-center">
        <h2 class="noo-sh-title-top">Estado del pago: </h2>
        <h5 class="status-denied"> {{ Session::get('status') }} </h5>
        <br />
        <p><a class="btn hvr-hover" href="/index">Inicio</a></p>
      </div>
      @endif

      <br />
      <br />

      {{Session::forget('status')}}

    @endif
    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="https://html.design/">html design</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

@endsection
