<style>
    /* Additional CSS for hover effect */
    .nav-item.dropdown:hover .dropdown-menu {
        display: block;
    }
 
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">E<sub>xpenses</sub> S<sub>savings</sub> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            @foreach ($nav as $navs)
                <li class="nav-item " >
                    <a class="nav-link" href="{{ url($navs->link) }}" data-link="{{ $navs->link }}" >{{ $navs->Description }}</a>
                </li>
            @endforeach

            {{-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li> --}}
        </ul>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function() {
      var link =  $('a').find('.nav-link').data('link')
      const currentLink = window.location.pathname;
      
     

        $("a").on('click', () => {
           $(this).find('.nav-link').removeClass('active')
          $(this).find('.nav-link').addClass('active')
            
            
        })
    })
</script>
