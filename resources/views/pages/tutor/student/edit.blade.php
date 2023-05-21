@extends('layout.tutor')

@section('content')
    <div class="container">
        <h1>Edit Tutor</h1>
        <form action="{{ route('tutor.student.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="full_name" class="form-control" id="name" value="{{ $student->full_name }}" required>
            </div>
            <div class="form-group">
                <label for="courses">Courses</label>
                <select name="courses[]" multiple class="form-control select2-course">
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
