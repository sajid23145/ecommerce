<div id="layoutSidenav_content">
    <main>

        <div class="container px-4">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
        <div class="container-fluid px-4">

            <div class="row">

                <div class="col-xl-12">
                    <a wire:navigate href="{{ url('/addproduct') }}" class="btn btn-primary">add product</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">image</th>
                                    <th scope="col">title</th>
                                    <th scope="col">description</th>
                                    <th scope="col">price</th>
                                    <th scope="col">status</th>
                                    <th scope="col">action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $pro)
                                    <tr>
                                        <td scope="row">{{ $pro->id }}</td>
                                        <td><img style="width: 80px; height: 50px; border-radius: 50%;"
                                                src="{{ asset('storage/images/' . $pro->image) }}" alt="">


                                        </td>
                                        <td>{{ $pro->title }}</td>
                                        <td class="text-wrap" style="max-width: 250px;">
                                            {{ \Illuminate\Support\Str::limit($pro->description, 15, '...') }}
                                        </td>
                                        <td>{{ $pro->price }}</td>
                                        <td>
                                            @if ($pro->status == 'available')
                                                <span class="badge text-bg-success">{{ $pro->status }}</span>
                                            @else
                                                <span class="badge text-bg-warning">{{ $pro->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a wire:navigate href="{{ url('/editproduct', $pro->id) }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <a wire:navigate wire:click="delete({{ $pro->id }})"><i
                                                    class="fa-solid fa-trash text-danger ms-2"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
