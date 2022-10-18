
<div>
    @if(!$form)
    <div class="intro-y col-span-12">
        <div class="intro-y box">
            <h2 class="text-lg font-medium text-center text-theme-1 py-4">
                CLIENTES
            </h2>
            <x-search />

            <div class="p-5" id="striped-rows-table">
                <div class="preview">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr class="text-theme-1">
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap ">NOMBRE</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap ">CALLE</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap ">COLONIA</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap ">CIUDAD</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap ">ESTADO</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap ">C.P.</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap ">PAÍS</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap text-center"> ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($customers as $customer)
                                <tr class="dark:bg-dark-1 font-medium {{$loop->index % 2 >0 ? 'bg-gray-200' : '' }}">

                                    <td class="dark:border-dark-5">
                                        {{ $customer->name }}
                                    </td>
                                    <td class="dark:border-dark-5">
                                        {{ $customer->street }}
                                    </td>
                                    <td class="dark:border-dark-5">
                                        {{ $customer->colony }}
                                    </td>
                                    <td class="dark:border-dark-5">
                                        {{ $customer->city }}
                                    </td>
                                    <td class="dark:border-dark-5">
                                        {{ $customer->state }}
                                    </td>
                                    <td class="dark:border-dark-5">
                                        {{ $customer->zipcode }}
                                    </td>
                                    <td class="dark:border-dark-5">
                                        {{ $customer->country }}
                                    </td>

                                    <td class="dark:border-dark-5 text-center">
                                        <div class="d-flex justify-content-center">
                                            @if( $customer->orders->count() < 1) <button onclick="destroy('customers','Destroy',{{ $customer->id}})" type="button" class="btn btn-danger text-white bg-light border-0"><i class='fas fa-trash fa-2x'></i></button>
                                                @endif
                                                <button wire:click.prevent="Edit({{$customer->id}})" type="button" class="ms-3 btn btn-warning text-white bg-light border-0 ml-3"><i class="fas fa-edit fa-2x"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr class="bg-gray-200 dark:bg-dark-1">
                                    <td colspan="2">
                                        <h6 class="text-center">NO HAY CLIENTES</h6>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-span-12 p-5">
                {{$customers->links()}}
            </div>
        </div>
    </div>


    @else
    @include('livewire.customers.form')
</div>
@endif

@include('livewire.sales.keyboard')


<script>
    document.addEventListener('click', (e) => {
        
        if (e.target.id == 'search') {

            KioskBoard.run('#search', {})

            document.getElementById('search').blur()
            document.getElementById('search').focus()

            const inputSearch = document.getElementById('search')
            inputSearch.addEventListener('change', (e) => {
                @this.search = e.target.value
            })
        }
    })
</script>

</div>