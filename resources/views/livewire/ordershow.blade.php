<div id="layoutSidenav_content">
    <main>

        <div class="container px-4">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <h1 class="mt-4">orders</h1>
            <ol class="breadcrumb mb-4">
                {{-- <li class="breadcrumb-item active">order</li> --}}
            </ol>
            <div class="row">
                <div class="col-xl-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">user name</th>
                                    <th scope="col">product name</th>
                                    <th scope="col">price</th>
                                    <th scope="col">name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">phone number</th>
                                    <th scope="col">address</th>
                                    <th scope="col">payment method</th>
                                    <th scope="col">mark order</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $ord)
                                    <tr>
                                        <th scope="row">{{ $ord->id }}</th>
                                        <td>{{ $ord->user->name }}</td>
                                        <td>{{ $ord->product->title }}</td>
                                        <td>{{ $ord->price }}</td>
                                        <td>{{ $ord->name }}</td>
                                        <td>{{ $ord->email }}</td>
                                        <td>{{ $ord->phonenumber }}</td>
                                        <td>{{ $ord->address }}</td>
                                        <td>
                                            @if ($ord->paymont_method == 'contact')
                                                <span class="badge text-bg-success">{{ $ord->paymont_method }}</span>
                                            @else
                                                <span class="badge text-bg-warning">{{ $ord->paymont_method }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-success btn-sm dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{ $ord->markorder }}
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-dark">
                                                    <li><a class="dropdown-item" href="#"
                                                            wire:click.prevent="updatestatus({{ $ord->id }},'processed')">processed</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"
                                                            wire:click.prevent="updatestatus({{ $ord->id }},'delievered')">delievered</a>
                                                    </li>
                                                </ul>
                                            </div>

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

























    {{-- @if ($ord->markorder == 'ordered')
                                    <span class="badge text-bg-info">{{ $ord->markorder }}</span>

                                    @elseif($ord->markorder=='process')

                                    <span class="badge text-bg-success">{{ $ord->markorder  }}</span>
                                    @else
                                    <span class="badge text-bg-warning">{{ $ord->markorder  }}</span>

                                    @endif --}}
