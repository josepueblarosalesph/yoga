<?php

use Livewire\Component;
use App\Models\Reserva;
use App\Models\Hora;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

new class extends Component
{
    public $reservas;

    public function mount(){
        $fecha = Carbon::parse(today());
        $this->reservas = Reserva::select('reservas.*')
            ->where('user_id',Auth::id())
            ->join('horas', 'reservas.hora_id', '=', 'horas.id')
            ->where('horas.dia', '>=', $fecha)
            ->get();
    }

    public function eliminar($reservaid)
    {
        Reserva::where('id', $reservaid)->delete();
    }
};
?>

<div>
    <flux:table>
        <flux:table.columns>
            <flux:table.column>Dia</flux:table.column>
            <flux:table.column>Salir de la clase</flux:table.column>
        </flux:table.columns>
        <flux:table.rows>
            @foreach ($this->reservas as $reserva)
                <flux:table.row :key="$reserva->id">

                    <flux:table.cell class="whitespace-nowrap">{{ Hora::where('id',$reserva->hora_id)->first()->name }}</flux:table.cell>

                    <flux:table.cell>
                        <flux:button wire:click="eliminar({{$reserva->id}})" variant="ghost" size="sm" icon="minus-circle" inset="top bottom"></flux:button>
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>
</div>
