<div class="card-hover" style="border-radius: 10px;background-color: #d6d8d8">
    <a data-toggle="collapse" href="{{'#multiCollapseExample' . $loop->index}}" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4" style="margin-top: auto; margin-bottom: auto;">
                    <h3>{{$user->getName()}} {{$user->getSurname()}}</h3>
                </div>
                <div class="col-md-3" style="text-align: center; margin-top: auto; margin-bottom: auto;">
                    @if($user->getStatus() == TRUE)
                        <h4>ATTIVO</h4>
                    @endif
                    @if($user->getStatus() == FALSE)
                        <h4>INATTIVO</h4>
                    @endif
                </div>
                <div class="col-md-1">
                </div>
                <div class="col-md-3" style="text-align: right; margin-top: auto; margin-bottom: auto;">
                    <h4>{{$user->getDateOfBirth()}} </h4>
                </div>

            </div>
        </div>
    </a>
</div>
<div class="col-md-12">
    <div class="collapse multi-collapse" id="{{'multiCollapseExample' . $loop->index}}" style="border-radius: 0px">
        <div class="card card-body" style="background-color: #d6d8d8;">
            <div class="row justify-content-center">

                @include('components.users.userInfo')
            </div>
        </div>
    </div>
</div>
