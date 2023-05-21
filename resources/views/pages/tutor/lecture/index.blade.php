@extends('layout.tutor')

@section('content')
    <h1>Courses</h1>

    <a href="{{ route('tutor.lecture.create') }}" class="btn btn-primary">Create lecture</a>

    <table class="table mt-3">
        <thead>
        <tr>
            <th>#</th>
            <th>Teacher Name</th>
            <th>Book Name</th>
            <th>Subject</th>
            <th>Room Number</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->teacher_name }}</td>
                <td>{{ $course->book_name }}</td>
                <td>{{ $course->subject }}</td>
                <td>{{ $course->room_number }}</td>
                <td>
                    <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this course?')">Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
