<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\User;
use App\Traits\PrinterTrait;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Reports extends Component
{
    use PrinterTrait;
    use WithPagination;
    public $search, $startDate, $endDate, $userId = 'TODOS', $details =[];
    private $pagination = 6;
    public function render()
    {
        return view('livewire.reports.component', [
            'orders' => $this->getReport(),
            'users' => $this->loadUsers()
        ])->layout('layouts.theme.app');
    }

    public function loadUsers()
    {
        if(strlen($this->search) > 0)
            $users = User::where('name','like',"%{$this->search}%")
                           ->orderBy('name', 'asc')
                           ->get()->take(5);
        else
            $users = User::orderBy('name', 'asc')->get()->take(5);

        return $users;
    }
    public function getReport()
    {
        if ($this->startDate == '' || $this->endDate == '') {
            $from = Carbon::now('America/Lima')->format('Y-m-d');
            $to = Carbon::now('America/Lima')->format('Y-m-d');
        } else {
            $from = Carbon::parse($this->startDate)->format('Y-m-d') . ' 00:00:00';
            $to   = Carbon::parse($this->endDate)->format('Y-m-d') . ' 23:59:59';
        }


        if ($this->userId != 'TODOS'){

            $uid = trim(explode("|", $this->userId)[1]);           
            
            $orders = Order::whereBetween('created_at', [$from, $to])
            ->where('user_id', $uid)
            ->orderBy('id', 'desc')
            ->paginate($this->pagination);
        }
        else{
            $orders = Order::whereBetween('created_at', [$from, $to])
            ->orderBy('id', 'desc')
            ->paginate($this->pagination);
        }


        return $orders;
    }
    public function viewDetails(Order $order)
    {
        $this->details = $order->details;
        $this->dispatchBrowserEvent('open-modal-detail');
    }

    public function updatedUserId()
    {
        $this->search ='';
        $this->dispatchBrowserEvent('close-modal-user');
    }


    public function rePrint($orderId)
    {
        $this->PrintTicket($orderId);
        $this->dispatchBrowserEvent('noty',['msg' => 'Se envió a reimprimir el ticket de Venta','type' => 'success']);
    }
}
