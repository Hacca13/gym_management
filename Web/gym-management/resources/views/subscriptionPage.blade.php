@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-md-12" style="text-align: center;">
            <div class="card" style="border-radius: 10px;background-color: #d6d8d8">
                <div class="card-body">
                    <h1>Abbonamenti</h1>
                </div>
                @include('components.subscription.subscriptionOption')
                <div class="col-md-12" style="margin-top: 2.5%">
                    <div class="row justify-content-center">
                        @include('components.subscription.subscriptionCardEntrances')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
