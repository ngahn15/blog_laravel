<div class="main_container">
	<div class="col-md-3 left_col">
	  	<div class="left_col scroll-view">
	    	<div class="navbar nav_title" style="border: 0;">
	      		<a href="{{ asset('admin/home') }}" class="site_title"><i class="fa fa-paw"></i> <span>
					{{ Auth::guard('admin')->user()->name }}
	      		</span></a>
	    	</div>

    		<div class="clearfix"></div>
    		
			<!-- menu profile quick info -->
			<div class="profile clearfix">
			  	<div class="profile_pic">
			    	<img src="{{ asset('admin/images/img.jpg') }}" alt="..." class="img-circle profile_img">
			  	</div>
			  	<div class="profile_info">
			    	<span>Welcome,</span>
			    	<h2>John Doe</h2>
			  	</div>
			</div>
			<br />

			@include('admin.inc.siderbar-menu')

            @include('admin.inc.menu-footer')
        </div>
    </div>