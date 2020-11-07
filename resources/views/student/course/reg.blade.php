@extends('student.master')

@section('content')



<div class="container">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Course Register For Student
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
                        <form id="registerForm" method="POST" action="{{ route('course.reg.post') }}">
                            @csrf
                            
                            
                            <div class="form-group">
                                <label for="name"> Student Name</label>
                                <input type="text" class="form-control" name="name" value="">
                            </div>
                            <div class="form-group">
                                <label for="bangla">Bangla</label>
                                <input type="text" class="form-control" name="bangla" required>
                            </div>
                            <div class="form-group">
                                <label for="english">English</label>
                                <input type="text" class="form-control" name="english" required>
                            </div>
                            <div class="form-group">
                                <label for="math">Math</label>
                                <input type="text" class="form-control" name="math" required>
                            </div>
                            <div class="form-group">
                                <label for="islam">Islam</label>
                                <input type="text" class="form-control" name="islam" required>
                            </div>
                            <div class="form-group">
                                <label for="terms">Terms</label>
                                <div class="col-sm-10">
                                    <select name="terms" id="terms" class="form-control">
                                        <option value="">Select Terms</option>
                                        @if($terms)
                                            @foreach($terms as $terms)
                                                <option value="{{ $terms }}">{{ $terms }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <button type="submit"  class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



      
    
@endsection
