<div class="intro-y col-span-12">
    <div class="intro-y box">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
               Settings
           </h2>

       </div>
       <div id="vertical-form" class="p-5">
        <div class="preview grid grid-cols-12 gap-5">


            <div class="col-span-12">
                <label  class="form-label">Nombre del negocio</label>
                <input wire:model="name"  id="name" type="text" 
                class="form-control  kioskboard"  placeholder="eje: fastFOOD" />
                @error('name')
                <x-alert msg="{{ $message }}" />
                @enderror
            </div>

            <div class="col-span-12 ">
                <label  class="form-label">Dirección</label>
                <input wire:model="address"  id="address" type="text" 
                class="form-control  kioskboard"  placeholder="..." />
                @error('address')
                <x-alert msg="{{ $message }}" />
                @enderror
            </div>

            <div class="col-span-12 md:col-span-4 ">
                <label  class="form-label">Teléfono</label>
                <input wire:model="phone"  id="phone" type="text" 
                class="form-control  kioskboard"  placeholder="eje: 000 000 0000" />
                @error('phone')
                <x-alert msg="{{ $message }}" />
                @enderror
            </div>

            <div class="col-span-12 md:col-span-4 ">
                <label  class="form-label">Leyenda</label>
                <input wire:model="leyend"  id="leyend" type="text" 
                class="form-control  kioskboard"  placeholder="eje: Gracias por su compra" />
                @error('leyend')
                <x-alert msg="{{ $message }}" />
                @enderror
            </div>

            <div class="col-span-12 md:col-span-4 ">
                <label  class="form-label">Impresora</label>
                <input wire:model="printer"  id="printer" type="text" 
                class="form-control  kioskboard"  placeholder="EPSON-T20III" />
                @error('printer')
                <x-alert msg="{{ $message }}" />
                @enderror
            </div>           

            <div class="col-span-12">
                <label  class="form-label">Imágen (Logo Tickets)</label>
                <input wire:model="logo" accept="image/x-png,image/jpeg,image/jpg" class="form-control" type="file">
                @error('logo')
                    <x-alert msg="{{ $message }}" />
                    @enderror   
            </div>


            <div class="col-span-12 md:col-span-3 ">               
                @if($logoPreview)              
                <img class="rounded-lg recent-product-img " data-action="zoom" src="{{ asset($logoPreview) }}" width="150px">
                <h5>Logo actual</h5>                
                @endif

            </div>


            <div class="col-span-12 md:col-span-3 flex justify-center" >
                @if($logo)
                <div>
                    <img class="rounded-lg  recent-product-img" src="{{ $logo->temporaryUrl() }}" width="150px">
                    <h5 class="text-center">Nuevo logo</h5> 
                </div>

                @endif
            </div>
            
            


            <div class="col-span-12">                  

                <x-save />

            </div>
        </div>

    </div>
</div>
@include('livewire.sales.keyboard')

<script>
    KioskBoard.run('.kioskboard', {});

    document.querySelectorAll(".kioskboard").forEach(i => i.addEventListener(
        "change",
        e => {
            console.log(e.currentTarget.id)
            switch (e.currentTarget.id) {
                case 'name':
                    @this.name = e.target.value
                    break
                case 'address':
                    @this.address = e.target.value
                    break
                case 'phone':
                    @this.phone = e.target.value
                    break
                case 'leyend':
                    @this.leyend = e.target.value
                    break
                case 'printer':
                @this.printer = e.target.value
                     break
                default:
            }


        }))
</script>
</div>