@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-md-12" style="text-align: center;">
            <div class="card" style="border-radius: 10px;background-color: #d6d8d8">
                <div class="card-body">
                    <h1>Abbonamenti</h1>
                    @include('components.subscription.subscriptionOption')
                    <div class="col-md-12" style="margin-top: 2.5%">
                        <div class="row justify-content-center">
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
                        <div class="row justify-content-center">

                            {{ $subscriptionList->links()}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
