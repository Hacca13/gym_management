import React, {Component} from 'react';
import "react-alice-carousel/lib/alice-carousel.css";
import AliceCarousel from 'react-alice-carousel';

class NavBar extends Component{


    render(){
        return(
            <header>
                <div className="fixed-navbar">

                    <div className="navbar-lockup">

                        <div className="logo">

                            <a href=""><img src="assets/img/rsz_fit&fight_ok.png" style={{width: '100%'}} alt="Fit & Fight"/></a>

                        </div>

                        <ul className="nav">

                            <li><a href="#Body">Cosa offriamo</a></li>
                            <li><a href="#Body2">Un po' di noi</a></li>
                            <li><a href="#Footer">Dove trovarci</a></li>

                        </ul>

                    </div>

                </div>
                <div className="claim-lockup">
                    <AliceCarousel autoPlay={true} autoPlayInterval={4000}>
                        <img src="assets/img/bnw-27.jpg" alt=""/>
                        <img src="assets/img/bnw-32.jpg" alt=""/>
                        <img src="assets/img/bnw-6.jpg" alt=""/>
                        <img src="assets/img/bnw-25.jpg" alt=""/>
                        <img src="assets/img/bnw-16.jpg" alt=""/>
                        <img src="assets/img/bnw-33.jpg" alt=""/>
                    </AliceCarousel>
                    <div className="claim" style={{backgroundColor: "rgba(0, 0, 15, 0.4)",  borderRadius: "10px", padding: "16px 32px"}}>
                        <p className="headline">Fitness In A Can<span>/</span></p>
                        <p className="kicker">Yes You Can<span>/</span></p>
                    </div>
                </div>




                <div className="angled-overlay"></div>

                <div className="slide-out-nav">

                    <ul className="mobile-nav">

                        <li><a href="#Body">Cosa offriamo</a></li>
                        <li><a href="#Body2">Un po' di noi</a></li>
                        <li><a href="#Footer">Dove trovarci</a></li>

                    </ul>

                    <div className="mobile-nav-slice"></div>

                </div>

                <div className="mobile-nav-toggle">

                    <span></span>
                    <span></span>
                    <span></span>

                </div>

            </header>

        );
    }
}


export default NavBar;
