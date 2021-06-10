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
      <h6>Testimonials</h6>
      <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addSubCat"> add new </a>
    </div>
      <div class="ms-panel-body">
          <div class="table-responsive">
              <table id="testimonials" class="dattable table table-striped thead-dark  w-100">
                  <thead>
                  <th>Name</th>
                  <th>Star Rate</th>
                  <th>Feedback</th>
                  <th>Action</th>
                  </thead>
                  <tbody>
@foreach($rows as $row)
                      <tr>
                          <td> {{$row->reviewer_name}} </td>
                          <td>
                          @foreach (range(1,5) as $i)
                          @if ($row->reviewer_star_rate >= $i )
                          <i class="fas fa-star"></i>
                          @else
                          <i class="far fa-star"></i>
                          @endif
                          @endforeach
                          </td>
                          <td>
                          <p>
                          {{$row->reviewer_text}}
                          </p></td>
                          
              <td>
                <a href="{{ route('testmonile.edit', $row->id) }}" class="btn btn-info d-inline-block" 
                >edit</a>
              <a href="#" onclick="destroy('this Country','{{$row->id}}')" class="btn d-inline-block btn-danger">delete</a>
              <form id="delete_{{$row->id}}" action="{{ route('testmonile.destroy', $row->id) }}"  method="POST" style="display: none;">
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
</div>

</main>

<!--  Setup  -->
<!-- Add SubCat Modal -->
<div class="modal fade" id="addSubCat" tabindex="-1" role="dialog" aria-labelledby="addSubCat">
<div class="modal-dialog modal-lg " role="document">
<div class="modal-content">
<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
 
</button>
<h3>Add Testimonials</h3>
<div class="modal-body">

 
  <div class="ms-auth-container row no-gutters">
    <div class="col-12 p-3">
      <form action="{{route('testmonile.store')}}" method='post'>
      @csrf
        <div class="ms-auth-container row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Name</label>
                  <div class="input-group">
                    <input name="reviewer_name" type="text" id="newTes" class="form-control" placeholder="name">
                  </div>
                </div> </div>
        
                  
            
            
            <div class="col-md-12">
                <div class="form-group">
                  <label>Feed Back</label>
                  <div class="input-group">
                   <textarea name="reviewer_text" id="" rows="4" class="form-control" placeholder="Feed Back"></textarea>
                  </div>
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
</div>
</div>

</div>
</div>
</div>

@endsection
