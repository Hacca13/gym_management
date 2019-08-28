@extends('layouts.master')

@section('content')


        <div class="row">
            <div class="col-md-12" style="text-align: center">
                <h1>Corsi</h1>
            </div>

            <div class="col-md-12">

                <div class="row">

                    <div class="col-md-6">
                        <form>
                            <div class="form-row align-items-center">
                                <form class="navbar-form" role="search">
                                    <div class="input-group add-on" >
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" type="submit"><i class="pe-7s-search" style="font-size: 150%"></i></button>
                                        </div>
                                        <input class="form-control" placeholder="" name="srch-term" id="srch-term" type="text">

                                    </div>
                                </form>
                            </div>

                    </div>

                    <div class="col-md-6">

                    </div>

                </div>

            </div>


        </div>



@endsection
