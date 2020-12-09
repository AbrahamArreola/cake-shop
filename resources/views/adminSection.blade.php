@if (Gate::authorize('admin-settings'))
    @extends('layouts.mainContent', ['menu' => 'adminSection'])

    @section('title', 'Administradores')

    @section('content')
        @livewire('admin.admin-panel');
    @endsection
@endif
