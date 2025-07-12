<div>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>product</title>
        <link rel="stylesheet" href="{{ asset('css/sty.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>

    <body>

        <div class="container-fluid">
            <div class="row">
                <!-- As a link -->
                <nav class="navbar shadow-lg bg-body-orange">
                    <div class="container-fluid">
                        <a class="text-decoration-none text-dark" wire:navigate href="{{url('/')}}"><h1 class="">E-commerce</h1></a>
                        <div class="ms-auto">
                        <form wire:submit.prevent="search" class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" wire:model.debounce.500ms="searchterm">
                            <button class="btn btn-outline-dark justify-content-center" type="submit">Search</button>
                          </form>
                        </div>
                        <div class="ms-auto">
                            <a class="navbar-brand btn btn btn-light" wire:navigate href="{{ url('/login') }}">login</a>
                                            <a class="navbar-brand btn btn-sm btn-light" wire:navigate href="{{ url('/register') }}">register</a>
                            <a class="navbar-brand btn btn-sm btn-success text-white"  wire:click.prevent="logout" wire:navigate href="">logout</a>

                        </div>

                    </div>
                </nav>
            </div>
        </div>
        <div class="container-fluid p-2">
            <div id="carouselExample" class="carousel slide p-2" data-bs-ride="carousel" data-bs-interval="2000">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{asset('pictures/img.jpg')}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="{{asset('pictures/web.jpg')}}" class="d-block w-100" alt="...">
                  </div>
                  {{-- <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                  </div> --}}
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>

        </div>

        <div class="container p-4">
                            <h1 class="">product list</h1>

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="row">
                @foreach ($product as $pro)
                    <div class="col-lg-3">
                        <div class="card">

                            <a
                                href=@if (Auth::check()) "
                           {{ url('/productdetail', $pro->id) }}" @endif><img
                                    src="{{ asset('storage/images/' . $pro->image) }}" class="card-img-top"
                                    alt="...">
                            </a>


                            <div class="card-body text-center text-decoration-none">
                                <a class="text-decoration-none"
                                    href=@if (Auth::check()) "
                              {{ url('/productdetail', $pro->id) }}" @endif>
                                    <h5 class="card-title">{{ $pro->title }}</h5>
                                </a>
                                <a class="text-decoration-none"
                                    href=@if (Auth::check()) "
                              {{ url('/productdetail', $pro->id) }}" @endif>
                                    <p class="card-text">{{ Str::limit($pro->description, 15, '...') }}</p>
                                </a>
                                <a class="text-decoration-none"
                                    href=@if (Auth::check()) "
                              {{ url('/productdetail', $pro->id) }}" @endif>
                                    <h6 class="">{{ $pro->price }}</h6>
                                </a>
                                {{-- <a href="#" class="btn btn-success btn-sm">buy now with paypal</a>
                              <a href="#" class="btn btn-primary btn-sm">submit order</a> --}}

                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">chair</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                              <h6 class="">$ 145</h6>
                              <a href="#" class="btn btn-success btn-sm">buy now with paypal</a>
                              <a href="#" class="btn btn-primary btn-sm">submit order</a>
                                            </div>
                          </div>
                    </div>

               <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">chair</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <h6 class="">$ 145</h6>
                      <a href="#" class="btn btn-success btn-sm">buy now with paypal</a>
                      <a href="#" class="btn btn-primary btn-sm">submit order</a>        </div>
                  </div>
                </div>

                  <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">chair</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <h6 class="">$ 145</h6>
                          <a href="#" class="btn btn-success btn-sm">buy now with paypal</a>
                          <a href="#" class="btn btn-primary btn-sm">submit order</a>
                        </div>
                      </div>
                </div> --}}
            </div>
            {{-- <div class="row">
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">chair</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <h6 class="">$ 145</h6>
                          <a href="#" class="btn btn-success btn-sm">buy now with paypal</a>
                          <a href="#" class="btn btn-primary btn-sm">submit order</a>
                        </div>
                      </div>
                </div>
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">chair</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <h6 class="">$ 145</h6>
                          <a href="#" class="btn btn-success btn-sm">buy now with paypal</a>
                          <a href="#" class="btn btn-primary btn-sm">submit order</a>
                        </div>
                      </div>
                </div>

            <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">chair</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <h6 class="">$ 145</h6>
                  <a href="#" class="btn btn-success btn-sm">buy now with paypal</a>
                  <a href="#" class="btn btn-primary btn-sm">submit order</a>
                    </div>
              </div>
            </div>

              <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title text-center">chair</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <h6 class="text-center">$ 145</h6>
                      <a href="#" class="btn btn-success btn-sm">buy now with paypal</a>
                      <a href="#" class="btn btn-primary btn-sm">submit order</a>
                            </div>
                  </div>
            </div>
            </div> --}}
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>
</div>
