<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Yoga Studio</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-white text-gray-800">

<!-- NAV SUPERIOR CON LOGIN / REGISTER -->
@if (Route::has('login'))
    <div class="absolute top-0 right-0 p-6 z-20">
        @auth
            <a href="{{ url('/dashboard') }}"
               class="text-sm text-white bg-emerald-500 px-4 py-2 rounded-full hover:bg-emerald-600 transition">
                Dashboard
            </a>
        @else
            <a href="{{ route('login') }}"
               class="text-sm text-black bg-white backdrop-blur px-4 py-2 rounded-full hover:bg-white/60 transition mr-2">
                Ingresar
            </a>

            @if (Route::has('register'))
                {{--<a href="{{ route('register') }}"
                   class="text-sm text-white bg-emerald-500 px-4 py-2 rounded-full hover:bg-emerald-600 transition">
                    Register
                </a>--}}
            @endif
        @endauth
    </div>
@endif


<!-- HERO -->
<section
    class="relative flex items-center justify-center min-h-screen bg-cover bg-center bg-no-repeat"
>
    <img
        src="{{ asset('images/yoga-bg.jpg') }}"
        alt="Background"
        class="absolute inset-0 w-full h-full object-cover object-center"
    >


    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/50"></div>

    <!-- Contenido central -->
    <div class="relative z-10 flex flex-col items-center text-center px-6">

        <!-- Logo más equilibrado -->
        <img
            src="{{ asset('images/logo-ashtanga.png') }}"
            alt="Logo"
            class="h-24 md:h-32 w-auto object-contain"
        >

        <h1 class="mt-6 text-3xl md:text-5xl font-bold text-white">
            Ashtanga Yoga Limache
        </h1>

        <p class="mt-4 text-base md:text-lg text-gray-200 max-w-xl">
            Estilo Mysore
        </p>

    </div>

</section>



<!-- ABOUT -->
<section class="py-20 bg-gray-50 text-center">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-3xl font-light mb-6">Estilo Mysore</h2>
        <p class="text-gray-600 leading-relaxed">
            Es la forma tradicional de enseñanza del método Ashtanga Yoga. Cada uno va a su propio ritmo aprendiendo la serie, a través de la repetición y memorización de esta secuencia establecida de asanas. El o la Guía va ajustando y agregando posturas a cada estudiante de forma personalizada hasta completar la serie.
            Es un viaje de aprendizaje, profundización y de desafíos por lo que requiere compromiso contigo mismo.
        </p>
    </div>
</section>


<!-- CLASES -->
<section id="clases" class="py-20">
    <div class="max-w-6xl mx-auto px-6">

        <h2 class="text-3xl font-light text-center mb-12">
            Valores
        </h2>

        <div class="grid grid-cols-2 gap-8">

            <div class="bg-white shadow-lg rounded-2xl p-8 text-center">
                <h3 class="text-xl font-medium mb-4">Libre</h3>
                <p class="text-gray-600">
                    Entra a las clases que quieras durante la semana
                </p>
                <h4 class="text-xl font-medium mb-4">$42.000</h4>
            </div>

            <div class="bg-white shadow-lg rounded-2xl p-8 text-center">
                <h3 class="text-xl font-medium mb-4">Limitado</h3>
                <p class="text-gray-600">
                    Entra a 2 clases por semana
                </p>
                <h3 class="text-xl font-medium mb-4">$35.000</h3>
            </div>

        </div>
    </div>
</section>

<section class="min-h-screen bg-amber-100 flex items-center justify-center px-4 py-16">

    <div class="w-full max-w-6xl text-center">

        <!-- Título -->
        <div class="mb-12">
            <h1 class="text-4xl md:text-5xl font-light tracking-widest text-gray-800">
                Horarios 2026
            </h1>
            <p class="text-xl text-gray-600 mt-3 tracking-wide">
                Marzo
            </p>
        </div>

        <!-- Tabla -->
        <div class="overflow-x-auto">
            <div class="bg-white/90 backdrop-blur-sm shadow-2xl rounded-3xl overflow-hidden border border-amber-200">

                <table class="min-w-full text-center">

                    <thead class="bg-amber-200 text-gray-800">
                    <tr class="text-sm md:text-base uppercase tracking-wide">
                        <th class="py-5 px-6 font-semibold">Lunes</th>
                        <th class="py-5 px-6 font-semibold">Martes</th>
                        <th class="py-5 px-6 font-semibold">Miércoles</th>
                        <th class="py-5 px-6 font-semibold">Jueves</th>
                        <th class="py-5 px-6 font-semibold">Viernes</th>
                    </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 text-gray-700 bg-white">
                    <tr class="hover:bg-amber-50 transition duration-200">
                        <td class="py-8 px-6 space-y-3">
                            <p class="text-lg font-medium">8:00*</p>
                            <p class="text-lg font-medium">19:00</p>
                        </td>
                        <td class="py-8 px-6 space-y-3">
                            <p class="text-lg font-medium">06:30</p>
                            <p class="text-lg font-medium">8:00*</p>
                        </td>
                        <td class="py-8 px-6 space-y-3">
                            <p class="text-lg font-medium">8:00*</p>
                            <p class="text-lg font-medium">19:00</p>
                        </td>
                        <td class="py-8 px-6 space-y-3">
                            <p class="text-lg font-medium">8:00*</p>
                            <p class="text-lg font-medium">19:00</p>
                        </td>
                        <td class="py-8 px-6 space-y-3">
                            <p class="text-lg font-medium">8:00</p>
                            <p class="text-sm text-gray-500">(Guiado)</p>
                        </td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>

        <!-- Nota -->
        <p class="text-sm text-gray-500 mt-6">
            * Hora de entrada hasta 8:40, termina a las 10:15
        </p>

    </div>

</section>


<!-- CTA -->
<section class="py-20 bg-emerald-600 text-white text-center">
    <div class="max-w-3xl mx-auto px-6">
        <h2 class="text-3xl font-light mb-6">
            Comienza hoy tu práctica
        </h2>
        <p class="mb-8">
            Reserva tu primera clase y vive la experiencia.
        </p>
        <a href="#"
           class="bg-white text-emerald-600 px-8 py-3 rounded-full text-lg font-medium hover:bg-gray-100 transition">
            Reservar Ahora
        </a>
    </div>
</section>

<section class="relative min-h-[80vh] flex items-center justify-center bg-gray-900 text-white overflow-hidden">

    {{-- Imagen del mapa --}}
    <a
        href="https://maps.app.goo.gl/ebGWQDLbA6kGNmPz8"
        target="_blank"
        rel="noopener noreferrer"
        class="absolute inset-0 group"
    >
        <img
            src="{{ asset('images/mapa-ubicacion.jpg') }}"
            alt="Ubicación en el mapa"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
        >

        {{-- Overlay oscuro --}}
        <div class="absolute inset-0 bg-black/60 group-hover:bg-black/50 transition"></div>
    </a>

    {{-- Contenido centrado --}}
    <div class="relative z-10 text-center px-6 max-w-3xl">

        <h1 class="text-4xl md:text-6xl font-bold mb-6">
            Nuestra Ubicación
        </h1>

        <p class="text-lg md:text-xl text-gray-200 mb-8">
            Haz click en el mapa para abrir la ubicación exacta en Google Maps
            y obtener indicaciones.
        </p>

        <a
            href="https://maps.app.goo.gl/ebGWQDLbA6kGNmPz8"
            target="_blank"
            rel="noopener noreferrer"
            class="inline-flex items-center gap-2 bg-white text-gray-900 font-semibold px-8 py-3 rounded-2xl shadow-lg hover:bg-gray-200 transition"
        >
            Ver en Google Maps
        </a>

    </div>

</section>

{{-- FOOTER --}}
<footer id="contacto" class="bg-gray-950 text-gray-300 py-12">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid md:grid-cols-3 gap-8 text-center md:text-left">

            {{-- Dirección --}}
            <div>
                <h3 class="text-white text-lg font-semibold mb-4">Dirección</h3>
                <p>
                    Riquelme 62<br>
                    San Francisco de Limache, Región de Valparaíso<br>
                    Chile
                </p>
            </div>

            {{-- Teléfonos --}}
            <div>
                <h3 class="text-white text-lg font-semibold mb-4">Contacto</h3>
                <p>+56 9 9349 8545</p>
                <p>+56 9 9227 3656</p>
            </div>

            {{-- Correo --}}
            <div>
                <h3 class="text-white text-lg font-semibold mb-4">Instagram</h3>
                <a href="https://www.instagram.com/ashtangayogalimache"><p>@ashtangayogalimache</p></a>
            </div>
        </div>

        {{-- Línea inferior --}}
        <div class="border-t border-gray-800 mt-10 pt-6 text-center text-sm text-gray-500">
            © {{ date('Y') }} Yoga Ashtanga Limache. Todos los derechos reservados.
        </div>

    </div>
</footer>

</body>
</html>
