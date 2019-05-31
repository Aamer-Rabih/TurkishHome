@extends('admin.layouts.master')

@section('content')

<div id="content">
  <div class="header-card table-cards color-grey">
    <div class="row">
      <div class="col-lg-4">
        <div class="content-header">
         <h1><small><i class="fa fa-cogs" aria-hidden="true" style="font-size:26px;"></i> إدارة إعفاءات الطلاب</small></h1>
        </div>
      </div>
      <div class="col-lg-8">
        <a href="{{route('freereason.index')}}" class="btn btn-primary button-margin-header custom-but pull-left" > إدارة كافة الإعفاءات 
          <i class="fa fa-angle-double-left" aria-hidden="true" style="font-size: 20px;"></i>
        </a>
      </div> 
    </div>
  </div>
        
  <div id="table" class="row">
    <div class="col-lg-10">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
            <h2>
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i>عرض سبب الإعفاء</small>
            </h2>
          </div>
          <p>{{$freeReason->text}}</p>
        </div>
      </div>
    </div>
  </div>


  



  <div id="table" class="row">
    <div class="col-lg-8">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
            <h2>
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i>الطلاب المعفيين بهذا السبب</small>
            </h2>
          </div>
          <table class="table table-bordered table-hover table-width">
            <thead>
              <tr> 
                <th>اسم الطالب</th>
                
                <th>حذف</th>
              </tr>
            </thead>
            <tbody>
              @foreach($freeStudents as $freeStudent)
              <tr>
                <td>{{$freeStudent->username}}</td>
                
                
                 
                <td>
                  <div class="operations delete">
                    <form action="{{ route('freereason.deletestudent',['freeReason' => $freeReason->id, 'student_id'=>$freeStudent->id]) }}" method="POST" id="deleteForm">
                       {!! csrf_field() !!}
                         
                      <button id="{{$freeReason->id}}" class=" btn-xs delete-button" style="display:none;"></button>
                      <a herf="javascript:;" class="" onclick="$('#{{$freeReason->id}}').click();" >
                        <i class="fa fa-trash" style="font-size:18px;color:#dd4b39"></i>
                      </a>
                    </form>       
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>



  <div id="table2" class="row">
    <div class="col-lg-10">
      <div class="card table-cards color-grey">
        <div class="card-body">
          <div class="content-header">
            <h2>
              <small><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size:24px;"></i> </small>
            </h2>
          </div>
          
          <form action="{{route('freereason.addstudent',$freeReason)}}" method="POST">
            {!! csrf_field() !!}
          <div class="form-group">
          <label for="addStudent">اختر طالب لاضافته الى هذا السبب</label>
          <select name="student" id="student" class="form-contorl form-control-select mt-3">
          @foreach($students as $student)
          <option value="{{$student->id}}">{{$student->username}}</option>
          @endforeach
          </select>
          </div>
          <input type="submit" class="btn btn-success button1" value="اضافة الطالب">
          </form> 
        </div>
      </div>
    </div>
  </div>

</div>

@endsection



