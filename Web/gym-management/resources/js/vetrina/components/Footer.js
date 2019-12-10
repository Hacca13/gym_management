import React, {Component} from 'react';

import { fab } from '@fortawesome/free-brands-svg-icons';
import { library } from '@fortawesome/fontawesome-svg-core';

library.add(fab);

class Footer extends Component {
    render() {
        return (
            <footer id="Footer" style={{backgroundColor: "#1F262F"}}>
                <div className="container">

                    <div className="closer">

                        <div className="closing-claim" style={{backgroundColor: "rgba(0, 0, 15, 0.4)",  borderRadius: "10px", padding: "16px 32px"}}>

                            <h1>We launch leaders with big ideas</h1>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua.</p>

                        </div>

                    </div>
                </div>

                <div className="bg-angled-left"></div>

                <div className="bg-angled-right"></div>

                <div className="container footer-lockup">

                    <div className="red-angle"></div>

                    <div className="row">

                        <div className="col-lg-7">

                            <h3>Resources</h3>

                            <p>Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. In condimentum facilisis
                                porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper,
                                magna diam.</p>

                        </div>

                        <div className="col-lg-8">

                            <h3>About us</h3>

                            <p>Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. In condimentum facilisis
                                porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper,
                                magna diam.</p>

                        </div>

                        <div className="col-lg-5">

                            <div className="social-buttons">
                                <h1>Ciao</h1>
                                <a href="#"><i className="fab fa-facebook-f"></i></a>
                                <a href="#"><i className="fab fa-twitter"></i></a>
                                <a href="#"><i className="fab fa-instagram"></i></a>
                                <a href="#"><i className="fab fa-youtube"></i></a>
                                <a href="#"><i className="fab fa-linkedin-in"></i></a>
                            </div>


                        </div>

                    </div>


                </div>

                <div className="social-buttons">
                    <h1>Ciao</h1>
                    <a href="#"><i className="fab fa-facebook-f"></i></a>
                    <a href="#"><i className="fab fa-twitter"></i></a>
                    <a href="#"><i className="fab fa-instagram"></i></a>
                    <a href="#"><i className="fab fa-youtube"></i></a>
                    <a href="#"><i className="fab fa-linkedin-in"></i></a>
                </div>

            </footer>

    );
    }
}
export default Footer;
