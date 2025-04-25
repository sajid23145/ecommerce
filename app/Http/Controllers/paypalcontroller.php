<?php

namespace App\Http\Controllers;
use App\Mail\NewOrderMail;
use App\Models\order;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;

class paypalcontroller extends Controller
{
    public function success(Request $request,$id)
    {
        $product=product::find($id);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        // Extracting necessary details
        $price = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'] ?? null;
        $name = $response['purchase_units'][0]['shipping']['name']['full_name'] ?? 'Unknown';
        $email = $response['payer']['email_address'] ?? 'Unknown';
        $addressArray = $response['purchase_units'][0]['shipping']['address'] ?? [];

        $address = implode(', ', array_filter([
            $addressArray['address_line_1'] ?? '',
            $addressArray['admin_area_2'] ?? '',
            $addressArray['admin_area_1'] ?? '',
            $addressArray['postal_code'] ?? '',
            $addressArray['country_code'] ?? ''
        ]));

        // Save to database
        $order = new order;
        $order->user_id = Auth::id(); // Get current authenticated user
        $order->product_id=$product->id;
        $order->price = $price;
        $order->name = $name;
        $order->email = $email;
        $order->phonenumber = Auth::user()->phonenumber ?? null; // optional
        $order->address = $address;
        $order->paymont_method = 'paypal';
        $order->save();

        $order->load('product');

        Mail::to($email)->send(new NewOrderMail($order));

        return redirect(url('/'))->with('message','Order placed successfully! Our team will contact you.');



}
}
