<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Traits\CartTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Sales extends Component
{
    use WithPagination;
    use CartTrait;
    public $orderDetails = [], $search, $cash, $searchcustomer, $currentStatusOrder, $order_selected_id, $customer_id = null, $changes, $customerSelected = 'Seleccionar Cliente';

    // public $customerSelected = "Seleccionar Cliente";
    // public $itemsCart = 0;
    // public $totalCart = 0;

    // mostrar y activar panels
    public $showListProducts = false, $tabProducts = true, $tabCategories = false;

    // colecctions
    public $productsList = [], $customers = [];
    
    // info carrito
    public  $totalCart = 0, $itemsCart = 0, $contentCart = [];
    
    // producto seleccionado
    public $productIdSelected, $productChangesSelected, $productNameSelected, $changesProduct;

    // pagination style
    protected $paginationTheme = 'bootstrap';







    public function render()
    {if (strlen($this->searchcustomer) > 0)
        $this->customers = Customer::where('name', 'like', "%{$this->searchcustomer}%")->orderBy('name', 'asc')->get()->take(5);
    else
        $this->customers = Customer::orderBy('name', 'asc')->get()->take(5);
   

    $this->totalCart = $this->getTotalCart();
    $this->itemsCart = $this->getItemsCart();
    $this->contentCart = $this->getContentCart();

    return view('livewire.sales.component', [
        'categories' => Category::with('products')
        ->orderBy('id', 'asc')->get()->take(15)
    ])->layout('layouts.theme.app');
        // return view('livewire.sales.component')->layout('layouts.theme.app');
    }

    public function setTabActive($tabName){

        if($tabName == 'tabProducts'){
            $this->tabProducts = true;
            $this->tabCategories=false;

        }else{
            $this->tabProducts = false;
            $this->showListProducts = false;

            $this->tabCategories=true;
        }
    }
    public function getProductsByCategory($category_id)
    {
        $this->showListProducts = true;
        $this->productsList = Product::where('category_id', $category_id)->where('stock','>',0)->get(); // *
    }
    public function add2Cart(Product $product)
    {
        $this->addProductToCart($product, 1,$this->changes);        
        $this->changes = '';
    }
    public function noty($msg, $eventName = 'noty')
    {
        $this->dispatchBrowserEvent($eventName, ['msg' => $msg, 'type' => 'success']);
    }

    public function increaseQty(Product $product, $cant =1){
        $this->updateQtyCart($product, $cant);
    }
    // decrementar cantidad item en carrito
    public function decreaseQty($productId)
    {
        $this->decreaseQtyCart($productId);
    }
// eliminar producto del carrito
public function removeFromCart($id)
{
    $this->removeProductCart($id);
}

// actualizar cantidad item en carrito
public function updateQty(Product $product, $cant = 1)
{
    if($cant + $this->countInCart($product->id) > $product->stock) 
    {
        $this->noty('STOCK INSUFICIENTE','noty','error');
        $this->dispatchBrowserEvent('refresh');
        return;
    }


    if ($cant <= 0)
        $this->removeProductCart($product->id);
    else
        $this->replaceQuantityCart($product->id, intval($cant));
}

    public function removeChanges()
    {
        $this->clearChanges($this->productIdSelected);
        $this->dispatchBrowserEvent('close-modal-changes');
    }
    public function addChanges($changes)
    {
        $this->addChanges2Product($this->productIdSelected, $changes);
        $this->dispatchBrowserEvent('close-modal-changes');
    }
    public function updatedCustomerSelected()
    {
        $this->dispatchBrowserEvent('close-customer-modal');
    }

    public function resetUI()
    {
        $this->reset('tabProducts', 'cash', 'showListProducts', 'tabCategories', 'search', 'searchcustomer', 'customer_id', 'customerSelected', 'totalCart', 'itemsCart', 'productIdSelected', 'productChangesSelected', 'productNameSelected', 'changesProduct');
    }
    public function storeSale($print = false)
    {
        if ($this->getTotalCart() <= 0) {
            $this->noty('AGREGA PRODUCTOS A LA VENTA', 'noty', 'error');
            return;
        }


        DB::beginTransaction();

        try {
            if ($this->customerSelected != 'Seleccionar Cliente') {
                $this->customer_id = Customer::where('name', $this->customerSelected)->first()->id;
            } else {
                 $this->customer_id = Customer::where('name', 'Mostrador')->first()->id;
            }


            $sale = Order::create([
                'total' => $this->getTotalCart(),
                'shipping' =>  0,
                'items' => $this->getItemsCart(),
                'discount' => 0,
                'cash' => $this->cash,
                'type' => 'Web',
                'status' => 'Pending',
                'user_id' => Auth()->user()->id,
                'customer_id' =>  $this->customer_id
            ]);

            if ($sale) {
                $items = $this->getContentCart();
                foreach ($items as  $item) {
                    OrderDetail::create([
                        'order_id' => $sale->id,
                        'product_id' => $item->id,
                        'quantity' => $item->qty,
                        'price' => $item->price,
                        'changes' => $item->changes
                    ]);

                    //update stock
                    $product = Product::find($item->id);
                    $product->stock = $product->stock - $item->qty;
                    $product->save();
                }
            }


            DB::commit();
            $this->clearCart();
            $this->resetUI();

            //si se hizo click en el botón imprimir
            if($print) $this->PrintTicket($sale->id);

            $this->noty('Venta Registrada con Éxito');

        } catch (\Throwable $e) {
            DB::rollback();
            $this->noty('Error al guardar el pedido: ' . $e->getMessage(), 'noty', 'error');
        }
    }
    public $listeners = ['cancelSale'];

    public function cancelSale()
    {
        $this->clearCart();
        $this->resetUI();
        $this->noty('VENTA CANCELADA');
    }




}
