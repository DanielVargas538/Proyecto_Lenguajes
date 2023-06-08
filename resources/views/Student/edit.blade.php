@extends('layouts.template')

@section('content')
<h2>{{ __('students.form.edit', ['attribute' => __('students.student')]) }} </h2>
@foreach($errors->all() as $error)
    <br>
    <small style="color: red;">*{{ $error }}</small>
@endforeach
<form action="/students/{{$student->id}}" method="POST">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">{{ __('students.attributes.first_name') }}</label>
    <input id="first_name" name="first_name" type="text" class="form-control" value="{{$student->first_name}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">{{ __('students.attributes.last_name') }}</label>
    <input id="last_name" name="last_name" type="text" class="form-control" value="{{$student->last_name}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">{{ __('students.attributes.identification') }}</label>
    <input id="identification" name="identification" type="text" class="form-control" value="{{$student->identification}}">
  </div>
  <a href="/students" class="btn btn-secondary" tabindex="5">{{__('pagination.previous')}}</a>
  <button type="submit" class="btn btn-primary" tabindex="4">{{__('pagination.save')}}</button>
</form>


@endsection