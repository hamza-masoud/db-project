@extends('layout.tutor')

@section('content')

    <div class="container mt-3">

        <h1>Lectures</h1>

        <a href="{{ route('tutor.lecture.create') }}" class="btn btn-primary">Create lecture</a>

        <div class="">
            <table class="table mt-3">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>description</th>
                    <th>Course Subject</th>
                    <th>Room Number</th>
                    <th>count of attendance</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($lectures as $lecture)
                    <tr>
                        <td>{{ $lecture->id }}</td>
                        <td>{{ $lecture->title }}</td>
                        <td>{{ $lecture->description }}</td>
                        <td>{{ $lecture->course->subject }}</td>
                        <td>{{ $lecture->room_number }}</td>
                        <td>{{ $lecture->students_count }}</td>
                        <td>
                            <a href="{{ route('tutor.lecture.show', $lecture) }}" class="btn btn-primary">show</a>
                            <form action="{{ route('tutor.lecture.destroy', $lecture) }}" method="POST" class="d-inline">
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
        </div>
    </div>


@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('table').DataTable();
        });
    </script>
@endsection

