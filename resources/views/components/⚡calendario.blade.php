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
    public $currentMonth;
    public $currentYear;

    public $selectedDate = null;
    public $horasa = [];

    public $daysWithHours = [];

    public function mount()
    {
        $this->horas = Hora::all();
        $this->reservas = Reserva::all();
        $this->currentMonth = now()->month;
        $this->currentYear  = now()->year;
        $this->loadDaysWithHours();
    }

    public function loadDaysWithHours()
    {
        $this->daysWithHours = Hora::whereMonth('dia', $this->currentMonth)
            ->whereYear('dia', $this->currentYear)
            //->where('disponible', true)
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
            //->where('disponible', true)
            ->orderBy('id')
            ->get();

        $this->dispatch('open-modal', name: 'hours-modal');
    }



    public function inscribirse($horaid)
    {
        if (Reserva::where('user_id', Auth::id())->where('hora_id', $horaid)->get()->count() == 0) {
            $reserva = new Reserva;
            $reserva->user_id = Auth::id();
            $reserva->hora_id = $horaid;
            $reserva->save();
            $this->reservas = Reserva::all();
        } else {
            $this->myModal1 = true;
        }
    }
    public function sacar($horaid)
    {
        Reserva::where('user_id', Auth::id())->where('hora_id', $horaid)->delete();
    }
    public function expulsar($horaid, $userid)
    {
        Reserva::where('user_id', $userid)->where('hora_id', $horaid)->delete();
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
    <x-mary-modal wire:model="myModal1" title="Ya tienes una reserva" class="backdrop-blur">
        Presiona `ESC`, haz click afuera o click `CANCELAR` para cerrar esta ventana.

        <x-slot:actions>
            <x-mary-button label="Cancelar" @click="$wire.myModal1 = false" />
        </x-slot:actions>
    </x-mary-modal>

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">

        <div class="flex items-center gap-3">
            <flux:button wire:click="previousMonth" variant="ghost">◀</flux:button>
            <flux:button wire:click="nextMonth" variant="ghost">▶</flux:button>
        </div>

        <h2 class="text-2xl text-black font-semibold capitalize">
            {{ $monthName }}
        </h2>

        <div></div>

    </div>

    {{-- Días de la semana --}}
    <div class="grid grid-cols-7 text-center font-medium text-gray-500 mb-2">
        <div>Lun</div>
        <div>Mar</div>
        <div>Mié</div>
        <div>Jue</div>
        <div>Vie</div>
        <div>Sáb</div>
        <div>Dom</div>
    </div>

    {{-- Grid calendario --}}
    <div class="grid grid-cols-7 gap-px bg-gray-200 rounded-xl overflow-hidden">

        @foreach($days as $day)

            @if($day === null)
                <div class="bg-gray-50 h-28"></div>
            @else
                @php
                    $dateFormatted = $day->format('Y-m-d');
                    $hasHours = in_array($dateFormatted, $daysWithHours);
                    $isToday = $day->isToday();
                @endphp

                <div
                    wire:click="selectDay('{{ $dateFormatted }}')"
                    class="
                        h-28 bg-white p-2 cursor-pointer relative
                        hover:bg-blue-50 transition
                    "
                >
                    <div class="flex justify-between items-start">

                        <span class="
                            text-sm font-medium
                            {{ $isToday ? 'bg-green-700 text-white rounded-full px-2' : 'bg-gray-400 text-white rounded-full px-2' }}
                        ">
                            {{ $day->day }}
                        </span>

                    </div>

                    {{-- Indicador de horas disponibles --}}
                    @if($hasHours)
                        <div class="absolute bottom-2 left-2 right-2">
                            <div class="h-2 bg-blue-500 rounded-full"></div>
                        </div>
                    @endif

                </div>
            @endif

        @endforeach

    </div>

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
    @if($selectedDate)
        @foreach($horas->where('dia', $selectedDate) as $hora)
            <flux:card class="space-y-6 mb-4">
                <div>
                    <flux:heading size="lg">{{$hora->name}}</flux:heading>
                    <flux:text class="my-2">Máximo 9 personas</flux:text>
                    @if($reservas->where('hora_id',$hora->id)->count() >= 9) <flux:badge color="red">Clase Llena</flux:badge> @else <flux:badge color="lime">Cupos Disponibles</flux:badge>@endif
                </div>
                <div class="space-y-6">
                    {{--<flux:table>
                        <flux:table.columns>
                            <flux:table.column>Participante</flux:table.column>
                            @if(Auth::user()->admin == 1)
                                <flux:table.column>Borrar</flux:table.column>
                            @endif
                        </flux:table.columns>
                        @foreach($reservas->where('hora_id',$hora->id) as $reserva)
                            <flux:table.rows>
                                <flux:table.row>
                                    <flux:table.cell>{{\App\Models\User::find($reserva->user_id)->name}}</flux:table.cell>
                                    @if(Auth::user()->admin == 1)
                                        <flux:table.cell>
                                            @if(Auth::user()->admin == 1)
                                                <flux:button wire:click="expulsar({{$hora->id}},{{$reserva->user_id}})" size="xs" icon="x-mark" variant="ghost" inset />
                                            @endif
                                        </flux:table.cell>
                                    @endif
                                </flux:table.row>
                            </flux:table.rows>
                        @endforeach
                    </flux:table>--}}
                </div>
                <div class="space-y-2">
                    @if($reservas->where('hora_id',$hora->id)->count() >= 9)
                        @if($reservas->where('hora_id',$hora->id)->where('user_id',Auth::id())->count() > 0)
                            <flux:button variant="danger" class="w-full" wire:click="sacar({{$hora->id}})">Salir de la clase</flux:button>
                        @endif
                    @else
                        @if($reservas->where('hora_id',$hora->id)->where('user_id',Auth::id())->count() > 0)
                            <flux:button variant="danger" class="w-full" wire:click="sacar({{$hora->id}})">Salir de la clase</flux:button>
                        @else
                            <flux:button variant="primary" class="w-full" wire:click="inscribirse({{$hora->id}})">Inscribirse a la clase</flux:button>
                        @endif
                    @endif
                </div>
            </flux:card>
        @endforeach

    @endif

</div>
