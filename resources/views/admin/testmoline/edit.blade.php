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
        <div class="col-12 p-3">
      <form action="{{route('testmonile.update', $row->id)}}" method='post'>
      @csrf
      @method('PUT')
        <div class="ms-auth-container row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Name</label>
                  <div class="input-group">
                    <input name="reviewer_name" value="{{$row->reviewer_name}}" type="text" id="newTes" class="form-control" placeholder="name">
                  </div>
                </div> </div>
        
                  
            
            
            <div class="col-md-12">
                <div class="form-group">
                  <label>Feed Back</label>
                  <div class="input-group">
                   <textarea name="reviewer_text" id="" rows="4" class="form-control" placeholder="Feed Back">{{$row->reviewer_text}}</textarea>
                  </div>
                </div>
              </div>

              <div class="col-md-12" style=" opacity: 0.5;">
                  <div class="form-group">
                      <label>* your old rate</label>
                      @foreach(range(1,5) as $i)
									<div class="review-rating pull-right" style="display: inline-block;">
									@if($row->reviewer_star_rate >=$i )
										<i class="fas fa-star"></i>
										@else
										<i class="fas fa-star empty" ></i>
										@endif
										
									</div>
                 
                  
									@endforeach
                  </div>
              </div>


            <div class="col-md-12">
                <div class="form-group">
                    <label>* Rate</label>
                    <div class="stars" >
										<input type="radio" id="star5" name="rating" value="5"><label for="star5"></label>
										<input type="radio" id="star4" name="rating" value="4"><label for="star4"></label>
										<input type="radio" id="star3" name="rating" value="3"><label for="star3"></label>
										<input type="radio" id="star2" name="rating" value="2"><label for="star2"></label>
										<input type="radio" id="star1" name="rating" value="1"><label for="star1"></label>
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
        @endsection