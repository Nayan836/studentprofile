@extends('student.master')

@section('content')

<div class="container">

        <div class="card">
              <div class="card-body ">
                  <a href="{{ route('course.reg.get') }}" class="btn btn-primary">Student Course Register</a>
                 
               </div>

               <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">student_id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Sub-1</th>
                    <th scope="col">Sub-2</th>
                    <th scope="col">Sub-3</th>
                    <th scope="col">Sub-4</th>
                    <th scope="col">Term</th>
                    <th scope="col">Action</th>

                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($courses as $course)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $course->student_id }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->bangla }}</td>
                        <td>{{ $course->english }}</td>
                        <td>{{ $course->math }}</td>
                        <td>{{ $course->islam }}</td>
                        <td>{{ $course->terms }}</td>
                        <td>
                            <a href="{{ route('course.reg.edit',$course -> id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('course.reg.delete',$course -> id) }}" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>

            </table>
            
        </div>
       
</div>
      
    
@endsection
