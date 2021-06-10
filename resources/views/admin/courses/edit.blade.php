@extends('admin.adminLayout.main')
@section('crumb')
<nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i class="material-icons"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Courses</li>
          </ol>
        </nav>
        @endsection


        @section('content')


        <div class="row">

<div class="col-md-12">



  <div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
      <h6>Course</h6>
      <!-- <a href="add_cource.html" class="btn btn-dark" > add Course </a> -->
    </div>
  
      <form action="{{route('courses.update',$course->id)}}" method="POST" enctype="multipart/form-data" >
     @method('PUT')
      {{ csrf_field() }}
              <div class="ms-auth-container row">

          <div class="col-md-4">
              <label> img_course </label>
            <div class="form-group">
              <div id="uploadOne" class="img-upload">
                <img src="{{ asset('uploads/courses')}}/{{$course->course_image}}" alt="">
                <div class="upload-icon">
                  <input type="file" name="course_image" class="upload">
                  <i class="fas fa-camera    "></i>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <label> img_thumbnail </label>
          <div class="form-group">
            <div id="uploadTwo" class="img-upload">
              <img src="{{ asset('uploads/courses')}}/{{$course->course_image_thumbnail}}" alt="">
              <div class="upload-icon">
                <input type="file" name="thumbnail" class="upload">
                <i class="fas fa-camera    "></i>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <label> pdf  </label>
          
          <div class="fileUpload">
              <div class="upload-icon">
              <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">
           
              <input type="file" name="fileDoc" class="upload up" id="up" onchange="readURLFile(this);" />
              <span class="upl" id="upload">{{$course->course_brochure}}</span></div>
            
            </div>
      </div>

          
          <div class="col-md-6">
              <div class="form-group">
                <label class="exampleInputPassword1" for="exampleCheck1" style="color:red">*Course_en_Name </label>
                <input type="text" id="newCourse" value="course_en_name" name="course_en_name" class="form-control" placeholder="course">
              </div>
            </div>
         
            <div class="col-md-6">
              <div class="form-group">
                <label class="exampleInputPassword1" for="exampleCheck1">Duration ( in days ) </label>
                <input type="number" id="newClint" value="course_duration"  name="course_duration" class="form-control" placeholder="Duration">
              </div>
            </div>
            
           
            <div class="col-md-6">
              <div class="form-group">
                <label style="color:red">category *</label>
                <select name="category_id" class="form-control  dynamic" required data-show-subtext="true" data-live-search="true" id="country" data-dependent="sub" >
                  <option value="">select....</option>
                  @foreach ($cats as $category)
                              <option value='{{$category->id}}' >
                               {{ $category->category_en_name }}</option>
                                 @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label style="color:red" > sub category *</label>
                <select name="course_sub_category_id" class="form-control " data-show-subtext="true" data-live-search="true" id="sub">
                              <option value="">select....</option>
                </select>
              </div>
            </div>
          
         

          <div class="col-md-6">
            <div class="form-group">
              <label for="example"> Training Methods</label>
              <div class="form-group">
                  <textarea class="content" name="course_training_methods"></textarea>
              </div>
            </div>
          </div>

          <div class="col-md-6">
              <div class="form-group">
                <label for="example2"> Daily Agenda</label>
                <div class="form-group">
                    <textarea class="content" name="course_daily_agenda"></textarea>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example"> HighLight</label>
                <div class="form-group">
                    <textarea class="content" name="course_highlight"></textarea>
                </div>
              </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label for="example2">Audience</label>
                  <div class="form-group">
                      <textarea class="content"  name="course_audience">{{$course->course_audience}}</textarea>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="example2">Course Objectives</label>
                  <div class="form-group">
                      <textarea class="content" name="course_objectives"></textarea>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="example2">Accreditation</label>
                  <div class="form-group">
                      <textarea class="content" name="Accreditation"></textarea>
                  </div>
                </div>
              </div>



            <div class="col-md-6">
              <div class="form-group">
                <label for="example"> en desc</label>
                <div class="form-group">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="course_en_desc"></textarea>
                </div>
              </div>
            </div>

           
          
          <div class="col-12">
              <div class="custom-control custom-checkbox" style="display: none;">
                <input type="checkbox" id="course" name="course"
                checked>
         <label for="category">active course</label>
       </div>
               
              </div>
         
          
      
      </div>
      <div class="input-group d-flex justify-content-end text-center">
        <a href="{{ route('courses.index') }}" class="btn btn-dark mx-2"> Cancel</a>
        <input type="submit" value="Add" class="btn btn-success ">
      </div>
    </form>
    </div>
  </div>




</div>

</div>
</div>




        @endsection
        @section('scripts')
<script>
        $(document).ready(function(){

$('.dynamic').change(function(){
   
 if($(this).val() != '')
 {
  var select = $(this).attr("id");
  var value = $(this).val();
 
  var _token = $('input[name="_token"]').val();
 
  $.ajax({
   url:"{{route('dynamicdependentCat.fetch')}}",
   method:"POST",
   data:{select:select, value:value, _token:_token},


   success:function(result)
   {
    
    $('#sub').html(result);
   }

  })
 }
});




});
</script>

        @endsection