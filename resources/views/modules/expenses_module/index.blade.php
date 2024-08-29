@extends('dashboard.template')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">Add Expenses</button>
            </div>
            <div class="col-xs-12 col-lg-12"><br>
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
                           
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
 
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Expenses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
