@extends('layouts.master')
@section('content')

    <div class="card" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7);">
        <div class="card-body">
            <div class="row justify-content-center">

                <div class="col-md-12" style="text-align: center;">
                    <h1>Schede</h1>
                </div>

                @include('components.recordCard.recordCardOption')

                <div class="col-md-12">

                    @include('components.recordCard.recordCard')

                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-md-12">

                    @include('components.recordCard.recordCard')

                </div>

            </div>
        </div>
    </div>

@endsection
