@extends('layouts.master')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12" style="text-align: center;">
            <h1>Iscritti</h1>
        </div>
        <div class="col-md-12" style="margin-top: 2.5%">
            @include('components.users.usersOption')
            @foreach($users as $user)
                @include('components.users.userCard')
            @endforeach
        </div>
    </div>

@endsection
