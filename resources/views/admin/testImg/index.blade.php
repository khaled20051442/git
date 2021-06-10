@extends('admin.adminLayout.main')
@section('crumb')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i class="material-icons"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Image Gallery</li>
          </ol>
        </nav>
        @endsection


        @section('content')


        <div class="row">

          <div class="col-md-12">
  
  
  
            <div class="ms-panel">
              <div class="ms-panel-header d-flex justify-content-between">
                <h6>Image Gallery</h6>
                <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addclient"> add new </a>
              </div>
              <div class="ms-panel-body">
                <div class="table-responsive">
                  <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                    <thead>
                      <th>#</th>
                      
                      <th>Image </th>
                      <th>Order</th>
                      <th>Active</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($rows as $row) 
                      <tr>
					  	<td>{{$row -> id}}</td>
                        <td><img src="{{ asset('uploads/testimg')}}/{{$row -> image_path}}" alt=""></td>
                        
                        
                        <td><p>{{$row -> order}}</p></td>
                        <td>
                        @if($row->active ==1)
                        <i class="fas fa-check"></i>
                        @else
                            <i class="fas fa-times"></i>
                        @endif
                        </td>

                        <td>
                          <a href="#" class="btn btn-info d-inline-block" data-toggle="modal"data-target="#editclient{{$row->id}}">edit</a>
                        <a href="#" onclick="delette('img')" class="btn d-inline-block btn-danger">delete</a>
                        </td>
                      </tr>

                       <!-- Edit Image Modal -->
   <div class="modal fade" id="editclient{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="editclient">
    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content">
        <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
         
        </button>
        <h3>Edit Image</h3>
      
        <div class="modal-body">

         
          <div class="ms-auth-container row no-gutters">
            <div class="col-12 p-3">
            <form action="{{route('testImg.update',$row->id)}}" method='post' enctype="multipart/form-data" >
                @csrf
                @method('PUT')


                <div class="ms-auth-container row">
                    <div class="col-md-3">
                        <div class="form-group">
                          <div class="img-upload">
                            <img src="{{ asset('uploads/testimg')}}/{{$row -> image_path}}" alt="">



                            <div class="upload-icon">
                              <input type="file" name="pic" class="upload">
                              <i class="fas fa-camera    "></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Order</label>
                      <div class="input-group">
                        <input type="number" id="newOrder" class="form-control" value="{{$row -> order}}">
                      </div>
                    </div> </div>
                   
               
                  <div class="col-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="client" name="client"
                      @if($row->active)  checked @endif >
               <label for="category">active</label>
             </div>
                          
                   
                  
                         
                        </div>
                  </div>
                  <div class="input-group d-flex justify-content-end text-center">
                    <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                    <input type="submit" value="Add" class="btn btn-success ">
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
    
      </main>
    
    <!--  Setup  -->
    <!-- Add Img Modal -->
    <div class="modal fade" id="addclient" tabindex="-1" role="dialog" aria-labelledby="addclient">
      <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
          <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
           
          </button>
          <h3>Add Image</h3>
        
          <div class="modal-body">
  
           
            <div class="ms-auth-container row no-gutters">
              <div class="col-12 p-3">
                <form action="{{route('testImg.store')}}" method='post' enctype="multipart/form-data" >
                @csrf


                  <div class="ms-auth-container row">
                      <div class="col-md-3">
                          <div class="form-group">
                            <div class="img-upload">
                              <img src="{{asset('adminasset/img/default-user.gif')}}" alt="">

                              
                              <div class="upload-icon">
                                <input type="file" name="pic" class="upload">
                                <i class="fas fa-camera    "></i>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Image</label>
						  	<div class="form-group">




						  		<div class="upload-icon">


						  			<label>Order</label>
						  		</div>

						  		<div class="input-group">
						  			<input name="order" type="number" class="form-control" placeholder="Order" >
						  		</div>
						  	</div>
                            <!--<div class="input-group">
                              <input type="text" id="newClient" class="form-control" placeholder="client">
                            </div>-->
                          </div> </div>
                         
                     
                        <div class="col-12">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="client" name="client"
                            checked>
                     <label for="category">active</label>
                   </div>
                           
                          </div>
                    </div>
                    <div class="input-group d-flex justify-content-end text-center">
                      <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                      <input type="submit" value="Add" class="btn btn-success ">
                    </div>
   </form>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
<!-- /Add Sub Modal -->
  



        @endsection('content')