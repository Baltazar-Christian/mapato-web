<!-- Add Income Modal -->
<div class="modal fade" id="AddIncomeModal" tabindex="-1" role="dialog" aria-labelledby="incomeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="incomeModalLabel">Earning Details</h5>
                <button type="button" class="btn-close btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ isset($income) ? route('income.update', $income->id) : route('income.store') }}" method="POST">
                @csrf
                @if(isset($income))
                    @method('PUT')
                @endif
                <div class="modal-body">
                    <!-- Form fields for income amount and source -->
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ isset($income) ? $income->date : old('date') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="source">Source</label>
                        <input type="text" class="form-control" id="source" name="source" value="{{ isset($income) ? $income->source : old('source') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" value="{{ isset($income) ? $income->amount : old('amount') }}" required>
                    </div>
                 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-navy" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">{{ isset($income) ? 'Update' : 'Create' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
