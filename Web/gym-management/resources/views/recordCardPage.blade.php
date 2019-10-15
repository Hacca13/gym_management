@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12" style="text-align: center;">
            <h1>Schede</h1>
        </div>
        <div class="col-md-12">
            @include('components.recordCard.recordCardOption')
            @include('components.recordCard.recordCard')
        </div>
    </div>
@endsection
