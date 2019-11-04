import React, {Component} from 'react';
import UserSearch from "../components/userSearch";

class AddUserToCourse extends Component {
    render() {
        return (
            <div className="row justify-content-center">
                <div className="col-md-10">
                    <div className="card"
                         style={{borderRadius: '10px', backgroundColor: 'rgb(255, 255, 255,0.7)', marginBottom: '10%'}}>

                        <div className="card-header">
                            <div className="row">
                                <div className="col-md-8" style={{textAlign: 'left'}}>
                                    <h2>Aggiugi utente ad un corso</h2>
                                </div>

                                <UserSearch mirko={console.log() }/>

                            </div>
                        </div>



                        <div className="card-body">

                        </div>

                    </div>
                </div>
            </div>
        );
    }
}

export default AddUserToCourse;
