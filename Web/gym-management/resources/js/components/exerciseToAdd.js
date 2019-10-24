import React, {Component} from 'react';

class ExerciseToAdd extends Component {
    constructor(props) {
        super(props);
        this.state = {
            atTime: true,
            series: '',
            work: {
                min: '',
                sec: ''
            },
            rest: {
                min: '',
                sec: ''
            },
            day: 'Lunedì',
        }
    }


    componentDidUpdate(prevProps, prevState, snapshot) {
        if (prevState !== this.state) {
            this.props.retrieveState(this.state, this.props.indexed);
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
                                    <input name={"series" + this.props.indexed} type="number" value={this.state.series}
                                           onChange={event => {
                                               this.setState({
                                                   series: event.target.value
                                               })

                                           }}
                                           style={{width: '50%'}}/>
                                </div>

                                <div className="form-group">
                                    <label htmlFor="series">Tempo lavoro</label>
                                    <br/>
                                    <input name={"workMin" + this.props.indexed}
                                           value={this.state.work.min}
                                           onChange={event => {
                                               this.setState({
                                                   work: {
                                                       min: event.target.value,
                                                       sec: this.state.work.sec
                                                   }
                                               })
                                           }}
                                           type="number" style={{width: '40%'}}/>

                                    <h6>:</h6>

                                    <input name={"workSec" + this.props.indexed}
                                           value={this.state.work.sec}
                                           onChange={event => {
                                               this.setState({
                                                   work: {
                                                       sec: event.target.value,
                                                       min: this.state.work.min
                                                   }
                                               })
                                           }}
                                           type="number" style={{width: '40%'}}/>
                                </div>

                                <div className="form-group">
                                    <label htmlFor="series">Tempo riposo</label>
                                    <br/>
                                    <input name={"restMin" + this.props.indexed}
                                           value={this.state.rest.min}
                                           onChange={event => {
                                               this.setState({
                                                   rest: {
                                                       min: event.target.value,
                                                       sec: this.state.rest.sec
                                                   }
                                               });
                                           }}
                                           type="number" style={{width: '40%'}}/>

                                    <h6>:</h6>

                                    <input name={"restSec" + this.props.indexed}
                                           value={this.state.rest.sec}
                                           onChange={event => {
                                               this.setState({
                                                   rest: {
                                                       min: this.state.rest.min,
                                                       sec: event.target.value
                                                   }
                                               })
                                           }}
                                           type="number" style={{width: '40%'}}/>
                                </div>

                                <div className="form-group">
                                    <label htmlFor="select">Giorno</label>
                                    <select className="select2 form-control custom-select"
                                            name={"EerciseDay" + this.props.indexed}
                                            value={this.state.day}
                                            onChange={event => {
                                                this.setState({
                                                    day: event.target.value
                                                })
                                            }}
                                            style={{width: '100%' , height:'36px'}}>
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
