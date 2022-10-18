<div>
   
    <div class="intro-y grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 md:col-span-3">
            <div class="intro-y box">
                <h6 class="text-center font-bold">Elige el Año de Consulta</h6>
                <select wire:model="year" class="form-select form-select-lg">
                    @foreach($listYears as $y)
                    <option value="{{$y}}">{{$y}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="intro-y grid grid-cols-12 gap-6 mt-5">


        <div class="col-span-12 lg:col-span-6">
            <div class="intro-y box">
                <h4 class="p-3 text-center text-theme-1 font-bold">TOP 5 MAS VENDIDOS</h4>
                <div id="chartTop5">
                </div>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-6">
            <div class="intro-y box ">
                <h4 class="p-3 text-center text-theme-1 font-bold">VENTAS DE LA SEMANA</h4>
                <div id="chartArea">
                </div>
            </div>
        </div>

    </div>

    <div class="intro-y grid grid-cols-12 pt-5">
        <div class="col-span-12 ">
            <div class="intro-y box ">
                <h4 class="p-3 text-center text-theme-1 font-bold"> VENTAS ANUALES {{$year}}</h4>
                <div id="chartMonth">
                </div>
            </div>
        </div>
    </div>


    @include('livewire.dash.scripts')

</div>
