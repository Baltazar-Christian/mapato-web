<!-- Debts Modal -->
<div class="modal fade" id="debtsModal" tabindex="-1" role="dialog" aria-labelledby="debtsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="debtsModalLabel">Debt Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="debtsForm" action="{{ isset($debt) ? route('debts.update', $debt->id) : route('debts.store') }}" method="POST">
                @csrf
                @if(isset($debt))
                    @method('PUT')
                @endif
                <div class="modal-body">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" value="{{ isset($debt) ? $debt->amount : old('amount') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ isset($debt) ? $debt->description : old('description') }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-navy">{{ isset($debt) ? 'Update' : 'Create' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
