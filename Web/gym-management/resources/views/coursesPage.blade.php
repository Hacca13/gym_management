@extends('layouts.master')

@section('content')
    <div class="card" style="border-radius: 10px;background-color: rgba(31, 38, 45, 0.8)">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-12" style="text-align: center;">
                    <h1 style="color: #d6d8d8">Corsi</h1>
                </div>
                <div class="col-md-12" style="margin-top: 2.5%">
                    @include('components.courses.courseOption')
                </div>
                @if(count($courses) == 0)
                  <div class="row text-center" style="margin-top: 5%">
                    <br>
                    <br>
                    <br>
                      <h1 class="col-md-12 text-center" style="color: #d6d8d8">Non ci sono risultati</h1>
                    <br>
                    <br>
                    <br>
                  </div>
                @endif
                <div class="col-md-12">
                    @foreach($courses as $course)
                        @include('components.courses.courseCard')
                    @endforeach
                </div>
            </div>
            <br>
            <div class="row justify-content-center" style="margin-top: 2.5%">
                {{$courses->links()}}
            </div>
        </div>
    </div>
@endsection
