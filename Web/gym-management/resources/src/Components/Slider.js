import React, {Component} from 'react';
class Slider extends Component {
    render(){
        return(
            <section className="hero-slider" id="Slider">
                <div className="slide-items owl-carousel">
                    <div className="single-slide set-bg active" data-setbg="img/bg.jpg">
                        <a href="https://www.youtube.com/watch?v=SEVuD_djKrU" className="play-btn pop-up"><i
                            className="fa fa-play"></i></a>
                        <h1>Be Fit.Top Gym</h1>
                        <a href="#" className="primary-btn">Read More</a>
                    </div>
                    <div className="single-slide set-bg" data-setbg="img/bg-2.jpg">
                        <a href="https://www.youtube.com/watch?v=SEVuD_djKrU" className="play-btn pop-up"><i
                            className="fa fa-play"></i></a>
                        <h1>Be Fit.Top Trainer</h1>
                        <a href="#" className="primary-btn">Read More</a>
                    </div>
                    <div className="single-slide set-bg" data-setbg="img/bg-3.jpg">
                        <a href="https://www.youtube.com/watch?v=SEVuD_djKrU" className="play-btn pop-up"><i
                            className="fa fa-play"></i></a>
                        <h1>Be Fit.Top Body</h1>
                        <a href="#" className="primary-btn">Read More</a>
                    </div>
                </div>
            </section>
        );
    }
}
export default Slider;