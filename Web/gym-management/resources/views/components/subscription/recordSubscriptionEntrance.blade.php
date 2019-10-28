<div class="col-md-12">
    <div class="card" style="border-radius: 10px;">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="card">
                        <div class="card-body wizard-content">
                            <form id="example-form" action="#" class="m-t-40">
                                <div>
                                    <section>
                                        <label for="userName">Abbonamento di: </label>
                                        <h1>name</h1>
                                    </section>
                                </div>
                                <div>
                                    <br>
                                    <label for="userName">Tipo di abbonamento:</label>
                                    <section>
                                        <input id="myCheck" onclick="Annuale()" name="acceptTerms" type="checkbox" class="required">
                                        <label for="acceptTerms">Annuale</label>
                                        <input id="entrata" onclick="Entrate()" name="acceptTerms" type="checkbox" class="required">
                                        <label for="acceptTerms">Entrate</label>
                                        <input id="corso" onclick="Corso()" name="acceptTerms" type="checkbox" class="required">
                                        <label for="acceptTerms">Corso</label>
                                    </section>
                                </div>
                                <br>
                                  @include('components.subscription.recordSubPeriod')
                                <div class="row">
                                    @include('components.subscription.recordSubCourse')
                                </div>
                               @include('components.subscription.recordSubEntrance')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
