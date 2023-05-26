@extends('layout.tutor')

@section('content')

    <div class="container mt-3">

        <div class="d-flex">
            <h1 class="">Lectures: {{ $lecture->title }}</h1>
            <div class="ms-auto">
                <form action="{{ route('tutor.lecture.upload-file', $lecture) }}" method="post" id="upload_file">
                    @csrf
                <div class="input-group d-inline-block">
                    <label>upload excel attendance</label>
                    <input class="form-control w-100" type="file" accept=".xlsx, .xls, .csv" name="file" onchange="$('#upload_file').submit();"/>
                </div>
                    <small>this form for attendance student from excel <a class="link" href="#">example</a></small>
                </form>
            </div>
        </div>
        <hr class="pt-1 bg-black opacity-50">
        <table class="table">

        </table>
    </div>

@endsection

