@extends('layouts.mainContent', ['menu' => 'perfil'])

@section('title', 'Perfil')

@section('content')
    <div class="min-h-screen bg-cm-background">
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')
@endsection
