<div class="modal fade" id="savingsModal" tabindex="-1" role="dialog" aria-labelledby="savingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="savingsModalLabel">Savings Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="savingsForm" action="{{ isset($saving) ? route('savings.update', $saving->id) : route('savings.store') }}" method="POST">
                @csrf
                @if(isset($saving))
                    @method('PUT')
                @endif
                <div class="modal-body">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" value="{{ isset($saving) ? $saving->amount : old('amount') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        {{-- <textarea class="form-control" id="description" name="description" value="{{ isset($saving) ? $saving->description : old('description') }}" required rows="5"></textarea> --}}
                        <input type="text" class="form-control" id="description" name="description" value="{{ isset($saving) ? $saving->description : old('description') }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-navy" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">{{ isset($saving) ? 'Update' : 'Create' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
