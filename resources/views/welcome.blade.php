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
               class="text-sm text-white bg-black/40 backdrop-blur px-4 py-2 rounded-full hover:bg-black/60 transition mr-2">
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


<!-- FOOTER -->
<footer class="py-8 text-center text-gray-500 text-sm">
    © {{ date('Y') }} Yoga Studio · Todos los derechos reservados
</footer>

</body>
</html>
