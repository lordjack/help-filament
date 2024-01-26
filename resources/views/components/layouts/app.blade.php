<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8"/>

    <meta name="application-name" content="{{ config('app.name') }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>{{ config('app.name') }}</title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <script>
        const theme = localStorage.getItem('theme') ?? 'dark'
        document.documentElement.className = theme
    </script>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900 leading-normal tracking-normal">
<div class="flex flex-col h-screen bg-gray-100">

    <!-- Barra de navegación superior -->
    <div class="bg-white text-white shadow w-full p-2 flex items-center justify-between">
        <div class="flex items-center">
            <div class="hidden md:flex items-center"> <!-- Se oculta en dispositivos pequeños -->
                <h2 class="font-bold text-xl text-black">SIG-NE &nbsp;</h2> <img
                    src="http://sig-negociacao-eletronica.test/images/logo_negotiation.png" alt="Logo"
                    class="w-10 h-18 mr-2">
                <h2 class="font-bold text-xl">Sistema de Negociação Eletrônica</h2>
            </div>
            <div class="md:hidden flex items-center"> <!-- Se muestra solo en dispositivos pequeños -->
                <button id="menuBtn">
                    <i class="fas fa-bars text-gray-500 text-lg"></i> <!-- Ícono de menú -->
                </button>
            </div>
        </div>

        <!-- Ícono de Notificación Perfil esquerda -->
        <div class="space-x-5">

        </div>
    </div>

    <!-- Conteudo principal -->
    <div class="flex-1 flex w-full">
        <!-- Barra lateral de navegação -->
        @yield('menu')

        <!-- Área de conteudo principal -->
        <div class="flex-1 px-3 py-3">
            <!-- Campo de búsqueda -->
            <div class="pb-6">
                @yield('content')
                {{-- $slot --}}
            </div>

            <!-- Contenedor de las 4 secciones (disminuido para dispositivos pequeños) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2 p-2">
                <!-- Sección 1 - Gráfica de Usuarios (disminuida para dispositivos -->

            </div>
        </div>
    </div>
</div>


@livewire('notifications')

@filamentScripts
@vite('resources/js/app.js')
<div class="fixed bottom-0 left-0 right-0 z-40 px-4 py-3 text-center text-white bg-gray-800">
    Sistema de Negociação Eletrônica {{date("Y")}}
    <a class="text-gray-200 underline" href="#">SIG-NE</a>
</div>
</body>
</html>
