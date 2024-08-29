@extends('dashboard.template')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-12">
                <button type="button" class="btn btn-primary">Add Expenses</button>
            </div>
            <div class="col-xs-12 col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-inverse">
                            <tr>
                                <th>#</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Monthly Deadline</th>
                                <th>Final Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td scope="row"></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
