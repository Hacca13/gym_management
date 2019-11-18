<div class="card-hover" style="border-radius: 10px;background-color: #d6d8d8" id="scroll" >
    <a data-toggle="collapse" href="#subPeriod" role="button" aria-expanded="false" onclick="border()" aria-controls="{{'multiCollapseExample' . $loop->index}}">
        <div class="card-body" >
            <div class="row">
                <div class="col-md-3" style="text-align: left; margin-top: auto; margin-bottom: auto;">
                    <h3>Mirko Al3erti</h3>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3" style="text-align: left; margin-top: auto; margin-bottom: auto;">
                    <h4>Dal: f23/03/2019</h4>
                </div>
                <div class="col-md-3" style="text-align: left; margin-top: auto; margin-bottom: auto;">
                    <h4>Al: 23/04/2019</h4>
                </div>
            </div>

        </div>
    </a>
</div>
<div class="col-md-12">
    <div class="collapse multi-collapse" id="subPeriod">
        <div class="card card-body"  style="background-color: #d6d8d8; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
            <div class="row justify-content-center">
                @include('components.subscription.subCourse')
            </div>
        </div>
    </div>
</div>
