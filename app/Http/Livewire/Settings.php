<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Settings extends Component
{
    Use WithFileUploads;
    public $name, $address, $phone, $leyend, $printer, $logo, $logoPreview;

    public function render()
    {
        return view('livewire.settings.component')->layout('layouts.theme.app');
    }



    public function mount()
    {
        $info = Setting::first();

        if($info){
            $this->name = $info->name;
            $this->address = $info->address;
            $this->phone = $info->phone;
            $this->leyend = $info->leyend;
            $this->printer = $info->printer;
            $this->logoPreview = $info->logo;
            $this->logo = null;
        }
    }

    public function Store()
    {

        $rules = [
            'name' => 'required|min:3|max:65',
            'phone' => 'required|max:10',
            'address' => 'required|max:255',
            'leyend' => 'required|max:50',
            'printer' => 'required|max:30',
            'logo' => 'required|image|mimes:jpg,png,jpeg|dimensions:min_width=128,min_height=128,max_width=128,max_height=128'
        ];

        $msg = [
            'name.required' => 'Ingresa el nombre del negocio',
            'name.min' => 'El nombre debe tener al menos 3 caracteres',
            'name.max' => 'El nombre debe tener máximo 65 caracteres',
            'phone.required' => 'Ingresa el teléfono',
            'phone.max' => 'El teléfono debe tener máximo 10 caracteres',
            'address.required' => 'Ingresa la dirección',        
            'address.max' => 'La dirección debe tener máximo 255 caracteres',        
            'leyend.required' => 'Ingresa la leyenda',        
            'leyend.max' => 'La leyenda debe tener máximo 50 caracteres',        
            'printer.required' => 'Ingresa el nombre de la impresora',
            'printer.max' => 'El nombre de la impresora debe tener máximo 30 caracteres',
            'logo.required' => 'Selecciona la imagen de logo',
            'logo.image' => 'El logo debe ser un archivo de tipo imagen',
            'logo.mimes' => 'El tipo de archivo para el logo debe ser JPG,PNG,JPEG',
            'logo.dimensions' => 'Las dimensiones del logo deben ser 128x128',
        
        ];


        $this->validate($rules, $msg);

        sleep(2);
        $tempLogo = Setting::first()->logo ?? null;

        Setting::truncate();
        $config = Setting::create(
            [
                'name' => $this->name,
                'phone' => $this->phone,
                'address' => $this->address,
                'leyend' => $this->leyend,           
                'printer' => $this->printer,
            ]
        );

        if ($this->logo != null) {

            // delete current logo           
        if (File::exists(public_path($tempLogo))) {            
          File::delete($tempLogo);
         }           

      // save logo in db
      $customFileName = uniqid() . '_.' . $this->logo->extension();            
      $config->logo = $customFileName;
      $config->save();

      // storage logo in public folder
      $this->logo->storeAs('', $customFileName, 'public2');  //CONFIGURAR DRIVER PUBLIC2       
        
      // display new logo
      $this->logoPreview = $customFileName;   

      // clear previous logo
      $this->logo=null;

      }


      $this->dispatchBrowserEvent('noty', ['msg'=> 'CONFIGURACIÓN GUARDADA', 'type' => 'success']);

    }

    public $sisteners =['refresh' => '$refresh'];

}
