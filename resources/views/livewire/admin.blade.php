<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row g-3"> <!-- Add gap between columns -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card bg-danger h-100">
                        <div class="card-body text-white text-center">
                            <p class="card-text">Total Products: {{ $product }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card bg-success h-100">
                        <div class="card-body text-white text-center">
                            <p class="card-text">Total Orders: {{ $order }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card bg-warning h-100">
                        <div class="card-body text-white text-center">
                            <p class="card-text">Pending Orders: {{ $pendingorder }}</p>
                        </div>
                    </div>
                </div>

                {{-- Example for a 4th card
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card bg-info h-100">
                        <div class="card-body text-white text-center">
                            <p class="card-text">Example Info</p>
                        </div>
                    </div>
                </div>
                --}}
            </div>
        </div>
    </main>
</div>
</div>
</main>
