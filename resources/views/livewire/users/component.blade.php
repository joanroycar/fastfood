
    <div>
        @if(!$form)
        <div class="intro-y col-span-12">
            <div class="intro-y box">
                <h2 class="text-lg font-medium text-center text-theme-1 py-4">
                    {{strtoupper($componentName)}}
                </h2>
                <x-search />

                <div class="p-5" id="striped-rows-table">
                    <div class="preview">
                        <div class="overflow-x-auto">
                            <table class="table">
                                <thead>
                                    <tr class="text-theme-1">
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap ">NOMBRE</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap ">EMAIL</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap ">PROFILE</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap text-center"> ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                    <tr class="dark:bg-dark-1 font-medium {{$loop->index % 2 >0 ? 'bg-gray-200' : '' }}">

                                        <td class="dark:border-dark-5">
                                            {{ $user->name }}
                                        </td>
                                        <td class="dark:border-dark-5">
                                            {{ $user->email }}
                                        </td>
                                        <td class="dark:border-dark-5">
                                            {{ $user->profile }}
                                        </td>


                                        <td class="dark:border-dark-5 text-center">
                                            <div class="d-flex justify-content-center">
                                                @if( $user->sales->count() < 1) <button onclick="destroy('users','Destroy',{{ $user->id}})" type="button" class="btn btn-danger text-white bg-light border-0"><i class='fas fa-trash fa-2x'></i></button>
                                                    @endif
                                                    <button wire:click.prevent="Edit({{$user->id}})" type="button" class="ms-3 btn btn-warning text-white bg-light border-0 ml-3"><i class="fas fa-edit fa-2x"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="bg-gray-200 dark:bg-dark-1">
                                        <td colspan="2">
                                            <h6 class="text-center">NO HAY USUARIOS</h6>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 p-5">
                    {{$users->links()}}
                </div>
            </div>
        </div>


        @else
        @include('livewire.users.form')
    </div>
    @endif

    @include('livewire.sales.keyboard')


    <script>
        const inputSearch = document.getElementById('search')
        inputSearch.addEventListener('change', (e) => {
            @this.search = e.target.value;
        })


        KioskBoard.run('.kioskboard', {});
    </script>

    </div>