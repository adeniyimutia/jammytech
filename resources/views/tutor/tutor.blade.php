@extends('userlayout')


@section('pagetitle')
  {{ $datutor->firstname }} | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">I'm {{ $datutor->firstname }} </li>
</ol>

@endsection

@section('innercontent')
<section class="tutor-bar">
  <div class="row">
    <div class="col-sm-3"> 
    <div class="image-box"> 
    <img class="img-circle tutorimage" src="@if(isset($tutorprofile)) @if($tutorprofile->photo != '' ) /uploads/{{$tutorprofile->photo }} @endif @endif">

    </div> </div>
    <div class="col-sm-4">
          <h3 class="tutori"> I'm {{ $datutor->lastname }}, {{$datutor->firstname}}</h3>
     </div>

  </div>

</section>

<section class="tutor-info">
  
   <div class="row">
      <div class="col-sm-4">
         <div class="box-myinfo">
           <p class="t-info">Tutoragoing Since: {{ TTools::displayODate($datutor->created_at) }}</p>
          </div>

      </div>
        <div class="col-sm-4">
        <div class="box-myinfo">
          <p class="t-info"> Completed Classes:{{ TTools::displayNumber($completedcount) }} </p>
        </div>

      </div>
        <div class="col-sm-4">
        <div class="box-myinfo">
           <p class="t-info"> 
       Ongoing Classes: {{ TTools::displayNumber($ongoingcount) }}
           </p>
        </div>

      </div>

   </div>
</section>

<section class="tutor-bio">
 <div class="row">
    <div class="col-sm-6"> 
          <h3> Know Me</h3>
          <p class="well"> @if(isset($tutorprofile)) {{ $tutorprofile->bio }} @endif </p>
    </div>
  <div class="col-sm-6">
  <h3 class="w-me"> Watch Me</h3>
              <div class="video-box">
<div class="embed-responsive embed-responsive-4by3">
  <iframe width="408" height="229" class="embed-responsive-item" src="{{ $tutorprofile->video }}"></iframe>
</div>

            </div>

   </div>
  </div>
</section>

<section class="tutor-education-work">
<div class="row">
<div class="col-sm-6">
  <h3> My Qualifications </h3>
  <div class="table-responsive">
 <table class="table table-striped table-bordered">
 <thead>
   <th> Institution </th> <th> Course</th> <th> Certificate </th>
 </thead>
<tbody>
  @if(isset($educations))
  @if(count($educations) >0)
  @foreach($educations as $education)
  <tr> <td>{{ $education->institution }} </td> <td> {{ $education->course }}</td> <td>{{ $education->degree }} </td></tr>
  @endforeach
  @endif
  @else
  <tr> <td colspan="3"> Preparing to update my qualifications, please come back and check </td></tr>
  @endif
  </tbody>
</table>
</div>
 </div>

<div class="col-sm-6">
  <h3> My Working Experience </h3>
  <div class="table-responsive">
 <table class="table table-striped table-bordered">
 <thead>
   <th> Organization </th> <th> Position</th> <th> Roles </th>
 </thead>
<tbody>
  @if(isset($workingexps))
  @if(count($workingexps) >0)
  @foreach($workingexps as $workingexp)
  <tr> <td>{{ $workingexp->organization }} </td> <td> {{ $workingexp->position }}</td> <td>{{ $workingexp->roles }} </td></tr>
  @endforeach
  @endif
  @else
  <tr> <td colspan="3"> Will be updated soon.  </td></tr>
  @endif
  </tbody>
</table>
</div>
 </div>

 </div>
</section>

<section class="tutor-icanteach">
<div class="row">
<div class="col-sm-6">
  <h3> I can Teach </h3>
 <ul class="list-group">
  @if(isset($icanteach))
  @if(count($icanteach) >0)
  @foreach($icanteach as $canteach)
  <li class="list-group-item"> {{ $canteach->course->name }}</li>
  @endforeach
  @endif
  @endif
 </ul>
 </div>

 <div class="col-sm-6">
  <h3> @if(isset($teachingexps)) @if(isset($teachingexps->teachinglevel)) {{ $teachingexps->teachinglevel }} @endif @endif </h3>
 <ul class="list-group">
  @if(isset($teachingexps))
  @if(isset($teachingexps->levelexplanation))
     <p class="well"> {{ $teachingexps->levelexplanation }} </p>
  
  @endif
  @endif
 </ul>
 </div>
 </div>
</section>


<section class="tutor-rating-in">
  <div class="row">
    <div class="col-sm-6"> </div>
    <div class="col-sm-6"> </div>
   </div>
</section>
@endsection