@extends('admin.adminLayout.main')
@section('crumb')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i class="material-icons"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Course Applicant</li>
          </ol>
        </nav>
        @endsection


        @section('content')
        <div class="row">

<div class="col-md-12">



  <div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
      <h6>Courses Applicants</h6>
    </div>
    <div class="ms-panel-body">
      <div class="table-responsive">
          <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Full Name</th>
                      <th>Course Name</th>
                      <th>Register Type</th>
                      <th>Register Date</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
              @foreach($rows as $index=> $row)
                  <tr>
                      <td><p>{{$index+1}}</p></td>
                      <td><p>{{$row->name}}</p></td>
                      <td><p>{{$row->courses->course_en_name ?? ''}}</p></td>
                      <td><p> @if($row->applicant_type_id ==0)Quick Enquery @else Register Cource  @endif</p></td>
                      <td><p>{{$row->created_at}}</p></td>

                      <td>
                          <a href="#" class="btn btn-dark d-inline-block" data-toggle="modal"data-target="#editclient{{$row->id}}">View</a>
                          
                          <a href="#" onclick="destroy('this Applicant','{{$row->id}}')" class="btn d-inline-block btn-danger">delete</a>
                       <form  id="delete_{{$row->id}}"  action="{{route('applCourse.destroy',$row->id)}}" method="post" style="display:none"  >
                       @csrf
                       @method('DELETE')
                       <button type="submit"></button>
                       </form>
                      </td>
                  </tr>

                  
  <!-- View Expertise Modal -->
  <div class="modal fade" id="editclient{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="editclient">
    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content">
        <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
         
        </button>
        <h3>View Courses Applicants {{$row->name}}</h3>
        <div class="modal-body">
          <div class="ms-auth-container row no-gutters">
            <div class="col-12 p-3">
              <form action="">
                <div class="ms-auth-container row">
					<div class="col-md-12">
						<h3>Course Data</h3>

					</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="exampleInputPassword1" for="exampleCheck1">Full Name </label>
								<input type="text" id="newjob-name" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="exampleInputPassword1" for="exampleCheck1">Course Name</label>
								<input type="text" class="form-control" value={{$row->courses->course_en_name ?? ''}} >
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="exampleInputPassword1" for="exampleCheck1">Register Type</label>
								<input type="text" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="exampleInputPassword1" for="exampleCheck1">Register date</label>
								<input type="text" id="newjob-title" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="exampleInputPassword1" for="exampleCheck1">Country</label>
								<input type="number" id="newClint" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="exampleInputPassword1" for="exampleCheck1">City</label>
								<input type="text" class="form-control">
							</div>
						</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="exampleInputPassword1" for="exampleCheck1">Job Title</label>
							<input type="text" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="example2">Address</label>
							<div class="form-group">
								<textarea class="" name="example2" rows="3" style="width:100%"></textarea>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="exampleInputPassword1" for="exampleCheck1">Company</label>
							<input type="text" id="newjob-title" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="exampleInputPassword1" for="exampleCheck1">Phone</label>
							<input type="number" id="newClint" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="exampleInputPassword1" for="exampleCheck1">Fax</label>
							<input type="text" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="exampleInputPassword1" for="exampleCheck1">Email</label>
							<input type="text" class="form-control">
						</div>
					</div>


					<div class="col-md-12">
						<h3>In house enquery title</h3>

					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="example2">Enquery Message</label>
							<div class="form-group">
								<textarea class="" name="example2" rows="3" style="width:100%"></textarea>
							</div>
						</div>
					</div>


					<div class="col-md-12">
						<h3>In house enquery title</h3>
					</div>

					<div class="col-md-12">
						<div class="row">
						<div class="col-md-6">
							<div class="col-md-12">
								<div class="form-group">
									<label class="exampleInputPassword1" for="exampleCheck1">No Days</label>
									<input type="text" class="form-control">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="exampleInputPassword1" for="exampleCheck1">No Participants</label>
									<input type="text" class="form-control">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="exampleInputPassword1" for="exampleCheck1">Preferred Dates</label>
									<input type="text" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="col-md-12">
								<div class="form-group">
									<label for="example2">Inhouse Requirements</label>
									<div class="form-group">
										<textarea class="" name="example2" rows="10" style="width:100%"></textarea>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
					


                  </div>




                  <div class="input-group d-flex justify-content-end text-center">
                    <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                  
                  </div>
 </form>
      </div>
    </div>
  </div>

</div>
</div>
</div>
      

@endforeach
              </tbody>
          </table>
      </div>
    </div>
  </div>




</div>

</div>
</div>

      <!--  Setup  -->
        @endsection
		