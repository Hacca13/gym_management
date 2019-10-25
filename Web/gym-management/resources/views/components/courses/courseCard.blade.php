<div class="row justify-content-center" style="margin-top: 2.5%">
    <div class="col-md-10">
        <div class="card" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7);">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4" style="margin-top: auto; margin-bottom: auto;">
                        <h3>{{$course->getName()}}</h3>
                    </div>
                    <div class="col-md-1">
                      @if($course->getIsActive() == TRUE)
                      <h4>ATTIVO</h4>
                      @endif
                      @if($course->getIsActive() == FALSE)
                      <h4>INATTIVO</h4>
                      @endif
                    </div>
                    <div class="col-md-3" style="text-align: right; margin-top: auto; margin-bottom: auto;">
                        <h4>Dal: {{$course->getPeriod()['startDate']}}</h4>
                    </div>
                    <div class="col-md-3" style="text-align: right; margin-top: auto; margin-bottom: auto;">
                        <h4>Al: {{$course->getPeriod()['endDate']}}</h4>
                    </div>
                    <a data-toggle="collapse" href="{{'#multiCollapseExample' . $loop->index}}" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
                        <h2>
                            <i class="mdi mdi-arrow-down-drop-circle" style="color: black"></i>
                        </h2>
                    </a>
                    <div class="col-md-12">
                        <div class="collapse multi-collapse" id="{{'multiCollapseExample' . $loop->index}}">
                            <div class="card card-body">
                                <div class="row justify-content-center">
                                    @include('components.courses.courseInfo')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
