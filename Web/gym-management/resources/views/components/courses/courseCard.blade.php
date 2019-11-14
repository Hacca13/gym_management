
<div class="card-hover" style="border-radius: 10px;background-color: #d6d8d8">
    <a data-toggle="collapse" href="{{'#multiCollapseExample' . $loop->index}}" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3" style="margin-top: auto; margin-bottom: auto;">
                    <h3>{{$course->getName()}}</h3>
                </div>
                <div class="col-md-3" style="text-align: center; margin-top: auto; margin-bottom: auto;">
                    @if($course->getIsActive() == TRUE)
                        <h4>ATTIVO</h4>
                    @endif
                    @if($course->getIsActive() == FALSE)
                        <h4>INATTIVO</h4>
                    @endif
                </div>
                <div class="col-md-3" style="text-align: center; margin-top: auto; margin-bottom: auto;">
                    <h4>Inizio</h4>
                    <h4>{{$course->getPeriod()['startDate']}}</h4>
                </div>
                <div class="col-md-3" style="text-align: center; margin-top: auto; margin-bottom: auto;">
                    <h4>Fine</h4>
                    <h4>{{$course->getPeriod()['endDate']}}</h4>
                </div>
            </div>
        </div>
    </a>
</div>
<div class="col-md-12">
    <div class="collapse multi-collapse" id="{{'multiCollapseExample' . $loop->index}}">
        <div class="card card-body" style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;background-color: #d6d8d8">
            <div class="row justify-content-center">
                @include('components.courses.courseInfo')
            </div>
        </div>
    </div>
</div>
