<div>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link rel="stylesheet" href="{{ asset('css/sty.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            {{-- <style>
                .custom-border {
                  border-color: #ff6600 !important; /* Bright orange */
                }
              </style> --}}
    </head>

    <body>
        <div class="container-fluid">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="row">
                <nav class="navbar shadow-lg bg-body-orange">
                    <div class="container-fluid">
                        <a class="text-decoration-none text-dark" wire:navigate href="{{url('/')}}"><h1 class="">{{config('constants.title_name')}}</h1></a>
                        <div class="ms-auto">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-dark justify-content-center" type="submit">Search</button>
                          </form>
                        </div>
                        <div class="ms-auto">
                            <a class="navbar-brand btn btn btn-light" wire:navigate href="{{ url('/login') }}">login</a>
                                            <a class="navbar-brand btn btn-sm btn-light" wire:navigate href="{{ url('/register') }}">register</a>

                        </div>

                    </div>
                </nav>
                <!-- As a heading -->
            </div>
        </div>


        <div class="container p">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="row justify-content-center">
                <div class="col-4 border custom-border border-2 rounded-3 p-4">
                    <div>
                    <h1 class="text-center text-orange">login</h1>
                    </div>
                    <form wire:submit.prevent="submit">


                        <div class="mb-3">
                            <label  class="form-label b-1">Email address</label>
                            <input  type="email" wire:model="email" class="form-control"
                                 name="email" autocomplete="off">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label  class="form-label">password</label>
                            <input  type="text" class="form-control"  wire:model="password"
                                name="password" autocomplete="off">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <button type="submit" class="btn btn-orange">Submit</button>
                    </form>
                </div>


            </div>

        </div>

    </body>

    </html>
</div>
