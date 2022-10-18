<div class="intro-y col-span-12">
    <div class="intro-y box">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                {{$componentName}} | <span class="font-normal">{{ $action }}</span>
            </h2>

        </div>
        <div id="vertical-form" class="p-5">
            <div class="preview">

                <div class="mt-3">
                    <div class="sm:grid grid-cols-3 gap-5">
                        <div>
                            <label class="form-label">Nombre</label>
                            <input wire:model="name" id="name" type="text" class="form-control form-control-lg border-start-0 kioskboard {{($errors->first('name') ? "border-danger" : "")}}" placeholder="eje: Luis Fax" maxlength="255" />
                            @error('name')
                            <x-alert msg="{{ $message }}" />
                            @enderror
                        </div>
                        <div>
                            <label class="form-label">Teléfono</label>
                            <input wire:model="phone" id="phone" data-kioskboard-type="numpad" type="text" class="form-control form-control-lg border-start-0 kioskboard {{($errors->first('phone') ? "border-danger" : "")}}" placeholder="eje: 3511159550" maxlength="10" />
                            @error('phone')
                            <x-alert msg="{{ $message }}" />
                            @enderror
                        </div>
                        <div>
                            <label class="form-label">Calle</label>
                            <input wire:model="street" id="street" type="text" class="form-control form-control-lg border-start-0 kioskboard {{($errors->first('street') ? "border-danger" : "")}}" placeholder="eje: Avenida Reforma" maxlength="255" />
                            @error('street')
                            <x-alert msg="{{ $message }}" />
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="sm:grid grid-cols-3 gap-5">
                        <div>
                            <label class="form-label">Número</label>
                            <input wire:model="number" id="number" type="text" data-kioskboard-type="numpad" class="form-control form-control-lg border-start-0 kioskboard {{($errors->first('number') ? "border-danger" : "")}}" placeholder="eje: 2490" maxlength="20" />
                            @error('number')
                            <x-alert msg="{{ $message }}" />
                            @enderror
                        </div>
                        <div>
                            <label class="form-label">Colonia</label>
                            <input wire:model="colony" id="colony" type="text" class="form-control form-control-lg border-start-0 kioskboard {{($errors->first('colony') ? "border-danger" : "")}}" placeholder="eje: Centro" maxlength="60" />
                            @error('colony')
                            <x-alert msg="{{ $message }}" />
                            @enderror
                        </div>
                        <div>
                            <label class="form-label">Ciudad</label>
                            <input wire:model="city" id="city" type="text" class="form-control form-control-lg border-start-0 kioskboard {{($errors->first('city') ? "border-danger" : "")}}" placeholder="eje: Lima" maxlength="35" />
                            @error('city')
                            <x-alert msg="{{ $message }}" />
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="sm:grid grid-cols-3 gap-5">
                        <div>
                            <label class="form-label">Estado</label>
                            <input wire:model="state" id="state" type="text" class="form-control form-control-lg border-start-0 kioskboard {{($errors->first('state') ? "border-danger" : "")}}" placeholder="eje: D.F." maxlength="70" />
                            @error('state')
                            <x-alert msg="{{ $message }}" />
                            @enderror
                        </div>
                        <div>
                            <label class="form-label">Código Postal</label>
                            <input wire:model="zipcode" id="zipcode" data-kioskboard-type="numpad" type="text" class="form-control form-control-lg border-start-0 kioskboard {{($errors->first('zipcode') ? "border-danger" : "")}}" placeholder="eje: 55555" maxlength="5" />
                            @error('zipcode')
                            <x-alert msg="{{ $message }}" />
                            @enderror
                        </div>
                        <div>
                            <label class="form-label">País</label>
                            <input wire:model="country" id="country" type="text" class="form-control form-control-lg border-start-0 kioskboard {{($errors->first('country') ? "border-danger" : "")}}" placeholder="eje: México" maxlength="50" />
                            @error('country')
                            <x-alert msg="{{ $message }}" />
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="mt-5">
                    <x-back />

                    <x-save />
                </div>
            </div>

        </div>
    </div>
    <script>
        KioskBoard.run('.kioskboard', {});

        document.querySelectorAll(".kioskboard").forEach(i => i.addEventListener("change",e => {
                console.log(e.currentTarget.id)
                switch (e.currentTarget.id) {
                    case 'name':
                        @this.name = e.target.value
                        break
                    case 'phone':
                        @this.phone = e.target.value
                        break
                    case 'street':
                        @this.street = e.target.value
                        break
                    case 'number':
                        @this.number = e.target.value
                        break
                    case 'colony':
                        @this.colony = e.target.value
                        break
                    case 'city':
                        @this.city = e.target.value
                        break
                    case 'state':
                        @this.state = e.target.value
                        break
                    case 'zipcode':
                        @this.zipcode = e.target.value
                        break
                    case 'country':
                        @this.country = e.target.value
                        break
                    default:
                }


            }))
    </script>
</div>