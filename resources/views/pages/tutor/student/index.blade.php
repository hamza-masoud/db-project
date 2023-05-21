@extends('layout.tutor')

@section('content')
    <div class="container">
        <h1>Students</h1>
        <a href="{{ route('tutor.student.create') }}" class="btn btn-primary mb-3">Add Student</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->full_name }}</td>
                    <td>
                        <a href="{{ route('tutor.student.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('tutor.student.destroy', $student->id) }}" method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this tutor?')">Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
