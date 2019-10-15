@extends('layouts.master')


@section('content')

    <div class="card" style="background-color: rgb(255, 255, 255,0.7); border-radius: 10px; ">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <h1>Abbonamenti</h1>
                </div>
                @include('components.subscription.subscriptionOption')
                <div class="col-md-12" style="margin-top: 2.5%">
                    <div class="row justify-content-center">
                        @include('components.subscription.subscriptionCardEntrances')
                        @include('components.subscription.subscriptionCardPeriod')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
