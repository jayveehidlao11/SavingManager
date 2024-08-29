@extends("dashboard.template")
@section("content")
<div class="row">
    <div class="col-lg-6  col-ms-12 col-sm-12 col-xs-12 col-xl-6">
        <div class="table-responsive">
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Monthly Deadline</th>
                        <th>Final Date</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-6  col-ms-12 col-sm-12 col-xs-12 col-xl-6">

        <div class="row">
            <div class="col-xs-6 col-lg-6 col-sm-6 col-md-6 col-xl-6">

            </div>
            <div class="col-xs-6 col-lg-6 col-sm-6 col-md-6 col-xl-6">

            </div>
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 ">
                <canvas id="monthlyExpenses" class="form-control"></canvas>
            </div>
        </div>



    </div>
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 col-xl-12"><br>
        <canvas id="perWeekExpenses" class="form-control"></canvas>
    </div>

</div>
@endsection