@extends('layouts.master')

@section('content')

    <div class="card" style="border-radius: 10px;background-color: rgba(31, 38, 45, 0.8)">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <h1 style="color: #d6d8d8">Gestione schede</h1>
                </div>
                <div class="col-md-12" style="margin-top: 2.5%">
                    <div class="card" style="border-radius: 10px;background-color:rgba(255, 255, 255,0.7)">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                  <form action="/trainingCardsSearchResultsPage" method="post">
                                    @csrf
                                    <div class="input-group no-border">
                                        <input type="text" value="" name='searchInputTrainingCards' class="form-control" placeholder="Cerca scheda di...">
                                        <button type="submit" class="btn btn-default btn-round btn-just-icon">
                                            <i class="fas fa-search"></i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                  </form>

                                </div>
                                <div class="col-md-3" >
                                    <div class="input-group no-border">
                                        <div class="form-check" >
                                            <input type="checkbox" checked class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Schede Attive</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group no-border">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Schede Non Attive</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1" style="text-align: center; margin-top: auto; margin-bottom: auto">
                                    <a href="nuovaScheda" role="button">
                                        <button class="bttn-material-circle bttn-md bttn-primary">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-md-12">
                  @if(count($trainingCardsResultList) == 0)
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
                    @foreach($trainingCardsResultList as $trainingCard)
                      @include('components.trainingCards.TrainingCardsList')
                    @endforeach

                </div>
                <div>
                      {{ $trainingCardsResultList->links()}}
                </div>
        </div>
    </div>
@endsection
