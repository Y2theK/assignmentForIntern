@extends('layouts.master')
@section('content')

<div class="container">
  <div class="card mt-5">
    <h4 class="card-header text-dark">Register Here</h4>
    <div class="card-body">

      <form action="{{ route('students.register') }}" class="form" method="POST">
        @csrf
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" class="form-control" name="name" placeholder="John Doe" value="{{ old('name') }}">
          @error('name')
          <small class="text-danger">{{ $errors->first('name') }}</small>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="">Email</label>
          <input type="email" class="form-control" name="email" placeholder="jhon@gmail.com" value="{{ old('email') }}">
          @error('email')
          <small class="text-danger">{{ $errors->first('email') }}</small>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="">NRC</label>
          <input type="text" class="form-control" name="nrc" placeholder="9/mdy(N) 181506" value="{{ old('nrc') }}">
          @error('nrc')
          <small class="text-danger">{{ $errors->first('nrc') }}</small>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="">Date of Birth</label>
          <input type="date" class="form-control" name="dob" value="{{ old('dob') }}" max="{{ date('Y-m-d') }}">
          @error('dob')
          <small class="text-danger">{{ $errors->first('dob') }}</small>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="">Courses</label><br>
          @error('courses')
          <small class="text-danger">{{ $errors->first('courses') }}</small>
          @enderror
          @foreach ($courses as $course)
          <div class="">
            <input type="checkbox" class="form-check-input" name="courses[]" id="" value="{{ $course->id }}" {{
              (is_array(old('courses')) && in_array($course->id, old('courses'))) ? ' checked' : '' }}>
            <label for="" class="small text-primary">{{ $course->name }}</label>
          </div>
          @endforeach

        </div>
        <input type="submit" value="Create" class="btn btn-warning mt-3">
      </form>
    </div>
  </div>
</div>
@endsection