<div class="row">
    <div class="col-md-6" style="text-align: start">
        <a href="modificaEsercizio">
            <i class="fas fa-edit" style="font-size: 150%; color: black;"></i>
        </a>
    </div>
    <div class="col-md-6" style="text-align: end">
        <a data-toggle="collapse" href="#exerciseCollapse" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
            <i class="fas fa-times" style="font-size: 170%; color: red; margin-left: 2.5%"></i>
        </a>
    </div>
</div>
<div class="card-body">
    <img src="../images/lombari.png" class="img-fluid" alt="">
    <h3 style="text-align: center; margin-top: 2.5%"></h3>
    <hr>
</div>
<div class="row">
    <div class="col-md-12 text-center">
        <h3>CRISTONE</h3>
    </div>
    <div class="col-md-12 text-center"><!--CAMBIARE QUESTO HREF-->
        <a data-toggle="collapse" href="#multiCollapseExample3" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                <h5 style="text-align: center">Info <i class="fa fa-angle-downphp"></i></h5>
        </a>
    </div>
</div><!--E ANCHE QUESTO ID-->
<div class="collapse multi-collapse" id="multiCollapseExample3">
    @include('components.exercise.descriptionEx')
</div>
