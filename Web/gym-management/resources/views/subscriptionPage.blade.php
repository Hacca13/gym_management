@extends('layouts.master')


@section('content')
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
@endsection
