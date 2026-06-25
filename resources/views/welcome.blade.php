<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ashtanga Yoga Limache · Estilo Mysore</title>
    <meta name="description" content="Ashtanga Yoga Limache · Práctica tradicional estilo Mysore en San Francisco de Limache.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')

    <style>
        :root{
            --deep:#264653;
            --teal:#2a9d8f;
            --sand:#e9c46a;
            --orange:#f4a261;
            --ember:#e76f51;
        }
        html{scroll-behavior:smooth}
        body{font-family:'Inter',sans-serif;color:var(--deep);background:#fbf8f3}
        .font-display{font-family:'Cormorant Garamond',serif;letter-spacing:.01em}
        .text-deep{color:var(--deep)}      .bg-deep{background:var(--deep)}
        .text-teal{color:var(--teal)}      .bg-teal{background:var(--teal)}
        .text-sand{color:var(--sand)}      .bg-sand{background:var(--sand)}
        .text-orange{color:var(--orange)}  .bg-orange{background:var(--orange)}
        .text-ember{color:var(--ember)}    .bg-ember{background:var(--ember)}
        .border-ember{border-color:var(--ember)}
        .border-sand{border-color:var(--sand)}
        .bg-cream{background:#fbf8f3}
        .bg-deep-grad{background:linear-gradient(135deg,#264653 0%,#1d3a45 100%)}
        .bg-warm-grad{background:linear-gradient(135deg,#e9c46a 0%,#f4a261 50%,#e76f51 100%)}
        .divider-leaf{display:flex;align-items:center;justify-content:center;gap:1rem;color:var(--teal)}
        .divider-leaf::before,.divider-leaf::after{content:"";flex:1;height:1px;background:linear-gradient(90deg,transparent,var(--teal),transparent);max-width:120px}
        .chip{display:inline-block;padding:.35rem 1rem;border:1px solid var(--teal);color:var(--teal);border-radius:9999px;font-size:.75rem;letter-spacing:.25em;text-transform:uppercase}
        .card-soft{background:#fff;border:1px solid rgba(38,70,83,.08);box-shadow:0 20px 50px -25px rgba(38,70,83,.25)}
        .btn-primary{background:var(--ember);color:#fff;transition:transform .2s,background .2s}
        .btn-primary:hover{background:#d65a3d;transform:translateY(-2px)}
        .btn-ghost{background:rgba(255,255,255,.12);color:#fff;backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,.3)}
        .btn-ghost:hover{background:rgba(255,255,255,.22)}
        .hero-gradient{background:linear-gradient(180deg,rgba(38,70,83,.55) 0%,rgba(38,70,83,.75) 100%)}
        .price-card{transition:transform .3s,box-shadow .3s}
        .price-card:hover{transform:translateY(-6px);box-shadow:0 30px 60px -30px rgba(231,111,81,.4)}
        .schedule-row td{transition:background .2s}
        .schedule-row:hover td{background:rgba(233,196,106,.15)}
        .quote-mark{font-family:'Cormorant Garamond',serif;font-size:5rem;line-height:1;color:var(--sand);font-style:italic}
    </style>
</head>

<body>

<!-- NAV -->
@if (Route::has('login'))
    <div class="absolute top-0 right-0 p-6 z-30">
        @auth
            <a href="{{ url('/dashboard') }}"
               class="text-sm text-white px-5 py-2.5 rounded-full bg-teal hover:opacity-90 transition shadow-lg">
                Dashboard
            </a>
        @else
            <a href="{{ route('login') }}"
               class="text-sm text-white px-5 py-2.5 rounded-full btn-ghost transition">
                Ingresar
            </a>
        @endauth
    </div>
@endif


<!-- HERO -->
<section class="relative flex items-center justify-center min-h-screen overflow-hidden">
    <img
        src="https://i.postimg.cc/nM8zJVtB/yoga-nodo-desayuno-mayo2026-45.jpg"
        alt="Ashtanga Yoga Limache"
        class="absolute inset-0 w-full h-full object-cover object-center"
    >
    <div class="absolute inset-0 hero-gradient"></div>

    <div class="relative z-10 flex flex-col items-center text-center px-6 max-w-3xl">

        <img
            src="{{ asset('images/logo-ashtanga.png') }}"
            alt="Logo Ashtanga Yoga Limache"
            class="h-24 md:h-32 w-auto object-contain drop-shadow-2xl"
        >

        <span class="chip mt-8" style="color:#e9c46a;border-color:rgba(233,196,106,.6)">Tradición · Mysore Style</span>

        <h1 class="font-display mt-6 text-5xl md:text-7xl font-light text-white leading-[1.05]">
            Ashtanga Yoga<br><em class="text-sand not-italic font-medium">Limache</em>
        </h1>

        <p class="mt-6 text-lg md:text-xl text-white/85 max-w-xl font-light leading-relaxed">
            Una práctica diaria para volver a ti — respiración, movimiento y silencio en el corazón de Limache.
        </p>

        <div class="mt-10 flex flex-wrap gap-4 justify-center">
            <a href="#clases" class="btn-primary px-8 py-3.5 rounded-full text-sm uppercase tracking-widest font-medium shadow-xl">
                Ver Horarios
            </a>
            <a href="https://wa.link/jyaspt" class="btn-ghost px-8 py-3.5 rounded-full text-sm uppercase tracking-widest font-medium transition">
                Primera clase gratis
            </a>
        </div>

    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 text-white/60 text-xs tracking-[0.3em] uppercase animate-pulse">
        Inhala · Exhala
    </div>
</section>


<!-- ABOUT -->
<section class="py-24 bg-cream">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="chip">La Práctica</span>
            <h2 class="font-display text-4xl md:text-5xl text-deep mt-6">Dos caminos, un mismo ritmo</h2>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="card-soft p-10 rounded-3xl relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-teal"></div>
                <h3 class="font-display text-3xl md:text-4xl text-deep mb-6">Estilo Mysore</h3>
                <p class="text-deep/75 leading-relaxed">
                    Es la forma tradicional de enseñanza del método Ashtanga Yoga. Cada uno va a su propio ritmo aprendiendo la serie, a través de la repetición y memorización de una secuencia establecida de posturas o asanas. El o la Guía va ajustando y agregando posturas a cada estudiante de forma personalizada y progresiva hasta completar la serie.<br><br>
                    Es un viaje de aprendizaje, profundización y de desafíos por lo que requiere compromiso y paciencia.<br><br>
                    La práctica es adaptable a cada cuerpo, y no necesitas experiencia previa. Es una oportunidad diaria de volver a ti, bajar la velocidad y a la vez desarrollar fuerza, flexibilidad y movilidad.
                </p>
            </div>

            <div class="card-soft p-10 rounded-3xl relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-orange"></div>
                <h3 class="font-display text-3xl md:text-4xl text-deep mb-6">Clase Guiada</h3>
                <p class="text-deep/75 leading-relaxed">
                    En este formato todos los alumnos van al mismo ritmo, siguiendo el conteo que el o la profesora va guiando. Sirve mucho para entender el ritmo de la práctica, la respiración coordinada con el movimiento, experimentando de esa manera un flujo colectivo.<br><br>
                    La clase guiada será de la primera serie de Ashtanga hasta Navasana, y los practicantes que desean continuar con su serie, pueden hacerlo desde ahí a su propio tiempo. Se requiere al menos un mes de práctica para asistir a una clase guiada.
                </p>
            </div>
        </div>
    </div>
</section>


<!-- SOBRE NOSOTRAS -->
<section class="py-24 bg-deep-grad text-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">

        <div class="text-center mb-20">
            <span class="chip" style="color:#e9c46a;border-color:rgba(233,196,106,.5)">Equipo</span>
            <h2 class="font-display text-4xl md:text-6xl mt-6">Sobre Nosotras</h2>
            <div class="divider-leaf mt-8 max-w-md mx-auto" style="color:#e9c46a">
                <span class="text-sand">✦</span>
            </div>
            <p class="mt-6 text-lg text-white/75 max-w-2xl mx-auto font-light">
                Ashtanga Yoga Limache es un espacio de práctica consciente, acompañamiento y comunidad.
            </p>
        </div>

        <!-- Lole -->
        <div class="grid md:grid-cols-2 gap-12 items-center mb-24">
            <div class="relative">
                <div class="absolute -inset-4 bg-sand/20 rounded-3xl -rotate-2"></div>
                <img src="https://i.postimg.cc/Xv3hyg7t/lole.jpg"
                     alt="Lole"
                     class="relative w-full h-[500px] object-cover rounded-3xl shadow-2xl">
            </div>
            <div>
                <span class="text-sand text-sm uppercase tracking-[0.3em]">Instructora</span>
                <h3 class="font-display text-5xl mt-3 mb-6">Lole</h3>
                <div class="space-y-4 text-white/85 leading-relaxed font-light">
                    <p>
                        Mamá, instructora de yoga, bailarina, y siempre rodeando el movimiento corporal. Estudiante y practicante del Ashtanga yoga desde el 2011, actualmente alumna de Mati Guerra en Viña del Mar. En 2016 realicé mi primer instructorado de Hatha Yoga en la escuela Savittar y desde el 2024 comparto mi experiencia e imparto clases en Ashtanga Yoga Limache.
                    </p>
                    <div class="relative pl-8 mt-6">
                        <span class="quote-mark absolute -top-4 left-0">"</span>
                        <p class="italic text-sand text-lg font-display">
                            Para mí la práctica es una herramienta mucho más que el ejercicio físico, es un ancla para navegar la vida de forma clara y en gratitud y además una llave para el autoconocimiento.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fachi -->
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="order-2 md:order-1">
                <span class="text-orange text-sm uppercase tracking-[0.3em]">Instructora</span>
                <h3 class="font-display text-5xl mt-3 mb-6">Fachi</h3>
                <div class="space-y-4 text-white/85 leading-relaxed font-light">
                    <p>
                        Mujer, mamá, fotógrafa, practicante de yoga actualmente con Mati Guerra. Luego de años en torno al yoga, comienzo a practicar Ashtanga con mayor rigurosidad en 2017 y en el año 2019 realizo mis estudios de Profesorado en Yoga en la Escuela Mandiram en Santiago.
                    </p>
                    <p>
                        En 2025 surge la posibilidad de unirme a la Lole en Ashtanga Yoga Limache a enseñar y es un espacio que me llena mucho. Lo siento como una meditación activa: la mente está ahí, al cien por ciento, observando cada cuerpo, acompañando y apoyando desde la propia experiencia.
                    </p>
                    <div class="relative pl-8 mt-6">
                        <span class="quote-mark absolute -top-4 left-0" style="color:#f4a261">"</span>
                        <p class="italic text-orange text-lg font-display">
                            Yoga ha generado un cambio sutil y silencioso en mí. A veces es desafiante, pero siempre se agradece haberlo hecho, sobre todo por mi mente inquieta.
                        </p>
                    </div>
                </div>
            </div>
            <div class="order-1 md:order-2 relative">
                <div class="absolute -inset-4 bg-orange/20 rounded-3xl rotate-2"></div>
                <img src="https://i.postimg.cc/L8MZdxTq/fachi.jpg"
                     alt="Fachi"
                     class="relative w-full h-[500px] object-cover rounded-3xl shadow-2xl">
            </div>
        </div>

    </div>
</section>


<!-- PRECIOS -->
<section id="clases" class="py-24 bg-cream">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="chip">Valores</span>
            <h2 class="font-display text-4xl md:text-5xl text-deep mt-6">Elige tu ritmo</h2>
            <p class="mt-4 text-deep/65 max-w-xl mx-auto">Planes mensuales pensados para acompañar tu compromiso con la práctica.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="price-card card-soft rounded-3xl p-10 text-center">
                <p class="text-teal text-xs uppercase tracking-[0.3em] mb-3">Limitado</p>
                <h3 class="font-display text-3xl text-deep mb-2">2 clases / semana</h3>
                <p class="text-deep/60 text-sm mb-6">Para quienes recién empiezan</p>
                <div class="font-display text-5xl text-deep mb-1">$35.000</div>
                <p class="text-deep/50 text-sm">CLP / mes</p>
            </div>

            <div class="price-card rounded-3xl p-10 text-center bg-deep-grad text-white relative overflow-hidden md:-mt-4 md:mb-4 shadow-2xl">
                <div class="absolute top-4 right-4 bg-ember text-white text-[10px] uppercase tracking-[0.2em] px-3 py-1 rounded-full">Popular</div>
                <p class="text-sand text-xs uppercase tracking-[0.3em] mb-3">Libre</p>
                <h3 class="font-display text-3xl mb-2">Acceso ilimitado</h3>
                <p class="text-white/70 text-sm mb-6">Todas las clases de la semana</p>
                <div class="font-display text-5xl text-sand mb-1">$42.000</div>
                <p class="text-white/60 text-sm">CLP / mes</p>
            </div>

            <div class="price-card card-soft rounded-3xl p-10 text-center">
                <p class="text-orange text-xs uppercase tracking-[0.3em] mb-3">Clase suelta</p>
                <h3 class="font-display text-3xl text-deep mb-2">Una clase</h3>
                <p class="text-deep/60 text-sm mb-6">Sin compromiso mensual</p>
                <div class="font-display text-5xl text-deep mb-1">$7.000</div>
                <p class="text-deep/50 text-sm">CLP / clase</p>
            </div>

        </div>
    </div>
</section>


<!-- HORARIOS -->
<section class="py-24 bg-warm-grad relative overflow-hidden">
    <div class="absolute inset-0 opacity-20" style="background-image:radial-gradient(circle at 20% 30%, #fff 0%, transparent 40%), radial-gradient(circle at 80% 70%, #fff 0%, transparent 40%)"></div>
    <div class="relative w-full max-w-6xl mx-auto px-6 text-center">

        <div class="mb-14">
            <span class="chip" style="color:#264653;border-color:rgba(38,70,83,.4)">Calendario</span>
            <h2 class="font-display text-5xl md:text-6xl text-deep mt-6 font-light">Horarios 2026</h2>
            <p class="text-xl text-deep/70 mt-3 tracking-wide font-display italic">Marzo en adelante</p>
        </div>

        <!-- MOBILE -->
        <div class="grid gap-4 md:hidden text-left">
            @php
                $dias = [
                    ['Lunes', ['', '19:00']],
                    ['Martes', ['6:30', '']],
                    ['Miércoles', ['8:30', '18:30']],
                    ['Jueves', ['', '19:00']],
                    ['Viernes', ['8:30', '10:00 a 11:00 Paro de Manos']],
                ];
            @endphp
            @foreach($dias as $d)
                <div class="bg-white/95 backdrop-blur rounded-2xl shadow-lg p-6 border-l-4 border-ember">
                    <h3 class="font-display text-2xl text-deep mb-3">{{ $d[0] }}</h3>
                    <div class="space-y-1 text-deep/80">
                        @foreach($d[1] as $h)<p class="font-light">{{ $h }}</p>@endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <!-- DESKTOP -->
        <div class="hidden md:block">
            <div class="bg-white/95 backdrop-blur shadow-2xl rounded-3xl overflow-hidden border border-white/50">
                <table class="min-w-full text-center">
                    <thead class="bg-deep text-white">
                    <tr class="uppercase tracking-[0.25em] text-sm">
                        <th class="py-6 px-6 font-medium">Lunes</th>
                        <th class="py-6 px-6 font-medium">Martes</th>
                        <th class="py-6 px-6 font-medium">Miércoles</th>
                        <th class="py-6 px-6 font-medium">Jueves</th>
                        <th class="py-6 px-6 font-medium">Viernes</th>
                    </tr>
                    </thead>
                    <tbody class="text-deep">
                    <tr class="schedule-row text-lg font-display">
                        <td class="py-10 space-y-2"><p>19:00</p></td>
                        <td class="py-10 space-y-2"><p>6:30</p></td>
                        <td class="py-10 space-y-2"><p>8:30</p><p>18:30</p></td>
                        <td class="py-10 space-y-2"><p>19:00</p></td>
                        <td class="py-10 space-y-2"><p>8:30</p><p class="text-sm italic text-ember">10 a 11 Paro de Manos</p></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<!-- CONSIDERACIONES -->
<section class="relative min-h-screen flex items-center justify-center">
    <div class="absolute inset-0">
        <img src="https://i.postimg.cc/7ZMJqSsq/imagenweb6.jpg"
             alt="Práctica de yoga"
             class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0" style="background:linear-gradient(135deg,rgba(38,70,83,.92) 0%,rgba(38,70,83,.75) 100%)"></div>

    <div class="relative max-w-5xl mx-auto px-6 py-24 text-white grid md:grid-cols-2 gap-16">

        <div>
            <span class="chip" style="color:#e9c46a;border-color:rgba(233,196,106,.5)">Antes de venir</span>
            <h2 class="font-display text-3xl md:text-4xl mt-6 mb-8 leading-tight">
                Consideraciones para<br>la práctica colectiva
            </h2>
            <ul class="space-y-4 text-base leading-relaxed font-light text-white/90">
                <li class="flex gap-3"><span class="text-sand">✦</span>Ayuno antes de la práctica de al menos 2 horas</li>
                <li class="flex gap-3"><span class="text-sand">✦</span>Idealmente no ingerir líquidos durante la práctica</li>
                <li class="flex gap-3"><span class="text-sand">✦</span>Entrar en silencio a la sala y mantener ese modo durante la práctica</li>
                <li class="flex gap-3"><span class="text-sand">✦</span>Teléfonos y relojes inteligentes guardados y en silencio</li>
                <li class="flex gap-3"><span class="text-sand">✦</span>Puedes llevar una toalla para secarte durante la práctica</li>
                <li class="flex gap-3"><span class="text-sand">✦</span>Procura ir limpio, compartimos un espacio colectivo</li>
            </ul>
        </div>

        <div>
            <span class="chip" style="color:#f4a261;border-color:rgba(244,162,97,.5)">Logística</span>
            <h2 class="font-display text-3xl md:text-4xl mt-6 mb-8 leading-tight">
                Formas de pago<br>y reserva de clases
            </h2>
            <ul class="space-y-4 text-base leading-relaxed font-light text-white/90">
                <li class="flex gap-3"><span class="text-orange">✦</span>Transferir los primeros 5 días del mes</li>
                <li class="flex gap-3"><span class="text-orange">✦</span>Reserva tus cupos a través del link</li>
                <li class="flex gap-3"><span class="text-orange">✦</span>Si no puedes asistir, libera tu cupo hasta 12 horas antes</li>
                <li class="flex gap-3"><span class="text-orange">✦</span>Si pierdes una clase, puedes recuperarla en otro horario</li>
                <li class="flex gap-3"><span class="text-orange">✦</span>Los feriados no se recuperan</li>
                <li class="flex gap-3"><span class="text-orange">✦</span>Las clases no son acumulables para el mes siguiente</li>
            </ul>
            <p class="mt-10 italic text-white/70 font-display text-lg">
                ¿Alguna duda? Escríbenos directamente y conversamos :)
            </p>
        </div>
    </div>
</section>


<!-- CTA -->
<section class="py-24 bg-ember text-white text-center relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image:radial-gradient(circle at 30% 50%, #fff 0%, transparent 30%), radial-gradient(circle at 70% 50%, #fff 0%, transparent 30%)"></div>
    <div class="relative max-w-3xl mx-auto px-6">
        <span class="chip" style="color:#fff;border-color:rgba(255,255,255,.5)">Empieza hoy</span>
        <h2 class="font-display text-4xl md:text-6xl font-light mt-6 mb-6 leading-tight">
            Tu primera clase<br><em class="text-sand">es nuestro regalo</em>
        </h2>
        <p class="mb-10 text-lg text-white/90 font-light max-w-xl mx-auto">
            Ven a probar con nosotras. Sin compromiso, sin experiencia previa, sólo tu respiración.
        </p>
        <a href="https://wa.link/jyaspt"
           class="inline-block bg-white text-ember px-10 py-4 rounded-full text-sm uppercase tracking-[0.25em] font-semibold hover:bg-sand transition shadow-2xl">
            Escríbenos por WhatsApp
        </a>
    </div>
</section>


<!-- UBICACIÓN -->
<section class="relative min-h-[80vh] flex items-center justify-center bg-deep text-white overflow-hidden">
    <a href="https://maps.app.goo.gl/ebGWQDLbA6kGNmPz8"
       target="_blank" rel="noopener noreferrer"
       class="absolute inset-0 group">
        <img src="{{ asset('images/mapa-ubicacion.jpg') }}"
             alt="Ubicación en el mapa"
             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
        <div class="absolute inset-0 transition" style="background:linear-gradient(135deg,rgba(38,70,83,.85),rgba(42,157,143,.65))"></div>
    </a>

    <div class="relative z-10 text-center px-6 max-w-3xl">
        <span class="chip" style="color:#e9c46a;border-color:rgba(233,196,106,.5)">Encuéntranos</span>
        <h2 class="font-display text-5xl md:text-7xl font-light mt-6 mb-6">
            Nuestra <em class="text-sand">ubicación</em>
        </h2>
        <p class="text-lg md:text-xl text-white/85 mb-10 font-light">
            Riquelme 62, San Francisco de Limache.<br>Haz click en el mapa para abrir indicaciones.
        </p>
        <a href="https://maps.app.goo.gl/ebGWQDLbA6kGNmPz8"
           target="_blank" rel="noopener noreferrer"
           class="inline-flex items-center gap-2 bg-sand text-deep font-semibold px-8 py-3.5 rounded-full text-sm uppercase tracking-[0.25em] shadow-2xl hover:bg-orange transition">
            Ver en Google Maps →
        </a>
    </div>
</section>


<!-- FOOTER -->
<footer id="contacto" class="bg-deep text-white/80 py-16 border-t-4 border-ember">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid md:grid-cols-4 gap-10 mb-12">

            <div class="md:col-span-1">
                <h3 class="font-display text-2xl text-white mb-3">Ashtanga<br><em class="text-sand">Yoga Limache</em></h3>
                <p class="text-sm text-white/60 leading-relaxed">Práctica tradicional estilo Mysore.</p>
            </div>

            <div>
                <h4 class="text-sand text-xs uppercase tracking-[0.25em] mb-4">Dirección</h4>
                <p class="font-light leading-relaxed">
                    Riquelme 62<br>
                    San Francisco de Limache<br>
                    Región de Valparaíso, Chile
                </p>
            </div>

            <div>
                <h4 class="text-sand text-xs uppercase tracking-[0.25em] mb-4">Contacto</h4>
                <p class="font-light">+56 9 9349 8545</p>
                <p class="font-light">+56 9 9227 3656</p>
            </div>

            <div>
                <h4 class="text-sand text-xs uppercase tracking-[0.25em] mb-4">Instagram</h4>
                <a href="https://www.instagram.com/ashtangayogalimache" class="font-light hover:text-sand transition">@ashtangayogalimache</a>
            </div>
        </div>

        <div class="border-t border-white/10 pt-6 text-center text-xs text-white/40 tracking-wider">
            © {{ date('Y') }} Ashtanga Yoga Limache · Todos los derechos reservados
        </div>
    </div>
</footer>

</body>
</html>
