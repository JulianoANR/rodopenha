<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('header')

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">

    <title>{{ $title }} | {{ config('app.name', 'Rodopenha') }}</title>

    {{-- FlowBite --}}
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    {{-- Datatable Style --}}
    <link href="{{ asset('assets/datatables-1.12.1/datatables.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('assets/datatables-1.12.1/responsive-plugin/css/responsive.dataTables.min.css') }}" rel="stylesheet"> -->

    {{-- Fontawesome 6.1.1 --}}
    <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet">

    {{-- Pace Loading --}}
    <script src="{{ asset('assets/pace/pace.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/pace/minimal.css') }}">

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')

    {{-- Ion-icon --}}
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <x-init-preferences />
</head>
<body {{ $attributes }}>
    <div id="app" x-data="App()">

        <!-- Wrapper App -->
        <div class="flex flex-col w-full h-screen !overflow-y-auto overflow-x-hidden relative" id="wrapper_global">
            <x-layouts.header />

            <x-layouts.navbar :active="$active" />

            <div class="grow flex flex-col bg-body xl:ml-72">
                <main class="grow pb-12">
                    {{ $slot }}
                </main>

                <x-layouts.footer />
            </div>
        </div>
    </div>

    {{-- @if(Session::has('flash_message'))
        <x-alert status="{{ Session::get('flash_message')['class'] }}" msg="{{ Session::get('flash_message')['msg'] }}"/>
    @endif --}}

    @stack('outside')

    @stack('scripts-before')
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/datatables-1.12.1/datatables.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/datatables-1.12.1/responsive-plugin/js/dataTables.responsive.min.js') }}"></script> -->
    @stack('scripts')
</body>
</html>
