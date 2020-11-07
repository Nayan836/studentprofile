@extends('student.master')

@section('content')



<div class="container">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                           Edit Course Register For Student
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form id="registerForm" method="POST" action="{{ route('course.reg.update',$course -> id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="bangla">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $course->name }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="bangla">Bangla</label>
                                <input type="text" class="form-control" name="bangla" value="{{ $course->bangla }}" required>
                            </div>
                            <div class="form-group">
                                <label for="english">English</label>
                                <input type="text" class="form-control" name="english" value="{{ $course->english }}" required>
                            </div>
                            <div class="form-group">
                                <label for="math">Math</label>
                                <input type="text" class="form-control" name="math" value="{{ $course->math }}" required>
                            </div>
                            <div class="form-group">
                                <label for="islam">Islam</label>
                                <input type="text" class="form-control" name="islam" value="{{ $course->islam }}" required>
                            </div>
                            <div class="form-group">
                                <label for="islam">Terms</label>
                                <input type="text" class="form-control" name="terms" value="{{ $course->terms }}" required>
                            </div>
                            
                            
                            <button type="submit"  class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



      
    
@endsection

