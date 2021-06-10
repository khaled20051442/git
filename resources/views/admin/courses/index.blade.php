@extends('admin.adminLayout.main')
@section('crumb')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i class="material-icons"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Courses</li>
          </ol>
        </nav>
        @endsection


        @section('content')

        <div class="row">

<div class="col-md-12">



  <div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
      <h6>Course</h6>
      <a href="{{route('courses.create')}}" class="btn btn-dark" > add Course </a>
    </div>
    <div class="ms-panel-body">
      <div class="table-responsive">
        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
          <thead>
            <th>Course Code</th>  
            <th>Course Name </th>
            <th>Course Duration</th>
            <th>Active</th>
            <th>Action</th>
          </thead>
          <tbody>
@foreach($rows as $row)
            <tr>
              <td> {{$row->course_code}} </td>
              <td>{{$row->course_en_name}}</td>
              <td>{{$row->course_duration}}</td>
              <td>
                        @if($row->active ==1)
                        <i class="fas fa-check"></i>
                        @else
                            <i class="fas fa-times"></i>
                        @endif
                        </td>
              <td>
            <a href="{{ route('courses.edit', $row->id) }}" class="btn btn-info d-inline-block" 
                >edit</a>
              <a href="#" onclick="destroy('this Country','{{$row->id}}')" class="btn d-inline-block btn-danger">delete</a>
              <form id="delete_{{$row->id}}" action="{{ route('courses.destroy', $row->id) }}"  method="POST" style="display: none;">
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





        @endsection