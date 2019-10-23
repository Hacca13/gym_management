@extends('layouts.master')

@section('content')

    <div class="card" style="border-radius: 10px;background-color: #d6d8d8">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <h1>Corsi</h1>
                </div>
                <div class="col-md-12" style="margin-top: 2.5%">
                    <div class="card" style="border-radius: 10px;background-color:rgb(255, 255, 255,0.7)">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5"">
                                    <div class="input-group no-border">
                                        <input type="text" value="" class="form-control" placeholder="Search...">
                                        <button type="submit" class="btn btn-default btn-round btn-just-icon">
                                            <i class="fas fa-search"></i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-3" >
                                    <div class="input-group no-border">
                                        <div class="form-check" >
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Corsi Attivi</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group no-border">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Corsi Non Attivi</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1" style="text-align: center; margin-top: auto; margin-bottom: auto">
                                    <a href="nuovoCorso" role="button">
                                        <button class="bttn-material-circle bttn-md bttn-primary">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
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
