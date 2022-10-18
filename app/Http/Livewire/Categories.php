<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Categories extends Component
{

    
    use WithPagination;
    use WithFileUploads;
    //propiedades publicas


    public $form = false, $name='',$selected_id=0,$photo='';
    public $action = 'Listado', $componentName = 'Categorías', $search ='';
    private $pagination=4;

    protected $paginationTheme = 'tailwind';

    public function render()
    {

        if(strlen($this->search)>0)
        $info = Category::where('name','like',"%{$this->search}%")->paginate($this->pagination);
        else
        $info = Category::orderBy('name','asc')->paginate($this->pagination);

        return view('livewire.categories.component',[

        'categories' => $info


        ])->layout('layouts.theme.app');
    }


    public function Edit(Category $category){

            $this->selected_id = $category->id;
            $this->name = $category->name;

            $this->action = 'Editar';
            $this->form = true;

    }

    public function noty($msg, $eventName = 'noty', $reset = true, $action = '')
    {
        $this->dispatchBrowserEvent($eventName, ['msg' => $msg, 'type' => 'success', 'action' => $action]);
        if ($reset) $this->resetUI();
    }

    public function CloseModal()
    {
        $this->resetUI();
        $this->noty(null, 'close-modal');
    }
    public function resetUI()
    {
        // limpiar mensajes rojos de validación
        $this->resetValidation(); 
        // regresar a la página inicial del componente
        $this->resetPage(); 
        // regresar propiedades a su valor por defecto
        $this->reset('name', 'selected_id', 'search', 'action', 'componentName', 'photo', 'form');
    }

    public function Store()
    {
        sleep(1);

        $this->validate(Category::rules($this->selected_id), Category::$messages);

        $category = Category::updateOrCreate(
            ['id' => $this->selected_id],
            ['name' => $this->name]
        );

        // image
        if (!empty($this->photo)) {
            // delete all images in drive
            $tempImg = $category->image->file;
            if ($tempImg != null && file_exists('storage/categories/' . $tempImg)) {
                unlink('storage/categories/' . $tempImg);
            }
            // delete relationship image from db
            $category->image()->delete();

            // generate random file name
            $customFileName = uniqid() . '_.' . $this->photo->extension();
            $this->photo->storeAs('public/categories', $customFileName);

            // save image record
            $img = Image::create([
                'model_id' => $category->id,
                'model_type' => 'App\Models\User',
                'file' => $customFileName
            ]);

            // save relationship
            $category->image()->save($img);
        }
        $this->noty($this->selected_id < 1 ? 'Categoría Registrada' : 'Categoría Actualizada', 'noty', false, 'close-modal');
        $this->resetUI();
    }

    public function Destroy(Category $category)
    {
        $category->delete();
        $this->noty('Se eliminó la Categoría');
    }

    public $listeners = [
        'resetUI', 'Destroy'
    ];

    public function updatedForm()
    {
        if($this->selected_id > 0) 
            $this->action ='Editar';
        else
            $this->action ='Agregar';
        
    }
}
