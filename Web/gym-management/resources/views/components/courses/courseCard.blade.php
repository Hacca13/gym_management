<div class="card-hover" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7);">
    <a data-toggle="collapse" href="{{'#multiCollapseExample' . $loop->index}}" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3" style="margin-top: auto; margin-bottom: auto;">
                    <h3>{{$course->getName()}}</h3>
                </div><!- corso>
                <div class="col-md-3" style="text-align: center; margin-top: auto; margin-bottom: auto;">
                    @if($course->getIsActive() == TRUE)
                        <h4>ATTIVO</h4>
                    @endif
                    @if($course->getIsActive() == FALSE)
                        <h4>INATTIVO</h4>
                    @endif
                </div><!- attivo>
                <div class="col-md-3" style="text-align: center; margin-top: auto; margin-bottom: auto;">
                    <h4>Inizio</h4>
                    <h4>{{$course->getPeriod()['startDate']}}</h4>
                </div><!- inizio>
                <div class="col-md-3" style="text-align: center; margin-top: auto; margin-bottom: auto;">
                    <h4>Fine</h4>
                    <h4>{{$course->getPeriod()['endDate']}}</h4>
                </div><!- fine>
                <div class="col-md-12">
                    <div class="collapse multi-collapse" id="{{'multiCollapseExample' . $loop->index}}">
                        <div class="card card-body">
                            <div class="row justify-content-center">
                                @include('components.courses.courseInfo')
                                @include('components.courses.courseInfo')
                                @include('components.courses.courseInfo')
                            </div>
                        </div>
                    </div>
                </div><!- collapse>
            </div>
        </div>
    </a>
</div>

