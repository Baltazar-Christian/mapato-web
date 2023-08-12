
{{-- All Earnings Page --}}
@extends('layouts.master')

@section('content')

@endsection  <div class="container mt-3">

    <div class="row">
      <div class="col-md-12">
        <a href="AddEarning.php" class="btn btn-danger float-right"><i class="fa fa-plus"></i> Add Earning</a>
      </div>
      <hr>
      <br>

      <div class="col-md-12 mt-2">
        <?php
        if (isset($_GET["deleted"])) {
        ?>
          <p class="btn btn-success btn-block disabled mx-auto text-light " style="margin-left:20px;">Successfully Deleted !</p>
        <?php
        }

        ?>
        <div class="card" style="opacity:94%;">
          <div class="card-header bg-navy">
            <h3 class="card-title">Daily Earnings Table</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
           

         
              <h4 class="text-center text-danger"> No Earnings Available ! </h4>

       
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>SN</th>
                    <th>Date</th>
                    <th>Source</th>
                    <th>Earned Amount</th>
                    <th>Total Earning</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>
                      
                      <td>
                     
                      </td>
                      <td>
                        
                      </td>
                      <td>
                       
                      </td>
                      <td>
                    

                      </td>
                      <td>
                        <div class="text-center">
                          <a class="btn btn-sm bg-navy p-1" href="EditEarning.php?id"><i class="fa fa-pen "></i></a>
                          <a class="btn btn-sm bg-danger p-1" href="config/DeleteEarning.php?id=
                          "><i class="fa fa-trash "></i></a>
                        </div>
                      </td>
                    </tr>
              
                </tbody>

              </table>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>



  </div>
