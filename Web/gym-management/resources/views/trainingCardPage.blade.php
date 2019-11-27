@extends('layouts.master')

@section('content')

    <div class="card" style="border-radius: 10px;background-color: rgb(31, 38, 45, 0.8)">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-12" style="text-align: center;">
                    <h1 style="color: #d6d8d8">Gestione schede</h1>
                </div>
                <div class="col-md-12" style="margin-top: 2.5%">
                    <div class="card" style="border-radius: 10px;background-color: #d6d8d8">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-5 col-md-12 col-sm-12">
                                    <form action="/admin/trainingCardsSearchResultsPage" method="post">
                                        @csrf
                                        <div class="input-group no-border">
                                            <input type="text" value="" name='searchInputTrainingCards' class="form-control" placeholder="Cerca scheda di...">
                                            <button type="submit" class="btn btn-default btn-round btn-just-icon" style="background-color: #3F5469">
                                                <i class="fas fa-search"></i>
                                                <div class="ripple-container"></div>
                                            </button>
                                        </div>
                                    </form>

                                </div>
                                <div class="col-lg-6 col-md-9 col-sm-9">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-12 col-sm-12" style="padding: 8px 0 0 10px">
                                            <div class="input-group no-border">
                                                <div class="form-check">
                                                    <input type="checkbox" checked class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">Schede Attive</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12" style="padding: 8px 0 0 10px">
                                            <div class="input-group no-border">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">Schede Non Attive</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-3 col-sm-3" style="text-align: right; margin-top: auto; margin-bottom: auto">
                                    <a href="/admin/nuovaScheda" role="button">
                                        <button class="bttn-material-circle bttn-md bttn-primary" style="background-color: #3F5469">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(count($trainingCardsList) == 0)
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
                <div class="col-md-12">
                    @foreach($trainingCardsList as $trainingCard)
                        @include('components.trainingCards.TrainingCardsList')
                    @endforeach
                </div>
            </div>

            <div class="row justify-content-center" style="margin-top: 2.5%">
                {{ $trainingCardsList->links()}}
            </div>
        </div>
    </div>
@endsection
