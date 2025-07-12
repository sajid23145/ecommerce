<?php

namespace App\Livewire;

use App\Models\product;
use App\Services\ProductService;
use Livewire\Component;
use Livewire\Attributes\Title;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalCheckout extends Component
{
    public $id;
    public $product;

     protected $productservice;

    public function boot(ProductService $productService)
    {
$this->productservice=$productService;
    }
    public function mount($id){
        $this->id=$id;
        $this->product=$this->productservice->getbyid($id);
    }
    public function processpayment(){
$provider=new paypalclient;
$provider->setApiCredentials(config('paypal'));
$paypalToken=$provider->getAccessToken();

$response=$provider->createOrder([
    "intent"=>"CAPTURE",
    "purchase_units"=>[
        [
            "amount"=>[
                "currency_code"=>config('paypal.currency'),
                "value"=>$this->product->price
            ]
        ]
            ],
            "application_context"=>[
                // "cancel_url"=>route('paypal.cancel'),
                "return_url"=>route('paypal.success',$this->product),
            ]
]);
if (isset($response['id']) && $response['id'] !=null) {
    return redirect($response['links'][1]['href']);

}else {
    session()->flash('error', 'Something went wrong with PayPal.');

}
    }
    #[title('paypal-checkout')]

    public function render()
    {
        $product=$this->product;
        return view('livewire.pay-pal-checkout',compact('product'));
    }
}
