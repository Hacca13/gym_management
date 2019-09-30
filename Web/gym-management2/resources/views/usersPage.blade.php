@extends('layouts.master')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-12" style="text-align: center;">
            <h1>Iscritti</h1>
        </div>

        @include('components.users.usersOption')

        <div class="col-md-12" style="margin-top: 2.5%">

            <div class="row justify-content-center">

                @include('components.users.usersCard')


            </div>

        </div>

    </div>

@endsection