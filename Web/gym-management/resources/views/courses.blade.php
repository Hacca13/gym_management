@extends('layouts.master')

@section('content')


    <div class="row">

        <div class="col-md-12" style="text-align: center;">
            <h1>Corsi</h1>
        </div>

        <div class="col-md-12" style="margin-top: 2.5%">
            @include('components.courses.courseOption')
        </div>

        @foreach($courses as $course)
            <div class="col-md-12">

                @include('components.courses.courseCard')

            </div>
        @endforeach

    </div>


@endsection
