
    <div class="col-md-4">

        <div class="card" style="border-radius: 10px">

            <div class="card-header">

                <div class="row">

                    <div class="col-md-6" style="text-align: start">
                        <a href="#">
                            <i class="fas fa-edit" style="font-size: 150%; color: black;"></i>
                        </a>

                    </div>

                    <div class="col-md-6" style="text-align: end">

                        <a href="exc">
                            <i class="fas fa-times" style="font-size: 170%; color: red; margin-left: 2.5%"></i>
                        </a>





                    </div>

                </div>

            </div>

            <div class="card-body">

                <img src="../images/lombari.png" class="img-fluid" alt="">

                <h3 style="text-align: center; margin-top: 2.5%">{{$ex->getName()}}</h3>

                <p>{{$ex->getDescription()}}</p>

                <hr>

                <h4><a href="{{$ex->getLink()}}">{{$ex->getLink()}}</a></h4>

            </div>

        </div>

    </div>
