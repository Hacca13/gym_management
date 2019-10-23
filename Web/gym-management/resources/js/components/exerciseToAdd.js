import React, {Component} from 'react';

class ExerciseToAdd extends Component {
    constructor(props) {
        super(props);
        this.state = {
            atTime: true
        }

    }

    render() {
        return (

            <div className="card">

                <div className="card-body row justify-content-center">

                    <div className="col-md-6">
                        <h4>{this.props.name}</h4>
                        <hr/>
                        <img src="https://firebasestorage.googleapis.com/v0/b/fitandfight.appspot.com/o/Kick%20Boxing.png?alt=media&token=a547e100-168a-4374-9754-f8779c9da9d7"
                             className="img-fluid" alt=""/>
                    </div>

                    <div className="col-md-4 text-center" style={{borderLeft: '0.5px grey solid'}}>
                        <br/>
                        {
                            this.state.atTime &&
                            <div>
                                <div className="form-group">
                                    <label htmlFor="series">Numero serie</label>
                                    <br/>
                                    <input name="series" type="number" style={{width: '50%'}}/>
                                </div>

                                <div className="form-group">
                                    <label htmlFor="series">Tempo lavoro</label>
                                    <br/>
                                    <input name="series" type="number" style={{width: '40%'}}/>
                                    <h6>:</h6>
                                    <input name="series" type="number" style={{width: '40%'}}/>
                                </div>

                                <div className="form-group">
                                    <label htmlFor="series">Tempo riposo</label>
                                    <br/>
                                    <input name="series" type="number" style={{width: '40%'}}/>
                                    <h6>:</h6>
                                    <input name="series" type="number" style={{width: '40%'}}/>
                                </div>

                                <div className="form-group">
                                    <label htmlFor="select">Giorno</label>
                                        <select className="select2 form-control custom-select" id="select"
                                                name="singleDay1" style={{width: '100%' , height:'36px'}}>
                                            <option>Lunedì</option>
                                            <option>Martedì</option>
                                            <option>Mercoledì</option>
                                            <option>Giovedì</option>
                                            <option>Venerdì</option>
                                            <option>Sabato</option>
                                        </select>
                                    </div>
                            </div>
                        }
                    </div>

                    <div className="col-md-2 text-right">

                        <button onClick={() => {this.props.removeEx(this.props.indexed)}} className="bttn-material-circle bttn-sm bttn-danger">
                            <i className="fas fa-times"/>
                        </button>

                    </div>



                </div>

            </div>

        );
    }
}

export default ExerciseToAdd;
