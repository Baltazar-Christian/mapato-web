@extends('layouts.master')

@section('content')
<div class="mx-2 p-2 mt-2 bg-light" style="height:75vh;">
<h4 class="text-navy"><i class="fa fa-user-tie text-danger"></i> Welcome, {{ Auth::user()->name}}

</h4>
<hr class="bg-light">
   <!-- Home Dashboard -->
    <div class="row">
       
    
      
              <!-- Small boxes (Stat box) -->
            <!-- Earnings  -->
                <div class="col-md-3 text-center ">
                  <!-- small box -->
                  <div class="card bg-success">
                    <div class="inner">
                        <br>
                      <h3> TSH</h3>
      
                      <p>Total Earnings</p>
                    </div>
                 
                    
                    <a href="earnings.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
          
              
                <div class="col-md-3 text-center ">
                    <!-- small box -->
                    <div class="card bg-warning">
                      <div class="inner">
                        <br>
                      <h3>TSH</h3>
        
                        <p>Total Savings</p>
                      </div>
                   
                      <a href="savings.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
            
                  <div class="col-md-3 text-center ">
                    <!-- small box -->
                    <div class="card bg-orange">
                      <div class="inner">
                        <br>
                      <h3>TSH</h3>
        
                        <p>Total Expenses</p>
                      </div>
                   
                      <a href="expenses.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->

                  <div class="col-md-3 text-center ">
                    <!-- small box -->
                    <div class="card bg-danger">
                      <div class="inner">
                      <br>
                      <h3> TSH</h3>
                        <p>Total Debts</p>
                      </div>
                    
                      <a href="debts.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
            

            

    </div>
</div>
@endsection