@extends('layouts.master')

@section('content')
    <div class="row" style="align-content: center">

        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card" style="border-radius: 10px; background-color: rgb(31, 38, 45, 0.8)">
                <div class="card-body">
                    <h2 class="card-title m-t-10 text-center" style="color: #d6d8d8">Azioni Rapide</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-2 col-sm-12">
                        <div class="card card-hover">
                            <a href="/admin/nuovaScheda">
                                <div class="box bg-dark text-center">
                                    <h1 class="font-light text-white"><i class="fas fa-clipboard-list"></i></h1>
                                    <h6 class="text-white">Nuova scheda</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 col-sm-12">
                        <div class="card card-hover">
                            <a href="/admin/nuovoCorso">
                                <div class="box bg-dark text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-av-timer"></i></h1>
                                    <h6 class="text-white">Nuovo corso</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 col-sm-12">
                        <div class="card card-hover" style="border-radius: 10px">
                            <a href="/admin/nuovoIscritto">
                                <div class="box bg-dark text-center">
                                    <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                    <h6 class="text-white">Nuovo iscritto</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 col-sm-12">
                        <div class="card card-hover">
                            <a href="/admin/nuovoEsercizio">
                                <div class="box bg-dark text-center">
                                    <h1 class="font-light text-white"><i class="fab fa-algolia"></i></h1>
                                    <h6 class="text-white">Nuovo esercizio</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 col-sm-12">
                        <div class="card card-hover">
                            <a href="/admin/nuovoAbbonamento">
                                <div class="box bg-dark text-center">
                                    <h1 class="font-light text-white"><i class="fas fa-euro-sign"></i></h1>
                                    <h6 class="text-white">Nuovo abbonamento</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-4 col-sm-12">
            <div class="card" style="border-radius: 10px; background-color: rgb(31, 38, 45, 0.8)">
                <div class="card-body">
                    <h2 class="card-title m-t-10 text-center" style="color: #d6d8d8">Scadenze Vicine</h2>
                </div>
                <div class="row justify-content-center">

                  @if(count($listSubscription) == 0)
                    <div class="box text-center">
                        <h4 class="text-white">Non ci sono abbonamenti che scadono a breve</h4>
                    </div>
                  @endif

                  @foreach($listSubscription as $subscriptionAndUser)
                    <div class="col-md-12 col-lg-10 col-sm-10">
                        <div class="card card-hover">
                            <div class="box bg-dark row">
                                <h6 class="text-white" style="text-align: left;">{{data_get($subscriptionAndUser,'userNameAndSurname')}}</h6>
                                <?php $subscription = data_get($subscriptionAndUser,'subscription'); ?>
                                @if($subscription instanceof SubscriptionPeriodModel)
                                  <h6 class="text-white offset-9" style="text-align: right;">dcdcd</h6>
                                @endif
                                @if($subscription instanceof SubscriptionRevenueModel)
                                  <h6 class="text-white offset-9" style="text-align: right;">Entrate rimanenti : {{$subscription->getNumberOfEntries()-$subscription->getNumberOfEntriesMade()}}</h6>
                                @endif
                                @if($subscription instanceof SubscriptionCourseModel)
                                  <h6 class="text-white offset-9" style="text-align: right;">dcdcd</h6>
                                @endif
                            </div>
                        </div>
                    </div>
                  @endforeach

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-8 col-sm-12">
            <div class="card" style="border-radius: 10px; background-color: rgb(31, 38, 45, 0.8)">
                <div class="card-body">
                    <h2 class="card-title m-t-10 text-center" style="color: #d6d8d8">I corsi di questa giornata</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-8 col-sm-10">

                      @if(count($listCoursesToday) == 0)
                        <div class="box text-center">
                            <h4 class="text-white">Non ci sono corsi oggi</h4>
                        </div>
                      @endif

                      @foreach($listCoursesToday as $course)
                        <div class="card card-hover">
                            <div class="box bg-dark text-center">
                                <h6 class="text-white">{{$course->getName()}}</h6>
                            </div>
                        </div>
                      @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
