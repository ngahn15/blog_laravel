<div class="nav-side-menu">
    <div class="brand">Brand Logo</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  	<a href="#">
						<i class="fa fa-dashboard fa-lg"></i> Home
                  	</a>
                </li>

                <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                  <a href=""><i class="fa fa-gift fa-lg"></i> Posts <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li class="active"><a href="{{ asset('admin/post') }}">All Posts</a></li>
                    <li class="active"><a href="{{ asset('admin/post/public') }}">Public</a></li>
                    <li><a href="{{ asset('admin/post/unpublic') }}">Unpublic</a></li>
                </ul>


                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="{{ asset('admin/author') }}"><i class="fa fa-globe fa-lg"></i> Author <span class="arrow"></span></a>
                </li>  
                {{-- <ul class="sub-menu collapse" id="service">
                  <li>New Service 1</li>
                  <li>New Service 2</li>
                  <li>New Service 3</li>
                </ul> --}}


                {{-- <li data-toggle="collapse" data-target="#new" class="collapsed"> --}}
                <li class="collapsed">
                  <a href="{{ asset('admin/category') }}"><i class="fa fa-car fa-lg"></i> Category <span class="arrow"></span></a>
                </li>
                {{-- <ul class="sub-menu collapse" id="new">
                  <li>New New 1</li>
                  <li>New New 2</li>
                  <li>New New 3</li>
                </ul> --}}


                 {{-- <li>
                  <a href="#">
                  <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                  </li>

                 <li>
                  <a href="#">
                  <i class="fa fa-users fa-lg"></i> Users
                  </a>
                </li> --}}
            </ul>
     </div>
</div>