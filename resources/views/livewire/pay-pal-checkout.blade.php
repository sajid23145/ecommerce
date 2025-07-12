<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link rel="stylesheet" href="{{ asset('css/sty.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <!-- As a link -->
                <nav class="navbar shadow-lg bg-body-orange">
                    <div class="container-fluid">
                        <a class="text-decoration-none text-dark" href="{{url('/')}}"><h1 class="">E-commerce</h1></a>
                        <div class="ms-auto">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-dark justify-content-center" type="submit">Search</button>
                          </form>
                        </div>
                        <div class="ms-auto">
                            <a class="navbar-brand btn btn btn-light" href="{{ url('/login') }}">login</a>
                                            <a class="navbar-brand btn btn-sm btn-light" href="{{ url('/register') }}">register</a>
                            <a class="navbar-brand btn btn-sm btn-success text-white" wire:navigate wire:click.prevent="logout" href="">logout</a>

                        </div>

                    </div>
                </nav>
            </div>
        </div>
        <div class="container p">
            <div class="row justify-content-center ">
                <div class="col-12 col-sm-8 col-md-6 col-lg-4 border custom-border border-2 rounded-3 p-4">
                    <div>
                        <h1 class="text-center text-orange">paypal checkout</h1>
                        </div>
                        <div>
                            <hr class="full-width-hr border custom-border border-2 opacity-50">
                            </div>
            <h2 class="">Buy product:   <br>{{ $product->title }}</h2>
            <h3>Price:   <br>${{ $product->price }}</h3>
            <div class="text-center">
            <button wire:click="processpayment" class="btn btn-orange">Pay with PayPal</button>
        </div>
    </div>
    </div>
</div>


    </body>

    </html>
</div>
