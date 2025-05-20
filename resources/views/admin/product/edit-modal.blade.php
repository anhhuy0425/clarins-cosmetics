<div class="modal fade" id="editProductModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel{{ $product->id }}" aria-hidden="true">
    <div class="modal-dialog" id="editBookModal{{$product->id}}" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editVoucherModalLabel{{ $product->id }} ">Edit Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('editProduct', $product->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block">Product Name</label>
                    <input type="text" name="product_name" value="{{old('product_name', $product->product_name) }}" class="w-full border px-3 py-2 rounded" required>
                </div>
                 <div class="mb-4">
                        <label for="image">Hình ảnh:</label>
                        <input type="file" name="image" value="{{old('image', $product->image) }}" accept="image/*"><br>
                    </div>
                    <div class="mb-4">
                        <label class="block" for="price">Price</label>
                        <input type="text" name="price" value="{{old('price', $product->price) }}" class="w-full border px-3 py-2 rounded" required>
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
                        <textarea id="description" name="description" value="{{old('description', $product->description) }}" class="w-full border px-3 py-2 rounded" required></textarea>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
    </div>
</div>
