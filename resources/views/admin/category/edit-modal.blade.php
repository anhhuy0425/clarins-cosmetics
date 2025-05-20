<div class="modal fade" id="editCategoryModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel{{ $category->id }}" aria-hidden="true">
    <div class="modal-dialog" id="editBookModal{{$category->id}}" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editCategoryModalLabel{{ $category->id }} ">Edit Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('editCategory', $category->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                        <label class="block" for="name">Name</label>
                        <textarea id="Name" name="name" value="{{old('name', $category->name) }}" class="w-full border px-3 py-2 rounded" required></textarea>
                </div>
                <div class="mb-4">
                    <label class="block" for="description">Description </label>
                    <input type="text" name="description" value="{{old('description', $category->description) }}" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
    </div>
</div>
