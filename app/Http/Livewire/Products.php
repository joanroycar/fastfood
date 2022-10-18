<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Products extends Component
{
    
    use WithPagination;
    use WithFileUploads;

    public $name='',$code='',$cost=0,$price=0,$price2=0,$stock=0,$minstock=0,$category='elegir',
    $selected_id=0, $gallery=[];


    public $action= 'Listado', $componentName='Catalogo de Productos',$search,$form=false;

    public $pagination=5;

    protected $paginationTheme = 'tailwind';

    public function render()
    {

        if(strlen($this->search)>0)
        $info = Product::join('categories as c', 'c.id', 'products.category_id')
        ->select('products.*', 'c.name as category')
        ->where('products.name', 'like', "%{$this->search}%")
        ->orWhere('products.code', 'like', "%{$this->search}%")
        ->orWhere('c.name', 'like', "%{$this->search}%")
        ->paginate($this->pagination);        
        else
        $info = Product::join('categories as c', 'c.id', 'products.category_id')
        ->select('products.*', 'c.name as category')
        ->paginate($this->pagination);




        return view('livewire.products.component',[
            'products'=> $info,
            'categories' => Category::orderBy('name','asc')->get()
        ])->layout('layouts.theme.app');
    }
    public $listeners = [
        'resetUI',
        'Destroy'
    ];

    public function noty($msg, $eventName = 'noty', $reset = true, $action = '')
    {
        $this->dispatchBrowserEvent($eventName, ['msg' => $msg, 'type' => 'success', 'action' => $action]);
        if ($reset) $this->resetUI();
    }

    public function AddNew()
    {
        $this->resetUI();
        $this->noty(null, 'open-modal');
    }

    public function resetUI()
    {
        $this->resetValidation();
        $this->resetPage();
        $this->reset(
            'name', 
            'code', 
            'cost', 'price', 
            'price2', 'stock', 
            'minstock', 'selected_id', 
            'search', 'action', 'category',
            'componentName', 'gallery');
    }

    public function Edit(Product $product)
    {
        $this->selected_id = $product->id;
        $this->name = $product->name;
        $this->code = $product->code;
        $this->cost = $product->cost;
        $this->price = $product->price;
        $this->price2 = $product->price2;
        $this->stock = $product->stock;
        $this->minstock = $product->minstock;
        $this->category = $product->category_id;
        $this->noty('', 'open-modal', false);
    }

    public function Store()
    {
        sleep(1);

        $this->validate(Product::rules($this->selected_id), Product::$messages);

        $product = Product::updateOrCreate(
            ['id' => $this->selected_id],
            [
                'name' => $this->name,
                'code' => $this->code,
                'cost' => $this->cost,
                'price' => $this->price,
                'price2' => $this->price2,
                'stock' => $this->stock,
                'minstock' => $this->minstock,
                'category_id' => $this->category
            ]
        );

        // image
        if (!empty($this->gallery)) {

            if ($this->selected_id > 0) {
                // delete all images in drive
                $product->images()->each(function ($img) {
                    if ($img->file != null && file_exists('storage/products/' . $img->file)) {
                        unlink('storage/products/' . $img->file);
                    }
                });
                // delete relationship image from db
                $product->images()->delete();
                //$product->images()->where('id', '=', 1)->delete();
            }

            foreach ($this->gallery as $photo) {
                $customFileName = uniqid() . '_.' . $photo->extension();
                $photo->storeAs('public/products', $customFileName);

                // creamos la imagen
                $img = Image::create([
                    'model_id' => $product->id,
                    'model_type' => 'App\Models\Product',
                    'file' => $customFileName
                ]);
                // guardamos relacion
                $product->images()->save($img);
            }
        }

        $this->noty($this->selected_id < 1 ? 'Producto Registrado' : 'Producto Actualizado', 'noty', false, 'close-modal');
        $this->resetUI();
    }

    public function Destroy(Product $product)
    {

        $this->noty('Se eliminó el Producto');

        $product->images()->each(function ($img) {
            if ($img->file != null && file_exists('storage/products/' . $img->file)) {
                unlink('storage/products/' . $img->file);
            }
        });
        //ELIMINAR LA RELACIONES

        $product->images()->delete();
        ///ELIMINAR PRODUCTO
        $product->delete();
    }




}
