@extends('layouts.master')

@section('template')

    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

            @include('components.sidebar')

            <div class="main-panel">


                @include('components.nav')

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">

                            @include('coursesList')

                        </div>
                    </div>
                </div>


                @include('components.footer')
            </div>
        </div>
    </div>
@endsection
