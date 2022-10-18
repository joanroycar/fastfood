<div>

    
    <div class="intro-y col-span-12">
  
      <div class="intro-y box">
      <h2 class="text-lg font-medium text-center text-theme-1 py-4">
          PRODUCTOS
      </h2>
  
      <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2 p-4">
        <button onclick="openPanel('add')" class="btn btn-primary shadow-md mr-2">Agregar</button>


        <div class="hidden md:block mx-auto text-gray-600">-</div>
        
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700 dark:text-gray-300">
                <input wire:model="search" id="search" type="text" class="form-control w-56 box pr-10 placeholder-theme-13 kioskboard" placeholder="Buscar...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0 fas fa-search"></i>
            </div>
        </div>
    </div>



  
      <div class="p-5">
  
          <div class="preview">
              <div class="overflow-x-auto">
                  <table class="table">
                      <thead>
                          <tr class="text-theme-1">
                              <th class="border-b-2 dark:border-dark-5 whitespace-nowrap" width="10%"></th>
                              <th class="border-b-2 dark:border-dark-5 whitespace-nowrap" width="30%">DESCRIPCIÓN</th>
                              <th class="border-b-2 dark:border-dark-5 whitespace-nowrap text-center" > CATEGORIA</th>
                              <th class="border-b-2 dark:border-dark-5 whitespace-nowrap text-center" > COSTO</th>
                              <th class="border-b-2 dark:border-dark-5 whitespace-nowrap text-center" > PRECIO</th>
                              <th class="border-b-2 dark:border-dark-5 whitespace-nowrap text-center" > STOCK</th>
                              <th class="border-b-2 dark:border-dark-5 whitespace-nowrap text-center" > ACTIONS</th>


                          </tr>
                      </thead>
  
                      <tbody>
  
                       @forelse ($products as $product)
  
                       <tr class="dark:bg-dark-1  {{$loop->index % 2> 0 ? 'bg-gray-200': ''}}">
                      
                           <td>
                              <img src="{{$product->img}}" data-action="zoom" alt="img-product" width="100%">
                           </td>
                           <td class="dark:border-dark-5">
                              <h6 class="mb-1 font-medium">{{$product->name}}</h6>
                              <small class="font-normal">{{$product->sales->count()}} Ventas</small>
                           </td>

                           <td class="text-center">{{strtoupper($product->category)}}</td>
                           <td class="text-center font-medium">{{number_format($product->cost,2)}}</td>
                           <td class="text-center font-medium">{{number_format($product->price,2)}}</td>
                           <td class="text-center font-medium">{{$product->stock}}</td>

                           <td class="dark:border-dark-5 text-center">
  
                              <div class="d-flex justify-content-center">
                                  
                                  @if($product->sales->count() < 1)
                                  <button
                                  onclick="destroy('products','Destroy',{{$product->id}})" type="button" class="btn btn-danger text-white border-0" >
                                      <i class="fas fa-trash fa-2x"></i>
                                  </button>
                              
                                  @endif
  
                                  <button class="btn btn-warning text-white border-0 ml-3" wire:click.prevent="Edit({{$product->id}})" type="button">
                                      <i class="fas fa-edit fa-2x"></i>
                                  </button>
                              </div>
  
  
                           </td>
                      
                      </tr>
  
                           
                       @empty
                       <tr class="bg-gray-200 dark:bg-dark-1"> 
  
                          
                          <td colspan="2">
                              <h6 class="text-center">NO HAY PRODUCTOS REGISTRADOS</h6>
                          </td> 
                       </tr>
                           
                       @endforelse
  
  
                      </tbody>
  
                  </table>
              </div>
          </div>
      </div>
  
  
      <div class="col-span-12 p-5">
          {{$products->links()}}
      </div>
       </div>
    </div>
  
    @include('livewire.products.panel')
  
  
    @include('livewire.sales.keyboard')
  
  
  
  
  <script>
      const inputSearch = document.getElementById('search')
      inputSearch.addEventListener('change', (e) => {
          @this.search = e.target.value;
      })



      function openPanel(action = ''){

        if(action == 'add'){
            @this.resetUI()
        }

        var modal = document.getElementById('panelProduct')
        modal.classList.add('overflow-y-auto','show')
        modal.style.cssText = "margin-top: 0px; margin-left: 0px; padding-left: 17px; z-index:100"
      
    }

    function closePanel(action = ''){
        var modal = document.getElementById('panelProduct')
        modal.classList.add('overflow-y-auto','show')
        modal.style.cssText = ""  
    }

    window.addEventListener('open-modal', event =>{
        openPanel()
    })

    window.addEventListener('noty', event =>{
        if(event.detail.action == 'close-modal')
            closePanel()
    })

    kioskBoard.run('.kioskBoard',{})



  </script>


<script>      

    document.querySelectorAll(".kioskboard").forEach(i => i.addEventListener("change",e => {
            
            switch (e.currentTarget.id) {
                case 'name':
                    @this.name = e.target.value
                    break
                case 'cost':
                    @this.cost = e.target.value
                    break
                case 'code':
                    @this.code = e.target.value
                    break
                case 'price':
                    @this.price = e.target.value
                    break
                case 'price2':
                    @this.price2 = e.target.value
                    break
                case 'stock':
                    @this.stock = e.target.value
                    break
                case 'minstock':
                    @this.minstock = e.target.value
                    break                   
                default:
            }


        }))
</script>
    </div>
