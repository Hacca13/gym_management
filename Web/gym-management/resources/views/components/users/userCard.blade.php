<div class="card-hover" style="border-radius: 10px;background-color: #d6d8d8; margin-bottom: 2.5%; margin-top: 2.5%">
    <a data-toggle="collapse" href="{{'#multiCollapseExample' . $loop->index}}" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12" style="margin-top: auto; margin-bottom: auto;">
                    <h3>{{$user->getName()}} {{$user->getSurname()}}</h3>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12" style="text-align: center; margin-top: auto; margin-bottom: auto;">
                    @if($user->getStatus() == TRUE)
                        <h4 style="color: green">ATTIVO</h4>
                    @endif
                    @if($user->getStatus() == FALSE)
                        <h4 style="color: #D5300D">INATTIVO</h4>
                    @endif
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12" style="text-align: right; margin-top: auto; margin-bottom: auto;">
                    <h4>Nato il: {{$user->getDateOfBirth()}} </h4>
                </div>

            </div>
        </div>
    </a>
</div>
<div class="col-md-12" style="margin-top: -2.5%">
    <div class="collapse multi-collapse" id="{{'multiCollapseExample' . $loop->index}}">
        @include('components.users.userInfo')
    </div>
</div>
