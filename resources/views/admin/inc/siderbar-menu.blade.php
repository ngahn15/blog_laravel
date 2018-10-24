<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li>
                <a href="{{ asset('admin/home') }}"><i class="fa fa-home"></i> Home</span></a>
            </li>
            <li><a><i class="fa fa-edit"></i> Post <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{ asset('admin/post') }}">All posts</a></li>
                  <li><a href="{{ asset('admin/post/public') }}">Public</a></li>
                  <li><a href="{{ asset('admin/post/public') }}">Un_public</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ asset('admin/author') }}"><i class="fa fa-desktop"></i>All Authors</span></a>
            </li>
            <li>
                <a href="{{ asset('admin/category') }}"><i class="fa fa-table"></i> Categories</span></a>
            </li>
        </ul>
    </div>

</div>
<!-- /sidebar menu -->