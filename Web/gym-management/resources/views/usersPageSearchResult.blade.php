@extends('layouts.master')

@section('content')

    <div class="card" style="border-radius: 10px;background-color: rgba(31, 38, 45, 0.8)">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-12" style="text-align: center;">
                    <h1 style="color: #d6d8d8">Iscritti</h1>
                </div>
                <div class="col-md-12" style="margin-top: 2.5%">
                    @include('components.users.usersOption')

                    @foreach($usersResultList as $user)
                        @include('components.users.userCard')
                    @endforeach
                </div>

                <div>
                  <br>
                    {{$usersResultList->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
