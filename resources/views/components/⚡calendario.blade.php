<?php

use Livewire\Component;
use App\Models\Hora;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

new class extends   Component
{
    public $horas;
    public $idseleccionado = "lala1";
    public $reservas;
    public bool $myModal1 = false;
    public bool $myModal2 = false;
    public $currentMonth;
    public $currentYear;
    public $alumnos;
    public $alumnoseleccionado;

    public $selectedDate = null;
    public $selectedHour = null;
    public $horasa = [];

    public $daysWithHours = [];

    public function mount()
    {
        Carbon::setLocale('es');
        $this->horas = Hora::all();
        $this->reservas = Reserva::all();
        $this->currentMonth = now()->month;
        $this->currentYear  = now()->year;
        $this->loadDaysWithHours();
        if(Auth::user()->admin == 1){
            $this->alumnos = \App\Models\User::all();
        }
        $this->selectedDate = today()->format('Y-m-d');
    }

    public function loadDaysWithHours()
    {
        $this->daysWithHours = Hora::whereMonth('dia', $this->currentMonth)
            ->whereYear('dia', $this->currentYear)
            ->where('disponible', true)
            ->pluck('dia')
            ->map(fn ($d) => Carbon::parse($d)->format('Y-m-d'))
            ->unique()
            ->toArray();
    }
    public function previousMonth()
    {
        $date = Carbon::create($this->currentYear, $this->currentMonth)->subMonth();
        $this->currentMonth = $date->month;
        $this->currentYear  = $date->year;

        $this->loadDaysWithHours();
    }

    public function nextMonth()
    {
        $date = Carbon::create($this->currentYear, $this->currentMonth)->addMonth();
        $this->currentMonth = $date->month;
        $this->currentYear  = $date->year;

        $this->loadDaysWithHours();
    }

    public function selectDay($date)
    {
        $this->selectedDate = $date;

        $this->horasa = Hora::whereDate('dia', $date)
            ->where('disponible', true)
            ->orderBy('id')
            ->get();

        $this->dispatch('open-modal', name: 'hours-modal');
    }

    public function inscribir($horaid)
    {
        if (Reserva::where('user_id', $this->alumnoseleccionado)->where('hora_id', $horaid)->get()->count() == 0) {
            $reserva = new Reserva;
            $reserva->user_id = $this->alumnoseleccionado;
            $reserva->hora_id = $horaid;
            $reserva->save();
            $this->reservas = Reserva::all();
            if(Reserva::where('hora_id', $horaid)->get()->count() == 9){
                $hora = Hora::find($horaid);
                $hora->disponible = false;
                $hora->save();
                $this->horas = Hora::all();
                $this->loadDaysWithHours();
            }
        } else {
            $this->myModal1 = true;
        }
    }

    public function inscribirse($horaid)
    {
        if (Reserva::where('user_id', Auth::id())->where('hora_id', $horaid)->get()->count() == 0) {
            $reserva = new Reserva;
            $reserva->user_id = Auth::id();
            $reserva->hora_id = $horaid;
            $reserva->save();
            $this->reservas = Reserva::all();
            if(Reserva::where('hora_id', $horaid)->get()->count() == 9){
                $hora = Hora::find($horaid);
                $hora->disponible = false;
                $hora->save();
                $this->horas = Hora::all();
                $this->loadDaysWithHours();
            }
        } else {
            $this->myModal1 = true;
        }
    }
    public function sacar($horaid, $disponible)
    {
        Reserva::where('user_id', Auth::id())->where('hora_id', $horaid)->delete();
        if($disponible == false){
            $hora = Hora::find($horaid);
            $hora->disponible = true;
            $hora->save();
            $this->horas = Hora::all();
            $this->loadDaysWithHours();
        }
    }
    public function expulsar($horaid, $userid, $disponible)
    {
        Reserva::where('user_id', $userid)->where('hora_id', $horaid)->delete();
        if($disponible == false){
            $hora = Hora::find($horaid);
            $hora->disponible = true;
            $hora->save();
            $this->horas = Hora::all();
            $this->loadDaysWithHours();
        }
    }

    public function guardarhora()
    {
        $hora = new Hora;
        $hora->dia = $this->selectedDate;
        $hora->name = $this->selectedDate . ' ' . $this->selectedHour;
        $hora->disponible = true;
        $hora->save();
        $this->selectedHour = null;
        $this->myModal2 = false;
        $this->horas = Hora::all();
    }

    public function eliminarhora($horaid){

        Hora::where('id', $horaid)->delete();
    }

    public function render()
    {
        $startOfMonth = Carbon::create($this->currentYear, $this->currentMonth, 1);
        $startDayOfWeek = $startOfMonth->dayOfWeekIso; // 1 (Mon) - 7 (Sun)
        $daysInMonth = $startOfMonth->daysInMonth;

        $days = [];

        // Espacios vacíos iniciales
        for ($i = 1; $i < $startDayOfWeek; $i++) {
            $days[] = null;
        }

        // Días reales
        for ($i = 1; $i <= $daysInMonth; $i++) {
            $days[] = Carbon::create($this->currentYear, $this->currentMonth, $i);
        }

        return $this->view([
            'days' => $days,
            'monthName' => $startOfMonth->translatedFormat('F Y'),
        ]);
    }

};
?>

<div>
    <x-mary-modal wire:model="myModal1" title="Ya hay una reserva con el alumno seleccionado en esta hora" class="backdrop-blur">
        Presiona `ESC`, haz click afuera o click `CANCELAR` para cerrar esta ventana.

        <x-slot:actions>
            <x-mary-button label="Cancelar" @click="$wire.myModal1 = false" />
        </x-slot:actions>
    </x-mary-modal>

    <x-mary-modal wire:model="myModal2" title="Crea la hora para el dia {{$selectedDate}}" class="backdrop-blur">
        Selecciona la hora {{$selectedHour}}
        <flux:select wire:model.live="selectedHour">
            <flux:select.option>Elige la hora...</flux:select.option>
            <flux:select.option>6:30</flux:select.option>
            <flux:select.option>8:00</flux:select.option>
            <flux:select.option>19:00</flux:select.option>
        </flux:select>
        <x-slot:actions>
            <x-mary-button label="Cancelar" @click="$wire.myModal2 = false" />
            <x-mary-button label="Guardar" wire:click="guardarhora" />
        </x-slot:actions>
    </x-mary-modal>

    {{-- Modal --}}
    <flux:modal name="hours-modal" class="w-full max-w-md">

        <div class="p-6">

            <h3 class="text-lg font-semibold mb-4">
                Horas disponibles {{ $selectedDate }}
            </h3>

            @if(count($horasa))
                <div class="grid grid-cols-3 gap-3">
                    @foreach($horasa as $hora)
                        <button class="p-2 bg-black hover:bg-gray-600 rounded text-sm">
                            {{ \Carbon\Carbon::parse($hora->dia) }}
                        </button>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No hay horas disponibles.</p>
            @endif

            <div class="mt-6 text-right">
                <flux:button x-on:click="$flux.close('hours-modal')">
                    Cerrar
                </flux:button>
            </div>

        </div>

    </flux:modal>

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">

        <div class="flex items-center gap-3">
            <flux:button wire:click="previousMonth" variant="ghost">◀</flux:button>
            <flux:button wire:click="nextMonth" variant="ghost">▶</flux:button>
        </div>

        <h2 class="text-2xl text-black dark:text-neutral-200 font-semibold capitalize">
            {{ $monthName }}
        </h2>

        <div></div>

    </div>

    {{-- Días de la semana --}}
    <div class="grid grid-cols-7 text-center font-medium text-neutral-700 dark:text-neutral-200 mb-2">
        <div>Lun</div>
        <div>Mar</div>
        <div>Mié</div>
        <div>Jue</div>
        <div>Vie</div>
        <div>Sáb</div>
        <div>Dom</div>
    </div>

    {{-- Grid calendario estilo widget --}}
    <div class="grid grid-cols-7 gap-px bg-gray-200 dark:bg-neutral-700 rounded-xl overflow-hidden text-center">

        @foreach($days as $day)

            @if($day === null)
                <div class="bg-gray-50 dark:bg-neutral-900 h-16"></div>
            @else
                @php
                    $dateFormatted = $day->format('Y-m-d');
                    $hasHours = in_array($dateFormatted, $daysWithHours);
                    $isToday = $day->toDateString() == $selectedDate;
                @endphp

                <div
                    wire:click="selectDay('{{ $dateFormatted }}')"
                    class="
                    h-16 bg-white dark:bg-neutral-900
                    flex flex-col items-center justify-center
                    cursor-pointer relative
                    hover:bg-blue-50 dark:hover:bg-neutral-700
                    transition
                "
                >

                <span class="
                    text-sm font-medium w-7 h-7 flex items-center justify-center
                    {{ $isToday
                        ? 'bg-green-600 text-white rounded-full'
                        : 'text-gray-700 dark:text-gray-200'
                    }}
                ">
                    {{ $day->day }}
                </span>

                    {{-- Punto indicador de horas --}}
                    @if($hasHours)
                        <div class="w-1.5 h-1.5 bg-blue-500 rounded-full mt-1"></div>
                    @endif

                </div>

            @endif

        @endforeach

    </div>



    @if($selectedDate)
        <div class="my-6">
            <flux:separator />
        </div>
        @if(Auth::user()->admin == 1)
        <div class="mb-6">
            <flux:button variant="primary" class="w-full" wire:click="$wire.myModal2 = true" >Crear Hora para el dia {{$selectedDate}}</flux:button>
        </div>
        @endif
        @foreach($horas->where('dia', $selectedDate) as $hora)
            <flux:card class="space-y-6 mb-4">
                <div>
                    <flux:heading size="lg" class="flex items-center gap-2">{{$hora->name}}@if(Auth::user()->admin == 1)<flux:icon x-data x-on:click="if (confirm('¿Estás seguro que deseas eliminar la hora?')) {$wire.eliminarhora({{ $hora->id }})}" name="x-mark" class="ml-auto text-zinc-400" variant="micro" />@endif</flux:heading>
                    <flux:text class="my-2">Máximo 9 personas</flux:text>
                    @if($reservas->where('hora_id',$hora->id)->count() >= 9) <flux:badge color="red">Clase Llena</flux:badge> @else <flux:badge color="lime">Cupos Disponibles</flux:badge>@endif
                    @if($reservas->where('hora_id',$hora->id)->where('user_id',Auth::id())->count() > 0) <flux:badge color="yellow">Ya estas inscrit@ en esta clase</flux:badge> @endif
                </div>
                <div class="space-y-6">
                    @if(Auth::user()->admin == 1)
                        <flux:table>
                            <flux:table.columns>
                                <flux:table.column>Participante</flux:table.column>
                                <flux:table.column>Borrar</flux:table.column>
                            </flux:table.columns>
                            @foreach($reservas->where('hora_id',$hora->id) as $reserva)
                                <flux:table.rows>
                                    <flux:table.row>
                                        <flux:table.cell>{{\App\Models\User::find($reserva->user_id)->name}}</flux:table.cell>
                                            <flux:table.cell>
                                                <div x-data x-on:click="if (confirm('¿Estás seguro que deseas eliminar al participante?')) {$wire.expulsar({{ $hora->id }}, {{ $reserva->user_id }}, @js($hora->disponible))}">
                                                    <flux:button size="xs" icon="x-mark" variant="ghost" inset/>
                                                </div>
                                            </flux:table.cell>
                                    </flux:table.row>
                                </flux:table.rows>
                            @endforeach
                        </flux:table>
                    @endif

                </div>
                <div class="space-y-2">
                    @if(Auth::user()->admin == 1)
                        @if($reservas->where('hora_id',$hora->id)->count() < 9)
                            <flux:select wire:model.live="alumnoseleccionado" size="sm" placeholder="Selecciona un alumno...">
                                <flux:select.option>Elige un alumno...</flux:select.option>
                                @foreach($alumnos as $alumno)
                                    <flux:select.option value="{{$alumno->id}}">{{$alumno->name}}</flux:select.option>
                                @endforeach
                            </flux:select>
                            <flux:button variant="primary" class="w-full" wire:click="inscribir({{$hora->id}})">Inscribir a la clase</flux:button>
                        @endif
                    @else
                        @if($reservas->where('hora_id',$hora->id)->count() >= 9)
                            @if($reservas->where('hora_id',$hora->id)->where('user_id',Auth::id())->count() > 0)
                                <div x-data x-on:click.stop="if (confirm('¿Estás seguro que deseas salir de esta clase?')) {$wire.sacar({{ $hora->id }}, @js($hora->disponible))}">
                                    <flux:button variant="danger" class="w-full">Salir de la clase</flux:button>
                                </div>
                            @endif
                        @else
                            @if($reservas->where('hora_id',$hora->id)->where('user_id',Auth::id())->count() > 0)
                                <div x-data x-on:click.stop="if (confirm('¿Estás seguro que deseas salir de esta clase?')) {$wire.sacar({{ $hora->id }}, @js($hora->disponible))}">
                                    <flux:button variant="danger" class="w-full">Salir de la clase</flux:button>
                                </div>
                            @else
                                <flux:button variant="primary" class="w-full" wire:click="inscribirse({{$hora->id}})">Inscribirse a la clase</flux:button>
                            @endif
                        @endif
                    @endif
                </div>
            </flux:card>
        @endforeach

    @endif

</div>
