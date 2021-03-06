@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Venues') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">

<div class="col-md-12">



  <div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
    <h6>Venues</h6>
        <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addnumber"> add Venue</a>
    </div>
    <div class="ms-panel-body">
      <div class="table-responsive">
        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
          <thead>
            <th>#</th>
            <th>Country</th>
            <th>Name</th>
        
            <th>Action</th>
          </thead>
          <tbody>
@foreach($venues as $index => $venue)
            <tr>
            <td>{{$index+1}}</td>
            <td>{{$venue->country->country_en_name ?? ''}}</td>
              <td>{{$venue->venue_en_name}}</td>
              
          
              
              <td>
                <a href="{{ route('venue.edit', $venue->id) }}" class="btn btn-info d-inline-block" 
                >edit</a>
              <a href="#" onclick="destroy('this venue','{{$venue->id}}')" class="btn d-inline-block btn-danger">delete</a>
              <form id="delete_{{$venue->id}}" action="{{ route('venue.destroy', $venue->id) }}"  method="POST" style="display: none;">
									@csrf
									@method('DELETE')
									<button type="submit" value=""></button>
									</form>
              </td>
            </tr>

           @endforeach

          </tbody>
        </table>
        </div>
    </div>
  </div>




</div>

</div>

   <!-- Add SubCat Modal -->
   <div class="modal fade" id="addnumber" tabindex="-1" role="dialog" aria-labelledby="addnumber">
      <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
          <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
           
          </button>
          <h3>Add venue</h3>
        
          <div class="modal-body">
  
           
            <div class="ms-auth-container row no-gutters">
              <div class="col-12 p-3">
              @if (count($errors) > 0)
				<div class="alert alert-danger">
				    <ul>
				        @foreach ($errors->all() as $error)
				        <li>{{ $error }}</li>
				        @endforeach
				    </ul>
				</div>
				@endif
                <form action="{{route('venue.store')}}" method="POST"  >
                  <div class="ms-auth-container row">
                  {{ csrf_field() }}

                  <div class="col-md-8">
                          <div class="form-group">
                            <label>Countries</label>
                            <div class="input-group">
                            <select name="country_id" id="" class="form-control" require>
                            <option value="">select</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->country_en_name}}</option>
                            @endforeach
                            </select>
                            </div>
                          </div>
                         </div>
                    
                        <div class="col-md-8">
                          <div class="form-group">
                            <label>Name</label>
                            <div class="input-group">
                              <input type="text" id="newcountry" name="venue_en_name" class="form-control" placeholder="country name">
                            </div>
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


@endsection
@section('scripts')

@endsection