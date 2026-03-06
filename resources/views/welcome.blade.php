<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ashtanga Yoga Limache</title>

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
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-start">

        <!-- Bloque 1 -->
        <div>
            <h2 class="text-4xl mb-6 text-center md:text-left">
                Estilo Mysore
            </h2>

            <p class="text-gray-600 leading-relaxed">
                Es la forma tradicional de enseñanza del método Ashtanga Yoga. Cada uno va a su propio ritmo aprendiendo la serie, a través de la repetición y memorización de una secuencia establecida de posturas o asanas. El o la Guía va ajustando y agregando posturas a cada estudiante de forma personalizada y progresiva hasta completar la serie.
                Es un viaje de aprendizaje, profundización y de desafíos por lo que requiere compromiso y paciencia.
                La práctica es adaptable a cada cuerpo, y no necesitas experiencia previa. Es una oportunidad diaria de volver a ti, bajar la velocidad y a la vez desarrollar fuerza, flexibilidad y movilidad.
            </p>
        </div>

        <!-- Bloque 2 -->
        <div>
            <h2 class="text-4xl mb-6 text-center md:text-left">
                Clase Guiada
            </h2>

            <p class="text-gray-600 leading-relaxed">
                En este formato todos los alumnos van al mismo ritmo, siguiendo el conteo que el o la profesora va guiando. Sirve mucho para entender el ritmo de la práctica, la respiración coordinada con el movimiento, experimentando de esa manera un flujo colectivo. La clase guiada será de la primera serie de Ashtanga hasta Navasana, y los practicantes que desean continuar con su serie, pueden hacerlo desde ahí a su propio tiempo. Se requiere al menos un mes de práctica para asistir a una clase guiada.
            </p>
        </div>

    </div>
</section>

<section class="relative bg-gradient-to-b from-white to-gray-50 dark:from-gray-900 dark:to-gray-950 py-20">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">

        <!-- Título principal -->
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 dark:text-white">
                Sobre Nosotras
            </h2>
            <p class="mt-4 text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                Ashtanga Yoga Limache es un espacio de práctica consciente, acompañamiento y comunidad.
            </p>
        </div>

        <!-- Persona 1 -->
        <div class="grid md:grid-cols-2 gap-12 items-center mb-24">

            <!-- Imagen -->
            <div class="relative">
                <img src="https://i.postimg.cc/Xv3hyg7t/lole.jpg"
                     alt="Lole - Ashtanga Yoga Limache"
                     class="w-full h-[500px] object-cover rounded-3xl shadow-xl">
            </div>

            <!-- Texto -->
            <div>
                <h3 class="text-3xl font-semibold text-gray-800 dark:text-white mb-6">
                    Lole
                </h3>

                <div class="space-y-4 text-gray-700 dark:text-gray-300 leading-relaxed">
                    <p>
                        Mamá,  instructora de yoga, bailarina, y siempre rodeando el movimiento corporal. Estudiante y practicante del Ashtanga yoga desde el 2011, actualmente alumna de Mati Guerra en viña del mar. 2016 realicé mi primer instructorado de Hatha Yoga en la escuela Savittar y desde el 2024 comparto mi experiencia e imparto clases en Ashtanga Yoga Limache.
                    </p>
                    <p class="italic border-l-4 border-yellow-400 pl-4">
                        Para mi la práctica es una herramienta mucho más que el ejercicio físico, es un ancla para navegar la vida de forma clara y en gratitud y además una llave para el autoconocimiento.
                    </p>
                </div>
            </div>
        </div>

        <!-- Persona 2 -->
        <div class="grid md:grid-cols-2 gap-12 items-center">

            <!-- Texto -->
            <div class="order-2 md:order-1">
                <h3 class="text-3xl font-semibold text-gray-800 dark:text-white mb-6">
                    Fachi
                </h3>

                <div class="space-y-4 text-gray-700 dark:text-gray-300 leading-relaxed">
                    <p>
                        Mujer, mamá, fotógrafa, practicante de yoga actualmente con Mati Guerra.
                        Luego de años en torno al yoga, comienzo a practicar Ashtanga con mayor rigurosidad en 2017 y luego a profundizar en los estudios en el año 2019 en la Escuela Mandiram en Santiago, sin más pretensiones que ir entendiendo más todo lo que significa Yoga.
                    </p>

                    <p>
                        En 2025 surge la posibilidad de unirme a la Lole en Ashtanga Yoga Limache a enseñar y es un espacio que me llena mucho. Lo siento como una meditación activa: la mente está ahí, al cien por ciento, observando cada cuerpo, acompañando y apoyando desde la propia experiencia.
                    </p>

                    <p class="italic border-l-4 border-yellow-400 pl-4">
                        Yoga ha generado un cambio sutil y silencioso en mi. A veces es un desafío y otras un disfrute, pero siempre es un regalo poder darnos ese espacio. El otro día decía después de meterme al mar helado “estuvo exquisito, es como la práctica, una nunca se arrepiente cuando finalmente lo hace, la sensación post…”
                    </p>
                </div>

            </div>

            <!-- Imagen -->
            <div class="order-1 md:order-2 relative">
                <img src="https://i.postimg.cc/L8MZdxTq/fachi.jpg"
                     alt="Fachi - Ashtanga Yoga Limache"
                     class="w-full h-[500px] object-cover rounded-3xl shadow-xl">
            </div>
        </div>

    </div>
</section>


<!-- CLASES -->
<section id="clases" class="py-20">
    <div class="max-w-6xl mx-auto px-6">

        <h2 class="text-3xl font-light text-center mb-12">
            Valores
        </h2>

        <div class="grid grid-cols-3 gap-8">

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

            <div class="bg-white shadow-lg rounded-2xl p-8 text-center">
                <h3 class="text-xl font-medium mb-4">Clase suelta</h3>
                <p class="text-gray-600">
                    Pago por una clase
                </p>
                <h3 class="text-xl font-medium mb-4">$7.000</h3>
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

        <!-- ===================== -->
        <!-- 📱 MOBILE (Cards) -->
        <!-- ===================== -->
        <div class="grid gap-6 md:hidden">

            <!-- Lunes -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="font-semibold text-lg text-gray-800 mb-3">Lunes</h3>
                <div class="space-y-2 text-gray-700">
                    <p>8:00*</p>
                    <p>19:00</p>
                </div>
            </div>

            <!-- Martes -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="font-semibold text-lg text-gray-800 mb-3">Martes</h3>
                <div class="space-y-2 text-gray-700">
                    <p>6:30**</p>
                    <p>8:00*</p>
                </div>
            </div>

            <!-- Miércoles -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="font-semibold text-lg text-gray-800 mb-3">Miércoles</h3>
                <div class="space-y-2 text-gray-700">
                    <p>8:00*</p>
                    <p>19:00</p>
                </div>
            </div>

            <!-- Jueves -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="font-semibold text-lg text-gray-800 mb-3">Jueves</h3>
                <div class="space-y-2 text-gray-700">
                    <p>8:00*</p>
                    <p>19:00</p>
                </div>
            </div>

            <!-- Viernes -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="font-semibold text-lg text-gray-800 mb-3">Viernes</h3>
                <div class="space-y-2 text-gray-700">
                    <p>8:00</p>
                    <p class="text-sm text-gray-500">(Guiado)</p>
                </div>
            </div>

        </div>

        <!-- ===================== -->
        <!-- 💻 DESKTOP (Tabla) -->
        <!-- ===================== -->
        <div class="hidden md:block mt-8">
            <div class="bg-white shadow-2xl rounded-3xl overflow-hidden border border-amber-200">

                <table class="min-w-full text-center">

                    <thead class="bg-amber-200 text-gray-800">
                    <tr class="uppercase tracking-wide">
                        <th class="py-5 px-6">Lunes</th>
                        <th class="py-5 px-6">Martes</th>
                        <th class="py-5 px-6">Miércoles</th>
                        <th class="py-5 px-6">Jueves</th>
                        <th class="py-5 px-6">Viernes</th>
                    </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 text-gray-700">
                    <tr>
                        <td class="py-8 space-y-2">
                            <p>8:00*</p>
                            <p>19:00</p>
                        </td>
                        <td class="py-8 space-y-2">
                            <p>6:30**</p>
                            <p>8:00*</p>
                        </td>
                        <td class="py-8 space-y-2">
                            <p>8:00*</p>
                            <p>19:00</p>
                        </td>
                        <td class="py-8 space-y-2">
                            <p>8:00*</p>
                            <p>19:00</p>
                        </td>
                        <td class="py-8 space-y-2">
                            <p>8:00</p>
                            <p class="text-sm text-gray-500">(Guiado)</p>
                        </td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>

        <!-- Nota -->
        <p class="text-sm text-gray-500 mt-8">
            * Hora de entrada hasta 8:40, termina a las 10:15
            ** Hora de entrada hasta 7:00
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
            Ven a probar con nosotras. La primera clase es sin costo.
        </p>
        <a href="https://wa.link/jyaspt"
           class="bg-white text-emerald-600 px-8 py-3 rounded-full text-lg font-medium hover:bg-gray-100 transition">
            Escríbenos acá
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
