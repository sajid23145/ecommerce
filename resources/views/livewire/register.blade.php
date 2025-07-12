<div>
    <div>

        <div>
            <div>
                <div>
                    <!doctype html>
                    <html lang="en">

                    <head>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Bootstrap demo</title>
                        <link rel="stylesheet" href="{{ asset('css/sty.css') }}">
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
                            rel="stylesheet"
                            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
                            crossorigin="anonymous">
                    </head>

                    <body>
                        <div class="container-fluid">
                            <div class="row">
                                <!-- As a link -->
                                <nav class="navbar shadow-lg bg-body-orange">
                                    <div class="container-fluid">
                                        <a class="text-decoration-none text-dark" wire:navigate href="{{url('/')}}"><h1 class="">E-commerce</h1></a>
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


                        <div class="container p-4">

                            <div class="row justify-content-center">

                                <div class="col-12 col-sm-8 col-md-6 col-lg-4 border custom-border border-2 rounded-3 p-4">
                                    <div>
                                    <h1 class="text-center text-orange">Register</h1>
                                    </div>
                                    <form wire:submit.prevent="submit">

                                        <div class="mb-3">
                                            <label for="examplename1" class="form-label">name</label>
                                            <input type="text" class="form-control" id="name1" wire:model="name"
                                                name="name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                            <input type="email" wire:model="email" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" name="email" autocomplete="off">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPhonenumber1" class="form-label">Phone
                                                number</label>
                                            <input type="tell" class="form-control" id="examplephonenumber1"
                                                name="phonenumber" wire:model="phonenumber" autocomplete="off">
                                            @error('phonenumber')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputaddress1" class="form-label">password</label>
                                            <input type="text" class="form-control" id="exampleaddress1"
                                                wire:model="password" name="password" autocomplete="off">
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

            </div>
        </div>

    </div>

</div>
