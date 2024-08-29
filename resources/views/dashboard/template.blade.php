<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($description) ? $description : 'Dashboard'}}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="{{ asset('css/template.css') }}">
</head>

<body>
    @php
     
    @endphp
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function(){
            
            $(".navbar-nav > li").on('click',()=>{
                $(this).find(".active").removeClass('active');
                $(this).find('nav-item').addClass('active');
            })
            $.ajax({
                url:"{{ url('navigators')}}",
                type:"get",
                data:{},
                success:function(data){
                    $(".navigator-div").html(data);
                }
            })
        })  
    </script>  
    <div class="navigator-div"></div> 
    <div class="container-fluid p-2 ">
        <div class="card">
            <div class="card-header text-center bg-transparent ">
           
            </div>
            <div class="card-body">
                <div class="row ">
                    <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12 co-xl-12 text-center">
                        <h4>    {{ isset($description) ? $description : 'Dashboard'}} </h4>
                    </div>
                    <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12 co-xl-12">
                        @yield('content')
                    </div>
                </div>
              
            </div>
            <div class="card-footer text-muted text-center">
                Develop by : Jayvee O. Hidlao
              </div> 
        </div>
    </div>
   
 
