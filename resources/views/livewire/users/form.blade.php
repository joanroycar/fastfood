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
                    <div class="grid grid-cols-3 gap-5">
                        <div>
                            <label class="form-label">Nombre</label>
                            <input wire:model="name" id="name" type="text" class="form-control form-control-lg border-start-0 kioskboard {{($errors->first('name') ? "border-danger" : "")}}" placeholder="eje: Luis Fax" maxlength="255" />
                            @error('name')
                            <x-alert msg="{{ $message }}" />
                            @enderror
                        </div>
                        <div>
                            <label class="form-label">Email</label>
                            <input wire:model="email" id="email" type="text" class="form-control form-control-lg border-start-0 kioskboard {{($errors->first('email') ? "border-danger" : "")}}" placeholder="eje: luisfaax@gmail.com" maxlength="255" />
                            @error('email')
                            <x-alert msg="{{ $message }}" />
                            @enderror
                        </div>
                        <div>
                            <label class="form-label">Password</label>
                            <input wire:model="password" id="password" data-kioskboard-type="numpad" type="password" class="form-control form-control-lg border-start-0 kioskboard {{($errors->first('password') ? "border-danger" : "")}}" placeholder="..." maxlength="255" />
                            @error('password')
                            <x-alert msg="{{ $message }}" />
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="grid grid-cols-4 ">
                    <div class="col-end-2 bg-amber-500">
                        <label class="form-label">Perfil</label>
                        <select wire:model="profile" class="form-select form-select-lg sm:mr-2">
                            <option value="Admin">Administrador</option>
                            <option value="Employee">Empleado</option>
                        </select>
                        @error('profile')
                        <x-alert msg="{{ $message }}" /> @enderror
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

        document.querySelectorAll(".kioskboard").forEach(i => i.addEventListener(
            "change",
            e => {
                console.log(e.currentTarget.id)
                switch (e.currentTarget.id) {
                    case 'name':
                        @this.name = e.target.value
                        break
                    case 'email':
                        @this.email = e.target.value
                        break
                    case 'password':
                        @this.password = e.target.value
                        break
                    default:
                }


            }))
    </script>
</div>