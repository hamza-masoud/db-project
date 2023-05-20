@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Tutors</h1>
        <a href="{{ route('admin.tutors.create') }}" class="btn btn-primary mb-3">Add Tutor</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tutors as $tutor)
                <tr>
                    <td>{{ $tutor->id }}</td>
                    <td>{{ $tutor->name }}</td>
                    <td>{{ $tutor->email }}</td>
                    <td>{{ $tutor->phone }}</td>
                    <td>
                        <a href="{{ route('tutors.edit', $tutor->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('tutors.destroy', $tutor->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this tutor?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
