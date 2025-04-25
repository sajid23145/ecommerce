<div id="layoutSidenav_content">
    <main>
        <div class="container p-4">
            <h4 class="text-center">edit product</h4>
            <div class="row">
                <div class="col-lg-12">
                    <form wire:submit.prevent="update" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="examplename1" class="form-label">title</label>
                            <input type="text" value="{{ $product->title }}" class="form-control" id="name1"
                                wire:model="title" name="title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">description</label>
                            <input type="text" value="{{ $product->description }}" wire:model="description"
                                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="description">
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPhonenumber1" class="form-label">price</label>
                            <input type="text" value="{{ $product->price }}" class="form-control"
                                id="examplephonenumber1" name="price" wire:model="price">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mb-3" wire:ignore>
                            <label for="exampleInputimage1" class="form-label">image</label>
                            <input type="file" class="form-control" wire:model="image" name="image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <img style="width: 80px; height: 50px; border-radius: 50%;"
                                src="{{ asset('storage/images/' . $product->image) }}" alt=""
                                style="width: 50px">

                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" wire:model="status">
                                <option value="available" @if ($product->status == 'available') selected @endif>Available
                                </option>
                                <option value="not available" @if ($product->status == 'not available') selected @endif>Not
                                    Available</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>


            </div>

        </div>
    </main>
