<div wire:ignore.self id="panelProduct" class="modal modal-slide-over" data-backdrop="static" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <a data-dismiss="modal" href="javascript:;"> 
                <i class="fas fa-times fa-2x w-8 h-8 text-gray-500"></i> 
            </a>

            <div class="modal-header p-5">
                <h2 class="font-medium text-base mr-auto">Gestión de Productos</h2>

                <x-save class="mt-4 mr-5" />

            </div>

            <div class="modal-body mr-5">

                <div class="">
                    <div class="input-group">
                        <div class="input-group-text">Nombre</div>
                        <input wire:model="name" id="name" type="text" class="form-control form-control-lg kioskboard" placeholder="eje: Cerveza Artesanal">
                    </div>
                    @error('name')
                    <x-alert msg="{{ $message }}" />
                    @enderror
                </div>

                <div class="mt-4">
                    <div class="sm:grid grid-cols-2 gap-2">
                        <div class="input-group">
                            <div class="input-group-text">Costo</div>
                            <input wire:model="cost" id="cost" type="number" class="form-control form-control-lg kioskboard" data-kioskboard-type="numpad" placeholder="eje: 100.00">
                        </div>
                        <div class="input-group">
                            <div class="input-group-text">Código</div>
                            <input wire:model="code" id="code" type="text" class="form-control form-control-lg kioskboard" placeholder="eje: 750100">
                        </div>
                        @error('cost')
                        <x-alert msg="{{ $message }}" /> 
                        @enderror
                    </div>
                    @error('code') 
                    <span class="text-theme-6">{{ $message }}
                    </span> 
                    @enderror
                </div>
                <div class="mt-4">
                    <div class="input-group">
                        <div class="input-group-text">Precio1</div>
                        <input wire:model="price" id="price" type="number" class="form-control form-control-lg kioskboard" data-kioskboard-type="numpad" placeholder="eje: 150.00">
                    </div>
                    @error('price')
                    <x-alert msg="{{ $message }}" /> @enderror
                </div>
                <div class="mt-4">
                    <div class="input-group">
                        <div class="input-group-text">Precio2</div>
                        <input wire:model="price2" id="price2" type="number" class="form-control form-control-lg kioskboard" data-kioskboard-type="numpad" placeholder="eje: 139.00">
                    </div>
                    @error('price2')
                    <x-alert msg="{{ $message }}" /> @enderror
                </div>
                <div class="mt-4">
                    <div class="sm:grid grid-cols-2 gap-2">
                        <div class="input-group">
                            <div class="input-group-text">Stock</div>
                            <input wire:model="stock" id="stock" type="number" class="form-control form-control-lg kioskboard" data-kioskboard-type="numpad" placeholder="eje: 500">
                        </div>
                        <div class="input-group">
                            <div class="input-group-text">Mínimos</div>
                            <input wire:model="minstock" id="minstock" type="number" class="form-control form-control-lg kioskboard" data-kioskboard-type="numpad" placeholder="eje: 10">
                        </div>
                        @error('stock')
                        <x-alert msg="{{ $message }}" /> @enderror
                    </div>
                    @error('minstock')
                    <x-alert msg="{{ $message }}" /> @enderror
                </div>
                <div class="mt-4">
                    <div class="input-group">
                        <div class="input-group-text">Categoría</div>
                        <select wire:model.defer="category" class="form-select form-select-lg sm:mr-2">
                            <option value="elegir">Elegir</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category')
                    <x-alert msg="{{ $message }}" /> @enderror
                </div>

                <div class="mt-4">
                    <div class="grid grid-flow-col auto-cols-max md:auto-cols-min gap-2">
                        <div>
                            <label>Imágenes</label>
                            <input type="file" class="form-control" wire:model.defer="gallery" accept="image/x-png,image/jpeg" multiple>
                            @error('gallery.*')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Loading Message for Images -->
                        <div wire:loading wire:target="gallery">Subiendo Imagenes...</div>
                    </div>
                    @if( !empty( $gallery ) )
                    <div class=" sm:grid-cols-12 md:grid-cols-2 grid grid-cols-3 gap-2 pt-2 overflow-y-auto ">
                        @foreach ( $gallery as $photo )
                        <div>
                            <img class="rounded-lg" src="{{ $photo->temporaryUrl() }}">
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

        </div>

    </div>
</div>