<div id="layoutSidenav_content">
    <main>
        <div class="container p-4">
            <h4 class="text-center">add product</h4>
            <div class="row">

                <div class="col-12">
                    <form wire:submit.prevent="submit" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="examplename1" class="form-label">title</label>
                            <input type="text" class="form-control" id="name1" wire:model="title" name="title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">description</label>
                            <input type="text" wire:model="description" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="description">
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPhonenumber1" class="form-label">price</label>
                            <input type="text" class="form-control" id="examplephonenumber1" name="price"
                                wire:model="price">
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
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputimage1" class="form-label">status</label>
                            <select class="form-select" aria-label="Default select example" wire:model="status"
                                name="status">
                                <option selected>select status</option>
                                <option value="available">available</option>
                                <option value="not available">not available</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>


            </div>

        </div>
    </main>
