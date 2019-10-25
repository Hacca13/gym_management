<div class="row justify-content-center" style="margin-top: 2.5%">
    <div class="col-md-12">
        <div class="card" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7);">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4" style="margin-top: auto; margin-bottom: auto;">
                        <h3>{{$user->getName()}} {{$user->getSurname()}}</h3>
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-3" style="text-align: right; margin-top: auto; margin-bottom: auto;">
                        <h4>Dal: </h4>
                    </div>
                    <div class="col-md-3" style="text-align: right; margin-top: auto; margin-bottom: auto;">
                        <h4>Al: </h4>
                    </div>
                    <a data-toggle="collapse" href="{{'#multiCollapseExample' . $loop->index}}" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
                        <h2>
                            <i class="mdi mdi-arrow-down-drop-circle" style="color: black"></i>
                        </h2>
                    </a>
                    <div class="col-md-12">
                        <div class="collapse multi-collapse" id="{{'multiCollapseExample' . $loop->index}}">
                            <div class="card card-body" style="background: transparent">
                                <div class="row justify-content-center">
                                    @include('components.users.userInfo')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
