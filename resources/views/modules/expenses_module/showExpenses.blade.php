@extends('dashboard.template')
@section('content')
    <style>
        #monthlyPaymentsTable td {
            border: none;
        }
    </style>
    @php
        $paymentListOption = $options['paymentTypes'];

    @endphp
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 ">
                <div class="card text-white bg-warning">
                    <img class="card-img-top" alt="">
                    <div class="card-body">
                        <h4 class="card-title text-center">Expenses Info</h4>
                        <form id="existingExpenses">
                            @csrf
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" name="expensesDesc" class="form-control" placeholder="Description"
                                    value="{{ isset($expensesInfo) ? $expensesInfo['description'] : '' }}">

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Amount</label>
                                        <input type="text" name="expensesAmt" class="form-control" placeholder="Amount"
                                            value="{{ isset($expensesInfo) ? $expensesInfo['amount'] : '' }}">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Final Date</label>
                                <input type="text" placeholder="mm-dd-yyyy" name="expensesFinalDate" class="form-control"
                                    value="{{ isset($expensesInfo) ? date('Y-m-d', strtotime($expensesInfo['FinalDeadline'])) : date('Y-m-d') }}">

                            </div>
                       
                          
                            <div class="form-group">
                                <label for="">Payment Type</label>
                                {!! Form::select('expPaymentType', $paymentListOption, isset($expensesInfo->paymentMode) ? $expensesInfo->paymentMode->id : null , ['class' => 'form-control expPaymentType']) !!}

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 ">
                <div class="card text-white bg-primary">
                    <img class="card-img-top" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Monthly Payments</h4>
                        <div class="table-responsive">
                            <table class="table table-borderless " id="monthlyPaymentsTable">
                                <thead>
                                    @php
                                        $dateList = json_decode($expensesInfo->getDateRanges->datesListRange);

                                    @endphp
                                    @foreach ($dateList as $yk => $year)
                                        <tr class="text-center">
                                            <th colspan="4">{{ $yk }}</th>
                                        </tr>
                                        @foreach ($year as $month => $dates)
                                            <tr>
                                                <td>{{ date('F d Y', strtotime($dates)) }}</td>
                                                <td>-</td>
                                                <td> <small>PAYMENT STATUS HERE </small></td>
                                            </tr>
                                        @endforeach
                                    @endforeach



                                </thead>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 ">
                <div class="card text-white bg-info">
                    <img class="card-img-top" alt="">
                    <div class="card-body">
                        <h4 class="card-title">ACTIONS</h4>

                        <div class="form-group">
                            <label for=""> &nbsp; </label>
                            <a class="btn btn-success form-control" href="{{ url('/expenses') }}"> RETURN </a>
                        </div>
                        <div class="form-group">
                            <label for=""> &nbsp; </label>
                            <button type="button" class="btn btn-danger form-control" data-process="2"
                                onclick="processExpenses(this)" data-id="{{ $decryptedData->id }}"> DELETE EXPENSES</button>
                        </div>

                        <div class="form-group">
                            <label for=""> &nbsp; </label>
                            <button type="button" class="btn btn-warning form-control" data-process="1"
                                onclick="processExpenses(this)" data-id="{{ $decryptedData->id }}"> SAVE </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('js/callAjax.js') }}"></script>
    <script src="{{ url('css/assets/bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.min.js') }} " rel="stylesheet">
    </script>
    <script src="{{ url('css/assets/bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.js') }}" rel="stylesheet">
    </script>
    <script src="{{ asset('js/validation.js') }}"></script>
    <script>
        var datepicker = $.fn.datepicker.noConflict();
        $.fn.datepicker.defaults.format = "mm/dd/yyyy";
        $('[name=expensesFinalDate]').datepicker({
            format: 'mm/dd/yyyy',
        });

        $("[name=expensesAmt]").on('keypress', numbersOnly);

        function processExpenses(data) {

           
            set_csrf_token();
            var process = $(data).data('process')
            var form = $("#existingExpenses").serialize();

            if (process == 2) {
                bootbox.confirm({
                    message: "Are you sure you want to continue?",
                    callback: function(result) {

                        if (result) {
                            ajaxRequest(data, form);
                        }
                    }
                });
            } else {
                ajaxRequest(data, form);
            }

        }

        function ajaxRequest(data, form) {

            var process = $(data).data('process')
            var id = $(data).data('id')
            $.ajax({
                url: "{{ url('expenses/processExpenses') }}",
                data: {
                    process: process,
                    id: id,
                    form: form
                },
                type: "POST",
                success: function(data) {
                    if (process == 2) {
                        bootbox.alert({
                            title: data.message,
                            message: 'Click ok to return from the main page.',
                            closeButton: false,
                            callback: function() {
                                window.location.href = "{{ url('/expenses') }}";

                            }
                        });
                    } else {
                        bootbox.alert({
                            message: data.message,
                            closeButton: false,
                            callback: function() {
                                location.reload()

                            }
                        });

                    }

                },
                error: function(err) {
                    console.log(err);

                }
            })
        }
    </script>
@endsection
