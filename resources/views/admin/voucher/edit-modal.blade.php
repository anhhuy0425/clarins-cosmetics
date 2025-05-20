<div class="modal fade" id="editVoucherModal{{$voucher->id}}" tabindex="-1" role="dialog" aria-labelledby="editVoucherModalLabel{{ $voucher->id }}" aria-hidden="true">
    <div class="modal-dialog" id="editBookModal{{$voucher->id}}" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editVoucherModalLabel{{ $voucher->id }} ">Edit Voucher</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('editVoucher', $voucher->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block">Code</label>
                    <input type="text" name="code" value="{{old('code', $voucher->code) }}" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block" for="discount_type">Discount Type</label>
                    <select name="discount_type" required>
                        <option value="percent" {{ old('discount_type', $voucher->discount_type) == 'percent' ? 'selected' : '' }}>Percent (%)</option>
                        <option value="amount" {{ old('discount_type', $voucher->discount_type) == 'amount' ? 'selected' : '' }}>Amount ($)</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block" for="discount_value">Discount Value</label>
                    <input type="number" step="0.01" value="{{old('discount_value', $voucher->discount_value) }}" name="discount_value" class="w-full border px-3 py-2 rounded"   required>
                </div>
                <div class="mb-4">
                    <label class="block" for="min_order_amount">Min Order Amount ($)</label>
                    <input type="number" step="0.01" value="{{old('min_order_amount', $voucher->min_order_amount) }}" name="min_order_amount" class="w-full border px-3 py-2 rounded"   required>
                </div>
                <div class="mb-4">
                    <label class="block" for="start_date">Start Date</label>
                    <input type="date" name="start_date" value="{{old('start_date', $voucher->start_date) }}" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block" for="expiry_date">Expiry Date</label>
                    <input type="date" name="expiry_date" value="{{old('expiry_date', $voucher->expiry_date) }}"  class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
    </div>
</div>
