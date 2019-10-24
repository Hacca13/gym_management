@extends('layouts.master')

@section('content')

    <div class="card" style="border-radius: 10px;background-color: #d6d8d8">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <h1>Corsi</h1>
                </div>
                <div class="col-md-12" style="margin-top: 2.5%">
                    @include('components.courses.courseOption')
                </div>
            </div>
            @foreach($courses as $course)
            <div class="col-md-12">
                    @include('components.courses.courseCard')
                </div>
            @endforeach
        </div>
    </div>
@endsection
