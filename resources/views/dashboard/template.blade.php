<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($description) ? $description : 'Dashboard' }}</title>
    <link rel="stylesheet" href="{{ URL::asset('css/assets/bootstrap-datepicker-1.9.0-dist/css/bootstrap-datepicker.css')}}">
    {{-- <link rel="stylesheet" href="./css/assets/bootstrap-datepicker-1.9.0-dist/css/bootstrap-datepicker.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">

   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"> </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/assets/bootbox.min.js')}}"></script>
  
    {{-- icons --}}

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ URL::asset('js/charts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  
    <script>
       
        $(document).ready(function(){
        
            const weeklist = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturady', 'Sunday']
            const months = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];
            // for weekly expenses
            graphChart(weeklist, 'perWeekExpenses', 'This Week Expenses', [100, 200, 500, 700, 900, 1200, 1500,
                1700, 2000
            ])
            // for monthly expenses
            graphChart(months, 'monthlyExpenses', 'This Week Expenses', [100, 200, 500, 700, 900, 1200, 1500,
                1700, 2000
            ])
            $.ajax({
                url: "{{ url('navigators') }}",
                type: "get",
                data: {},
                success: function(data) {
                    $(".navigator-div").html(data);
                }
            })
        })
    </script>
    <div class="navigator-div"></div>
    <div class="container-fluid p-2 ">
        <div class="row ">
            <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12 col-xl-12">
                <div class="card " style="background-color: white">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>


            </div>
        </div>
    </div>
