@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Venue') }} </li>
    </ol>
  </nav>

@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="ms-panel">
			<div class="ms-panel-header d-flex justify-content-between">
				<h6>{{ __('edit') }}</h6>
			</div>
			<div class="ms-panel-body col-md-6 col-md-offset-2">

				@if (count($errors) > 0)
				<div class="alert alert-danger">
				    <ul>
				        @foreach ($errors->all() as $error)
				        <li>{{ $error }}</li>
				        @endforeach
				    </ul>
				</div>
				@endif
</div>
<div class="col-md-12">  
<form action="{{route('venue.update',$venue->id)}}" method="POST"  >
                  <div class="ms-auth-container row">
                  {{ csrf_field() }}

@method('PUT')
<div class="col-md-8">
                          <div class="form-group">
                            <label>Countries</label>
                            <div class="input-group">
                            <select name="country_id" id="" class="form-control" require>
                            <option value="">{{$venue->country->country_en_name ?? 'select'}}</option>
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
                              <input type="text"  name="venue_en_name" value="{{$venue->venue_en_name}}" class="form-control" placeholder="venue name">
                            </div>
                          </div>
                         </div>
                    
                         
                       
                          
                           
                    </div>
                    <div class="input-group d-flex justify-content-end text-center">
                    <a  href="{{route('venue.index')}}"  class="btn btn-dark mx-2" >Cancel</a>
                      <input type="submit" value="Add" class="btn btn-success ">
                    </div>
   </form>
   
   </div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
@endsection