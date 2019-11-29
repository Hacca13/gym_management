import React, {Component} from 'react';
import $ from 'jquery';
import NavBar from "../../src/Components/NavBar";
import BodyG from "../../src/Components/BodyG";
import Search from "../../src/Components/Search";
import Footer from "../../src/Components/Footer";

class VetrinaHome extends Component {


    componentDidMount() {
        $( document ).ready(function() {

            angleCalc();

        });

        $(window).scroll(function(){

            var wScroll = $(this).scrollTop();

            if (wScroll > ($(this).height() / 3)) {

                $('.fixed-navbar, .navbar-lockup').addClass('nav-fix');

            }

            else {

                $('.fixed-navbar, .navbar-lockup').removeClass('nav-fix');

            }

        });

        $('.mobile-nav-toggle').click(function(){
            if (!($(this).hasClass('nav-open'))) {

                $(this).addClass('nav-open');

                $('.slide-out-nav, .fixed-navbar, .mobile-shift').addClass('nav-open');

            }

            else {

                $(this).removeClass('nav-open');

                $('.slide-out-nav, .fixed-navbar, .mobile-shift').removeClass('nav-open');

            }

        });

        function angleCalc() {

            var opposite = $('.slide-out-nav').height(),
                adjacent = $('.slide-out-nav').width(),
                radian = Math.atan(opposite / adjacent),
                angle = (90 - radian * (180 / Math.PI)) * -1;

            $('.mobile-nav-slice').css({

                'transform' : 'rotate('+ angle +'deg)'

            });

        }
    }

    render(){
        return(
            <div>
                <NavBar/>
                <BodyG/>
                <Search/>
                <BodyG/>

                <Footer/>
            </div>
        );
    }
}

export default VetrinaHome;
