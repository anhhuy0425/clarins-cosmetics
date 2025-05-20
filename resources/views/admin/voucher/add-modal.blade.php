<div class="modal fade" id="createVoucherModal" tabindex="-1" role="dialog" aria-labelledby="createVoucherModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="createBookModal">Add Voucher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <div class="modal-body">
                <form action="{{ route('addVoucher')}}" method="POST" >
                    @csrf
                    <div class="mb-4">
                        <label class="block" for="code">Code</label>
                        <input type="text" name="code" class="w-full border px-3 py-2 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block" for="discount_type">Discount Type</label>
                        <select name="discount_type" required>
                            <option value="percent">Percent (%)</option>
                            <option value="amount">Amount ($)</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block" for="discount_value">Discount Value</label>
                        <input type="number" step="0.01" name="discount_value" class="w-full border px-3 py-2 rounded"   required>
                    </div>
                    <div class="mb-4">
                        <label class="block" for="min_order_amount">Min Order Amount ($)</label>
                        <input type="number" step="0.01" name="min_order_amount" class="w-full border px-3 py-2 rounded"   required>
                    </div>
                    <div class="mb-4">
                        <label class="block" for="start_date">Start Date</label>
                        <input type="date" name="start_date"  class="w-full border px-3 py-2 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label class="block" for="expiry_date">Expiry Date</label>
                        <input type="date" name="expiry_date"  class="w-full border px-3 py-2 rounded" required>
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
