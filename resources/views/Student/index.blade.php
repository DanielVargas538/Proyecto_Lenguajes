@extends('layouts.template')

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@section('content')
<a href="students/create" class= "btn btn-danger">{{ __('students.form.button.create') }}</a>

<table class="table table-dark table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">{{ __('students.attributes.id') }}</th>
      <th scope="col">{{ __('students.attributes.first_name') }} </th>
      <th scope="col">{{ __('students.attributes.last_name') }}</th>
      <th scope="col">{{ __('students.attributes.identification') }}</th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($students as $student)
    <tr>
        <td>{{$student->id}}</td>
        <td>{{$student->first_name}}</td>
        <td>{{$student->last_name}}</td>
        <td>{{$student->identification}}</td>
        <td>
         <form action="{{ route('students.destroy',$student->id) }}" method="POST">
          <a href="/students/{{$student->id}}/edit" class="btn btn-info">{{ __('students.form.button.edit') }}</a>         
              @csrf
              @method('DELETE')
          <button type="submit" class="btn btn-danger">{{ __('students.form.button.delete') }}</button>
         </form>          
        </td>        
    </tr>
    @endforeach
  </tbody>
</table>

  @if(session()->has('success'))
    <script>
        swal("{{ session('title') }}", "{{ session('success') }}", "success", {
            button: "Ok"
        });
    </script>
  @endif

@endsection