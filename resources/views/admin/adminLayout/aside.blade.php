 <!-- Sidebar Navigation Left -->
 <aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">

<!-- Logo -->
<div class="logo-sn ms-d-block-lg">
  <a class="pl-0 ml-0 text-center" href="{{url('admin')}}"> <img src="{{ asset('adminasset/img/logo/100.jpg')}}" alt="logo"> </a>
</div>

<!-- Navigation -->
<ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
    <!-- Home -->
    <li class="menu-item ">
        <a class=" active" href="{{url('admin')}}">
            <span><i class="material-icons fs-16">home</i>Home </span>
        </a>
       
    </li>
    <!-- /Home -->
     <!-- Setup  -->
     <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#create" aria-expanded="false" aria-controls="tables">
        <span><i class="material-icons fs-16">build</i>Setup</span>
      </a>
      <ul id="create" class="collapse" aria-labelledby="tables" data-parent="#side-nav-accordion">
     
        <li> <a href="#">Sub Categories</a> </li>
        <li> <a href="{{route('courses.index')}}">Courses</a> </li>
        <li> <a href="#">Rounds</a> </li>

					<li> <a href="#">BTS Numbers</a> </li>
					<li> <a href="#">Branches </a> </li>
		<li> <a href="#">Trainers </a> </li>
		<li> <a href="#">Year Calendars </a> </li>
				</ul>
			</li>
			<!--  Setup  -->
			<!-- Testimonials  -->
			<li class="menu-item">
				<a href="#" class="has-chevron" data-toggle="collapse" data-target="#basic-elements" aria-expanded="false" aria-controls="basic-elements">
					<span><i class="material-icons fs-16">assignment</i>Testimonials</span>
				</a>
				 <ul id="basic-elements" class="collapse" aria-labelledby="tables" data-parent="#side-nav-accordion">
					<li> <a  href="{{route('testmonile.index')}}">Testimonials page</a> </li>
					<li> <a href="{{route('testImg.index')}}">Image Gallery</a> </li>
				</ul>
				
			</li>
			<!--  Testimonials  -->
			<!-- Clients  -->
			<li class="menu-item">
				<a href="#" class="has-chevron" data-toggle="collapse" data-target="#contactsdropdown" aria-expanded="false" aria-controls="contactsdropdown">
					<span><i class="material-icons fs-16">assignment</i>Clients</span>
				</a>
					  <ul id="contactsdropdown" class="collapse" aria-labelledby="tables" data-parent="#side-nav-accordion">
			

					<li> <a href="{{route('applCourse.index')}}">Courses Applicants</a> </li>
					<li> <a href="#">Rounds Applicants</a> </li>
					<li> <a href="#">Email NewsLetter</a> </li>
					<li> <a href="{{route('clinetMessage.index')}}">Clients Messages</a> </li>
					
				</ul>
			</li>
			<!--  Clients  -->
			<!-- Speakers  -->
			<li class="menu-item">
				<a href="#" class="has-chevron" data-toggle="collapse" data-target="#contactsdropdownn" aria-expanded="false" aria-controls="contactsdropdown">
					<span><i class="material-icons fs-16">assignment</i>Speakers</span>
				</a>
				<ul id="contactsdropdownn" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
					<li> <a href="#" class="">Expertise</a> </li>
					<li> <a href="#">Training Course</a> </li>
					<li> <a href="#">Applicants page</a> </li>
				</ul>
			</li>
			<!--  Speakers  -->
			<!-- Careers  -->
			<li class="menu-item">
				<a href="#" class="has-chevron" data-toggle="collapse" data-target="#contactsdrop" aria-expanded="false" aria-controls="contactsdropdown">
					<span><i class="material-icons fs-16">assignment</i>Careers</span>
				</a>
				<ul id="contactsdrop" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
					<li> <a href="#">Available Jobs</a> </li>
					<li> <a href="#">Jobs Applicants</a> </li>
				</ul>
			</li>
			 <!-- Setup  -->
			 <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#createLook" aria-expanded="false" aria-controls="tables">
        <span><i class="material-icons fs-16">build</i>Lookups</span>
      </a>
      <ul id="createLook" class="collapse" aria-labelledby="tables" data-parent="#side-nav-accordion">
        <li> <a href="{{route('country.index')}}">Country</a> </li>
        <li> <a href="{{route('venue.index')}}">Venue</a> </li>
        <li> <a href="{{route('client.index')}}">Clients</a> </li>
        <li> <a href="#">Partners</a> </li>
		
				</ul>
			</li>
			<!--  Setup  -->
  
</ul>


</aside>