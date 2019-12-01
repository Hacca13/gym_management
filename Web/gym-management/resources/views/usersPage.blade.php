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
                </div>
                @if(count($users) == 0)
                  <div class="row text-center">
                    <br>
                    <br>
                    <br>
                      <h1 class="col-md-12 text-center" style="color: #d6d8d8">Non ci sono risultati</h1>
                    <br>
                    <br>
                    <br>
                  </div>
                @endif
                @foreach($users as $user)
                    <div class="col-md-12">
                        @include('components.users.userCard')
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center" style="margin-top: 2.5%">
                {{ $users->links()}}
            </div>
        </div>
    </div>
@endsection
