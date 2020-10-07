@extends('layouts.master')


@section('content')
    <div class="card" style="border-radius: 10px;background-color: rgba(31, 38, 45, 0.8)">
        <div class="card-body">
            <div class="row justify-content-center">

                <div class="col-md-12" style="text-align: center;">
                    <h1 style="color: #d6d8d8">Abbonamenti</h1>
                </div>


                <div class="col-md-12" style="margin-top: 2.5%">
                    @include('components.subscription.subscriptionOption')
                          @foreach($subscriptionResultList as $subscription)
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

            </div>
        </div>
        <div class="row justify-content-center" style="margin-top: 2.5%">
          @if(count($subscriptionResultList) == 0)
            <div class="row text-center" style="margin-bottom: 5%;margin-top: 4%">

                <h1 class="col-md-12 text-center" style="color: #d6d8d8">Non ci sono risultati</h1>

            </div>
          @endif
            {{ $subscriptionResultList->links()}}
        </div>
    </div>





@endsection
