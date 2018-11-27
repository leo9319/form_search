<nav class="navbar navbar-default navbar-fixed-top">
   <div class="brand">
      <a href="#"><img src="{{ asset('img/GIC-Logo.png') }}" alt="GIC Logo" class="img-responsive logo"></a>
   </div>
   <div class="container-fluid">
      <div class="navbar-btn">
         <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
      </div>
      <div class="navbar-btn navbar-btn-right">
      </div>
      <div id="navbar-menu">
         <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">

               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('img/user.png') }}" class="img-circle" alt="Avatar"> <span>{{ Auth::user()->name }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
               <ul class="dropdown-menu">
                  <li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                  <li>
                     <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                     </form>
                  </li>
               </ul>
            </li>
         </ul>
      </div>
   </div>
</nav>