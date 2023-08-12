{{-- All Savings Page --}}
@extends('layouts.master')

@section('content')
    <div class="container mt-3">

        <div class="row">
            <div class="col-md-12">

                <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#debtsModal">
                    <i class="fa fa-plus"></i> Add Debt
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
                        <h3 class="card-title">Daily Debts Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        @if (count($debts) == 0)
                            <h4 class="text-center text-danger"> No Debts Available ! </h4>
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
                                    @foreach ($debts as $debt)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $debt->created_at }}</td>
                                            <td>{{ $debt->amount }}</td>
                                            <td>{{ $debt->description }}</td>
                                            <td>
                                                <!-- Button to open the debts modal for editing the record -->
                                                <button type="button" class="btn btn-sm bg-navy edit-debt-btn" data-toggle="modal" data-target="#debtsModal" data-debt-id="{{ $debt->id }}" data-debt-amount="{{ $debt->amount }}" data-debt-description="{{ $debt->description }}">
                                                    Edit
                                                </button>
                                                <!-- Form for deleting the debt record -->
                                                <form class="d-inline" method="POST" action="{{ route('debts.destroy', $debt->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this debt record?')">
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
    @include('debts.modal')




    {{-- start of scripts --}}
    {{-- @section('scripts') --}}
    <script>
// resources/js/debts-modal.js

$(document).ready(function () {
    // Handle the "Create" button to clear the form
    $('.create-debt-btn').click(function (e) {
        e.preventDefault();

        var form = $('#debtsForm');
        form.attr('action', '{{ route('debts.store') }}');
        form.find('input[name="_method"]').remove();
        form.find('#amount').val('');
        form.find('#description').val('');

        $('#debtsModal').modal('show');
    });

    // Handle modal close event to reset the form
    $('#debtsModal').on('hidden.bs.modal', function () {
        var form = $('#debtsForm');
        form.attr('action', '{{ route('debts.store') }}');
        form.find('input[name="_method"]').remove();
        form.find('#amount').val('');
        form.find('#description').val('');
    });
});


    </script>
    {{-- @endsection --}}


@endsection
