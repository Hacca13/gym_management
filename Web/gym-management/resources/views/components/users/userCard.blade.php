<div class="row">
    <div class="col-md-4">
        <div class="card" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7);">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-6" style="text-align: end">
                      <a data-toggle="collapse" href="#exerciseCollapse" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                          <i class="fas fa-times" style="font-size: 170%; color: red; margin-left: 2.5%"></i>
                      </a>
                  </div>
              </div>
              <div class="card-body">
                  <img src="https://staticfanpage.akamaized.net/wp-content/uploads/sites/21/2018/12/istock-925511340-638x425.jpg" class="img-fluid" alt="">
                  <h3 style="text-align: center; margin-top: 2.5%"></h3>
                  <hr>
              </div>
              <div class="row">
                  <div class="col-md-12 text-center">
                      <h3>{{$user->getName()}} {{$user->getSurname()}}</h3>
                  </div>
                  <div class="col-md-12 text-center"><!--CAMBIARE QUESTO HREF-->
                      Status : <?php if($user->getStatus()){ ?>
                                          Attivo
                               <?php }else{ ?>
                                          Disattivato
                               <?php } ?>
                      <?php

                        foreach ($coursesForUsers as $coursesForUser) {

                            if(data_get($coursesForUser,'idUser') == $user->getIdDatabase()){
                                if(count(data_get($coursesForUser,'courses')) != 0){
                                  $courses = data_get($coursesForUser,'courses');
                              ?>
                                I corsi a cui partecipa sono:
                                  <?php foreach ($courses as $course): ?>
                                      {{$course->getName()}}
                                  <?php endforeach; ?>
                              <?php
                              }
                            }
                        }
                       ?>

                  </div>
              </div>
            </div>
        </div>
    </div>
</div>
