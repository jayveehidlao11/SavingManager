@extends('dashboard.template')
@section('content')
    @php
        $paymentListOption = $options['paymentTypes'];

    @endphp
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-lg-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">Add Expenses</button>
            </div>
            <div class="col-xs-12 col-lg-12"><br>
                <div class="table-responsive">
                    <div class="expensesDisplayHere"></div>
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
                    <form id="expensesForm" autocomplete="false" method="POST" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" name="expDesc" id="expDesc" class="form-control"
                                placeholder="Expenses Description">

                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="">Amount</label>
                                    <input type="text" name="expAmount" id="expAmount" class="form-control"
                                        placeholder="Expenses Amount">
                                </div>
                                <div class="col">
                                    <label for=""> Payment Type</label>
                                    {!! Form::select('expPaymentType', $paymentListOption, null, ['class' => 'form-control expPaymentType']) !!}
                                </div>
                                <div class="col">
                                    <label for="">Final Deadline</label>
                                    <input type="text" class="form-control expDeadline" name="expDeadline"
                                        placeholder="mm-dd-yyyy">
                                </div>
                            </div>


                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary form-control saveExpenses">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('css/assets/bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.min.js') }} " rel="stylesheet">
    </script>
    <script src="{{ url('css/assets/bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.js') }}" rel="stylesheet">
    </script>
    <script src="{{ asset('js/validation.js') }}"></script>
    <script src="{{ asset('js/callAjax.js') }}"></script>
    <script>
        var datepicker = $.fn.datepicker.noConflict();
        $.fn.datepicker.defaults.format = "mm/dd/yyyy";
        $(' .expDeadline').datepicker({
            format: 'mm/dd/yyyy',
        });
        $(function() {
            displayExpenses()
            $("[name=expAmount]").on('keypress', numbersOnly);

            $(".saveExpenses").on('click', () => {
                var form_data = $("#expensesForm").serialize();
                // form_data.push({ "_token": "{{ csrf_token() }}"})
                $.ajax({
                    url: "{{ route('newExpenses') }}",
                    type: "POST",
                    data: form_data,
                    dataType: "JSON",
                    success: function(data) {
                        bootbox.alert(data.message);
                        displayExpenses();
                        $("#expensesForm")[0].reset();
                    }
                })

            })



        })

        function processExpenses(data) {
            var id = $(data).data('id');
           
                bootbox.confirm({
                    message: "Are you sure you want to continue?",
                    callback: function(result) {
                        /* result is a boolean; true = OK, false = Cancel*/
                        if (result) {
                            callAJAX({
                                url: "{{ route('processExistingExpenses') }}",
                                data: {
                                    id: id,
                                    process: 2
                                },
                                type: "POST",
                                returnValue: function(data) {
                                    return displayExpenses();
                                },
                                bbType: "alert",
                                bbmsg: ""

                            });

                        }
                    }
                });


        }

        function displayExpenses() {
            $.ajax({
                url: "{{ url('expenses/showExpenses') }}",
                data: {},
                type: "GET",
                success: function(data) {

                    $(".expensesDisplayHere").html(data);
                },
                error: function(err) {
                    console.log(err);


                }
            })
        }

        function editExpenses(data) {
            var id = $(data).data('id');
           
            callAJAX( {
                url: "{{ route('editExpenses') }}",
                data: {
                    id: id,
                },
                type: "POST",
                returnValue: function(data) {
                    return window.location.href = data;
                },
                bbType: "",
                bbmsg: ""

            }, false);
        }
    </script>
@endsection
