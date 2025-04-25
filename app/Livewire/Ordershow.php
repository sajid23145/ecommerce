<?php

namespace App\Livewire;

use App\Mail\NewOrderMail;
use App\Mail\ordersubmittedmail;
use App\Models\order;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\Attributes\Title;

class Ordershow extends Component
{
public function updatestatus($ordid,$markorder){

$order=order::find($ordid);
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
