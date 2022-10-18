<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{

    use WithPagination;
    public $name = '', $email = '', $password = '', $temppass = '', $selected_id = 0, $search = '', $componentName = 'USUARIOS', $profile = 'Admin', $form = false, $action = 'Listado';
    private $pagination = 5;
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        if (strlen($this->search) > 0)
        $users = User::where('name', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%")
            ->orderBy('name', 'asc')
            ->paginate($this->pagination);

        else
        $users = User::orderBy('name', 'asc')
                ->paginate($this->pagination);



        return view('livewire.users.component',[
            'users'=>$users
        ])->layout('layouts.theme.app');
    }

    public function noty($msg, $eventName = 'noty', $reset = true, $action = '')
    {
        $this->dispatchBrowserEvent($eventName, ['msg' => $msg, 'type' => 'success', 'action' => $action]);
        if ($reset) $this->resetUI();
    }

    public function AddNew()
    {
        $this->resetUI();
        $this->form = true;
        $this->action = 'Agregar';
    }

    public function CloseModal()
    {
        $this->resetUI();
        $this->noty(null, 'close-modal');
    }
    public function resetUI()
    {
        $this->resetValidation();
        $this->resetPage();
        $this->reset('name', 'selected_id', 'temppass', 'search', 'componentName', 'email', 'password', 'profile', 'form');
    }

   

    public $listeners = [
        'resetUI',
        'Destroy'
    ];

    public function Edit(User $user)
    {
        $this->selected_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = null;
        $this->tempass = $user->password;
        $this->profile = $user->profile;
        $this->form = true;
        $this->action = 'Editar';
    }

    public function Store()
    {
        $this->validate(User::rules($this->selected_id), User::$messages);

        User::updateOrCreate(
            ['id' => $this->selected_id],
            [
                'name' => $this->name,
                'email' => $this->email,
                'profile' => $this->profile,
                'password' => strlen($this->password) > 0 ? bcrypt($this->password) : $this->temppass
            ]
        );


        $this->noty($this->selected_id > 0 ? 'Usuario actualizado' : 'Usuario registrado');
        $this->resetUI();
    }
    public function Destroy(User $user)
    {
        if ($user->sales->count() < 1) {
            $user->delete();
            $this->noty("El usuario <b>$user->name</b> fue eliminado del sistema");
        } else {
            $this->noty('No es posible eliminar el usuario porque tiene ventas asociadas');
        }
    }
}
