import React, {Component} from 'react';
import AliceCarousel from "react-alice-carousel";
import "react-alice-carousel/lib/alice-carousel.css";

class Services extends Component{
    render() {
        const handleOnDragStart = e => e.preventDefault()

        return(

                        <AliceCarousel responsive={{
                            0: {
                                items: 3
                            },
                            1024: {
                                items: 3
                            }
                        }}>


                            <div className="card" onDragStart={handleOnDragStart}>
                                <div className="card-body">
                                    <div className="single-service">
                                        <img src="img/icon-1.png" alt=""/>
                                        <h4>Pilates</h4>
                                        <p>Pellentesque dictum nisl in nibh dictum volutpat nec a quam. Vivamus suscipit nisl quis nulla
                                            pretium.</p>
                                    </div>
                                </div>
                            </div>


                        </AliceCarousel>

        );
    }
}
export default Services;
