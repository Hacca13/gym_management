<div class="row justify-content-center" style="margin-top: 2.5%">

    <div class="col-md-10">

        <div class="card" style="border-radius: 10px;">

            @for($i=0;$i<3;$i++)
                <div class="card-body">

                    <div class="row">


                        <div class="col-md-4" style="margin-top: auto; margin-bottom: auto;">
                            <h3>CORSO ZUMBA</h3>
                        </div>
                        <div class="col-md-1">
                        </div>

                        <div class="col-md-3" style="text-align: right; margin-top: auto; margin-bottom: auto;">

                            <h4>Dal: 23/03/2019</h4>

                        </div>

                        <div class="col-md-3" style="text-align: right; margin-top: auto; margin-bottom: auto;">

                            <h4>Al: 23/04/2019</h4>

                        </div>


                        <a data-toggle="collapse" href="{{'#multiCollapseExample' . $i}}" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $i}}">
                            <h2>
                                <i class="mdi mdi-arrow-down-drop-circle" style="color: black"></i>
                            </h2>
                        </a>
                        <div class="col-md-12">
                            <div class="collapse multi-collapse" id="{{'multiCollapseExample' . $i}}">
                                <div class="card card-body">
                                    <div class="row justify-content-center">
                                        @include('components.courses.courseInfo')
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>




                </div>
            @endfor
        </div>

    </div>




</div>
