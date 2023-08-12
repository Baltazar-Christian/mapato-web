{{-- All Savings Page --}}
@extends('layouts.master')

@section('content')
    <div class="container mt-3">

        <div class="row">
            <div class="col-md-12">

                <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#expensesModal">
                    <i class="fa fa-plus"></i> Add Expense
                </button>



            </div>
            <hr>
            <br>

            <div class="col-md-12 mt-2">

                @if (session('success'))
                    <div class="alert alert-success bg-opacity-20" style="opacity:70%">{{ session('success') }}</div>
                @endif
                <div class="card" style="opacity:94%;">
                    <div class="card-header bg-navy">
                        <h3 class="card-title">Daily Expenses Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        @if (count($expenses) == 0)
                            <h4 class="text-center text-danger"> No Expenses Available ! </h4>
                        @else
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($expenses as $saving)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $saving->created_at }}</td>
                                            <td>{{ $saving->description }}</td>
                                            <td>{{ $saving->amount }}</td>

                                            <td>
                                                <button type="button" class="btn btn-sm bg-navy" data-toggle="modal"
                                                    data-target="#savingsModal" data-savings-id="{{ $saving->id }}"
                                                    data-savings-amount="{{ $saving->amount }}"
                                                    data-savings-description="{{ $saving->description }}">
                                                    Edit
                                                </button>
                                                <!-- Delete button with a confirmation prompt -->
                                                <form class="d-inline" method="POST"
                                                    action="{{ route('savings.destroy', $saving->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this savings record?')">
                                                        Delete
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>

                            </table>
                        @endif






                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>



    </div>
    <!-- Include the income modal -->
    @include('expenses.modal')




    {{-- start of scripts --}}
    {{-- @section('scripts') --}}
    <script>
        // resources/js/savings-modal.js
// resources/js/expenses-modal.js

$(document).ready(function () {
    // Handle the "Create" button to clear the form
    $('.create-expense-btn').click(function (e) {
        e.preventDefault();

        var form = $('#expensesForm');
        form.attr('action', '{{ route('expenses.store') }}');
        form.find('input[name="_method"]').remove();
        form.find('#amount').val('');
        form.find('#description').val('');

        $('#expensesModal').modal('show');
    });

    // Handle modal close event to reset the form
    $('#expensesModal').on('hidden.bs.modal', function () {
        var form = $('#expensesForm');
        form.attr('action', '{{ route('expenses.store') }}');
        form.find('input[name="_method"]').remove();
        form.find('#amount').val('');
        form.find('#description').val('');
    });
});

    </script>
    {{-- @endsection --}}


@endsection
