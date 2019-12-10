
<div class="card-hover" style="border-radius: 10px;background-color: #d6d8d8; margin-top: 2.5%">
    <a data-toggle="collapse" href="{{'#multiCollapseExample' . $loop->index}}" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12" style="text-align: center; margin-top: auto; margin-bottom: auto;">
                    <h3>{{$course->getName()}}</h3>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12" style="text-align: center; margin-top: auto; margin-bottom: auto;">
                    @if($course->getIsActive() == TRUE)
                        <h4 style="color: green">ATTIVO</h4>
                    @endif
                    @if($course->getIsActive() == FALSE)
                        <h4 style="color: red">INATTIVO</h4>
                    @endif
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12" style="text-align: right; margin-top: auto; margin-bottom: auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h4>Inizio: {{$course->getPeriod()['startDate']}}</h4>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h4>Fine: {{$course->getPeriod()['endDate']}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>

<div class="col-md-12">
    <div class="collapse multi-collapse" id="{{'multiCollapseExample' . $loop->index}}">
        <div class="card card-body" style="background-color: rgba(214, 216, 216, 0.9); border-radius: 0 0 10px 10px;">
            <div class="row justify-content-center">
                @include('components.courses.courseInfo')
            </div>

            <div class="col-md-12">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: center; margin-bottom: 5px;">
                        <a href="#">
                            <button class="btn btn-warning" id="fname" name="" style="border-radius: 10px;">Modifica</button>
                        </a>
                    </div>
                    @if($course->getIsActive() == TRUE)
                        <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: center; margin-bottom: 5px;">
                            <a href="/admin/gestioneCorsi">
                                <button class="btn btn-danger" id="fname" name="" style="border-radius: 10px;">Disattiva</button>
                            </a>
                        </div>
                    @endif
                    @if($course->getIsActive() == FALSE)
                        <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: center; margin-bottom: 5px;">
                            <a href="/admin/gestioneCorsi">
                                <button class="btn btn-success" id="fname" name="" style="border-radius: 10px;">Attiva</button>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
