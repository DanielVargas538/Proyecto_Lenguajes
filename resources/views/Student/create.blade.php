@extends('layouts.template')

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@section('content')
  <h2>{{ __('students.form.create', ['attribute' => __('students.student')]) }} </h2>

  <form action="/students" method="POST">
    @csrf
    <div class="mb-3">
      <label for="First_name" class="form-label">{{ __('students.attributes.first_name') }}</label>
      <input id="first_name" name="first_name" type="text" class="form-control" tabindex="1" value="{{ old('first_name') }}">

      @error('first_name')
        <br>
        <small style="color: red;">*{{ $message }}</small>
        <br>
      @enderror
    </div>

    <div class="mb-3">
      <label for="" class="form-label"> {{ __('students.attributes.last_name') }}</label>
      <input id="last_name" name="last_name" type="text" class="form-control" tabindex="2" value="{{ old('last_name') }}">

      @error('last_name')
        <br>
        <small style="color: red;">*{{ $message }}</small>
        <br>
      @enderror

    </div>
    <div class="mb-3">
      <label for="" class="form-label">{{ __('students.attributes.identification') }}</label>
      <input id="identification" name="identification" type="text" class="form-control" tabindex="3" value="{{ old('identification') }}">

      @error('identification')
        <br>
        <small style="color: red;">*{{ $message }}</small>
        <br>
      @enderror
    </div>
    <a href="/students" class="btn btn-secondary" tabindex="5">{{__('pagination.previous')}}</a>
    <button type="submit" class="btn btn-primary" name="submit_button" tabindex="4">{{__('pagination.save')}}</button>

  </form>

  @if($errors->any())
    <script>
      swal("{{__('students.title_alert.error')}}", "{{__('students.message.error')}}", "error", {
        button: "Ok"
      });
    </script>
  @endif

@endsection
