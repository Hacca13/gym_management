@extends('layouts.master')


@section('content')
    <div class="card" style="border-radius: 10px;background-color: rgb(31, 38, 45, 0.8)">
        <div class="card-body">
            <div class="row justify-content-center">

                <div class="col-md-12" style="text-align: center;">
                    <h1 style="color: #d6d8d8">Abbonamenti</h1>
                </div>

                <div class="col-md-12" style="margin-top: 2.5%">
                    @include('components.subscription.subscriptionOption')
                    <div class="col-md-12" style="margin-top: 2.5%">
                          @foreach($subscriptionList as $subscription)
                              @if($subscription->getType() == 'revenue')
                                  @include('components.subscription.subscriptionCardEntrances')
                              @endif
                              @if($subscription->getType() == 'period')
                                  @include('components.subscription.subscriptionCardPeriod')
                              @endif
                              @if($subscription->getType() == 'course')
                                  @include('components.subscription.subscriptionCardCourse')
                              @endif
                          @endforeach
                    </div>
                <div class="row justify-content-center" style="margin-top: 2.5%">

                    {{ $subscriptionList->links()}}
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>





@endsection
