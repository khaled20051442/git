@extends('admin.adminLayout.main')
@section('crumb')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i class="material-icons"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Clients Messages</li>
          </ol>
        </nav>
        @endsection


        @section('content')


    
    
        <div class="row">

            <div class="col-md-12">
    
    
    
              <div class="ms-panel">
                <div class="ms-panel-header d-flex justify-content-between">
                  <h6>Clients Messages</h6>
                  
                </div>
			  	<div class="ms-panel-body">
			  		<div class="table-responsive">
			  			<table id="testimonials" class="dattable table table-striped thead-dark  w-100">
			  				<thead>
			  				<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Subject </th>
							<th>Message</th>
							<th>Message Date</th>
							<th>Action</th>
							  </tr>
			  				</thead>
			  				<tbody>
                              @foreach($rows as $index=> $row)
                              
			  					<tr>
			  						<td> {{$row->sender_name}} </td>
			  						<td><p>{{$row->sender_email}}</p></td>
									<td><p>{{$row->sender_subject}}</p></td>
			  						<td><p>{{$row->sender_message}}</p></td>
			  						<td>{{$row->created_at}}</td>
			  						<td>
									    <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addSubCat{{$row->id}}"> View Msg </a>
                                        <a href="#" onclick="destroy('this Message','{{$row->id}}')" class="btn d-inline-block btn-danger">delete</a>
                       <form  id="delete_{{$row->id}}"  action="{{route('clinetMessage.destroy',$row->id)}}" method="post" style="display:none"  >
                       @csrf
                       @method('DELETE')
                       <button type="submit"></button>
                       </form>
			  						</td>
			  					</tr>


      <!-- View Messages -->
      <div class="modal fade" id="addSubCat{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="addSubCat">
        <div class="modal-dialog modal-lg " role="document">
          <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
             
            </button>
            <h3>View Messages</h3>
            <div class="modal-body">
    
             
              <div class="ms-auth-container row no-gutters">
                <div class="col-12 p-3">
                  <form action="">
                    <div class="ms-auth-container row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label>Message</label>
                              <div class="input-group">
                               <textarea name="" id=""  rows="7" class="form-control"style="text-align:left">{{$row->sender_message}}
							   </textarea>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="input-group d-flex justify-content-end text-center">
                        <input type="button" value="Close" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                      </div>
     </form>
          </div>
        </div>
      </div>

    </div>
  </div>
  </div>
  <!-- /Add Sub Modal -->
                                  
                                  @endforeach
			  				</tbody>
			  			</table>
			  		</div>
			  	</div>
              </div>
    
    
    
    
            </div>
    
          </div>
        </div>

        @endsection
