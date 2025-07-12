<?php

namespace App\Livewire;

use App\Mail\NewOrderMail;
use App\Mail\ordersubmittedmail;
use App\Models\order;
use App\Services\ordershowService;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\Attributes\Title;

class Ordershow extends Component
{

     protected $ordershowservice;

    public function boot(ordershowService $ordershowservice)
    {
$this->ordershowservice=$ordershowservice;
    }
public function updatestatus($ordid,$markorder){

$order=$this->ordershowservice->getbyid($ordid);
$order->markorder=$markorder;
$order->save();
if ($order->markorder === 'processed') {
    Mail::to($order->email)->send(new ordersubmittedmail($order));

}

session()->flash('message', 'Order status updated successfully!');

}
#[title('showorder-page')]

    public function render()
    {
        $order=order::with('product')->with('user')->get();
        return view('livewire.ordershow',compact('order'));
    }
}
