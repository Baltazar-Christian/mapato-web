{{-- All Earnings Page --}}
@extends('layouts.master')

@section('content')
    <div class="container mt-3">

        <div class="row">
            <div class="col-md-12">
               
                <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#incomeModal">
                    <i class="fa fa-plus"></i> Add Earning
                </button>

            </div>
            <hr>
            <br>

            <div class="col-md-12 mt-2">
                <?php
        if (isset($_GET["deleted"])) {
        ?>
                <p class="btn btn-success btn-block disabled mx-auto text-light " style="margin-left:20px;">Successfully
                    Deleted !</p>
                <?php
        }

        ?>
                <div class="card" style="opacity:94%;">
                    <div class="card-header bg-navy">
                        <h3 class="card-title">Daily Earnings Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        @if (count($incomes) == 0)
                            <h4 class="text-center text-danger"> No Earnings Available ! </h4>
                        @else
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Date</th>
                                        <th>Source</th>
                                        <th>Earned Amount</th>
                                        <th>Total Earning</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($incomes as $income)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $income->date }}</td>
                                            <td>{{ $income->source }}</td>
                                            <td>{{ $income->amount }}</td>
                                            <td>{{ $income->amount }}</td>

                                            <td>
                                                <button type="button" class="btn btn-sm btn-navy" data-toggle="modal"
                                                    data-target="#incomeModal" data-income-id="{{ $income->id }}"
                                                    data-income-amount="{{ $income->date }}"
                                                    data-income-amount="{{ $income->amount }}"
                                                    data-income-source="{{ $income->source }}">
                                                    {{-- <i class="fa fa-pen "> --}}
                                                </button>

                                                <a class="btn btn-sm bg-danger p-1" href="config/DeleteEarning.php?id= "><i
                                                        class="fa fa-trash "></i></a>


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
    @include('income.modal')




    {{-- start of scripts --}}
    {{-- @section('scripts') --}}
    <script>
        $(document).ready(function() {
            // Handle the "Edit" button to populate the modal
            $('#incomeModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var incomeId = button.data('income-id');
                var incomeDate = button.data('income-date');
                var incomeAmount = button.data('income-amount');
                var incomeSource = button.data('income-source');

                var modal = $(this);
                modal.find('.modal-title').text('Edit Income');
                modal.find('form').attr('action', '/income/' + incomeId);
                modal.find('form').append('<input name="_method" type="hidden" value="PUT">');
                modal.find('#date').val(incomeDate);
                modal.find('#amount').val(incomeAmount);
                modal.find('#source').val(incomeSource);
            });
        });
    </script>
    {{-- @endsection --}}
@endsection
