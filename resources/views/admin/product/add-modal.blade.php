<div class="modal fade" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="createProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="createBookModal">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <div class="modal-body">
                <form action="{{ route('addProduct')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="mb-4">
                        <label for="image">Hình ảnh:</label>
                        <input type="file" name="image" accept="image/*"><br>
                    </div>
                    <div class="mb-4">
                        <label class="block" for="product_name">Product Name</label>
                        <input type="text" name="product_name" class="w-full border px-3 py-2 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block" for="price">Price</label>
                        <input type="text" name="price" class="w-full border px-3 py-2 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block">Category</label>
                        <select name="category_id" class="w-full border px-3 py-2 rounded" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block" for="description">Description</label>
                        <textarea id="description" name="description" class="w-full border px-3 py-2 rounded" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
