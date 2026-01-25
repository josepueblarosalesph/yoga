<?php

use Livewire\Component;
use App\Models\Hora;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    public $horas;
    public $idseleccionado = "lala1";
    public $reservas;
    public bool $myModal1 = false;


    public function mount()
    {
        $this->horas = Hora::all();
        $this->reservas = Reserva::all();
    }

    public function mensaje($horaid)
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
};
?>

<div>
    <x-mary-modal wire:model="myModal1" title="Ya tienes una reserva" class="backdrop-blur">
        Presiona `ESC`, haz click afuera o click `CANCELAR` para cerrar esta ventana.

        <x-slot:actions>
            <x-mary-button label="Cancelar" @click="$wire.myModal1 = false" />
        </x-slot:actions>
    </x-mary-modal>
    @foreach($horas as $hora)
        <flux:card class="space-y-6 mb-4">
            <div>
                <flux:heading size="lg">{{$hora->name}}</flux:heading>
                <flux:text class="my-2">Máximo 8 personas</flux:text>
                @if($reservas->where('hora_id',$hora->id)->count() >= 8) <flux:badge color="red">Clase Llena</flux:badge> @else <flux:badge color="lime">Cupos Disponibles</flux:badge>@endif
            </div>
            <div class="space-y-6">
                <flux:table>
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
                </flux:table>
            </div>
            <div class="space-y-2">
                @if($reservas->where('hora_id',$hora->id)->count() >= 8)
                    @if($reservas->where('hora_id',$hora->id)->where('user_id',Auth::id())->count() > 0)
                        <flux:button variant="danger" class="w-full" wire:click="sacar({{$hora->id}})">Salir de la clase</flux:button>
                    @endif
                @else
                    @if($reservas->where('hora_id',$hora->id)->where('user_id',Auth::id())->count() > 0)
                        <flux:button variant="danger" class="w-full" wire:click="sacar({{$hora->id}})">Salir de la clase</flux:button>
                    @else
                        <flux:button variant="primary" class="w-full" wire:click="mensaje({{$hora->id}})">Inscribirse a la clase</flux:button>
                    @endif
                @endif
            </div>
        </flux:card>
    @endforeach

</div>
