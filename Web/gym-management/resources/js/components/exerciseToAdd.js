import React, {Component} from 'react';

class ExerciseToAdd extends Component {
    constructor(props) {
        super(props);
        this.state = {
            atTime: true,
            numberOfSeries: '1',
            weight: '1',
            numberOfRepetitions: '1',
            rest: {
                min: '1',
                sec: '0'
            },
            day: 'Lunedi',
        }
    }


    componentDidUpdate(prevProps, prevState, snapshot) {
        if (prevState !== this.state) {
            this.props.retrieveState(this.state, this.props.indexed);
        }
    }

    componentDidMount() {
        if (this.props.currEx !== false) {
            this.setState({
                atTime: this.props.currEx.atTime,
                numberOfSeries: this.props.currEx.numberOfSeries,
                weight: this.props.currEx.weight,
                numberOfRepetitions: this.props.currEx.numberOfRepetitions,
                rest: {
                    min: this.props.currEx.rest.min,
                    sec: this.props.currEx.rest.sec
                },
                day: this.props.currEx.day
            })
        }
    }

    render() {
        return (
            <div className="card" style={{borderRadius: '10px', backgroundColor: '#d6d8d8', marginTop: '2%'}}>
                <div className="card-header row justify-content-between">
                    <div className="col-md-8">
                        <h3>{this.props.name}</h3>
                    </div>
                    <div className="col-md-2" style={{textAlign: 'right'}}>
                        <button onClick={() => {this.props.removeEx(this.props.indexed)}} className="bttn-material-circle bttn-sm bttn-danger">
                            <i className="fas fa-times"/>
                        </button>
                    </div>

                </div>
                <div className="card-body">

                    <div className="row">



                        <div className="col-md-6" style={{borderRight: '1px solid gray'}}>

                            <div className="form-group row justify-content-center">
                                <label htmlFor="userName">Numero Serie :</label>
                                <div className="col-md-12 col-sm-12 text-center">
                                    <input name={"series" + this.props.indexed} type="number" value={this.state.numberOfSeries}
                                           onChange={event => {
                                               this.setState({
                                                   numberOfSeries: event.target.value
                                               })
                                           }}
                                           style={{width: '30%'}}
                                    />
                                </div>
                            </div>

                            <div className="form-group row justify-content-center">
                                <label htmlFor="userName">Peso:</label>
                                <div className="col-md-12 col-sm-12 text-center">
                                    <input name={"weight" + this.props.indexed}
                                           value={this.state.weight}
                                           onChange={event => {
                                               this.setState({
                                                   weight: event.target.value
                                               })
                                           }}
                                           type="number" style={{width: '30%'}}/>
                                </div>


                            </div>
                            <div className="form-group row justify-content-center">
                                <label htmlFor="userName">Ripetizioni:</label>
                                <div className="col-md-12 col-sm-12 text-center">

                                    <input name={"reps" + this.props.indexed}
                                           value={this.state.numberOfRepetitions}
                                           onChange={event => {
                                               this.setState({
                                                   numberOfRepetitions: event.target.value
                                               })
                                           }}
                                           type="number" style={{width: '30%'}}/>
                                </div>

                            </div>

                        </div>


                        <div className="col-md-6 text-center" style={{borderLeft: '1px solid gray'}}>
                            <label htmlFor="userName">Giorno :</label>
                            <div className="form-group row justify-content-center">
                                <div className="col-md-6 col-sm-6">
                                    <select className="select2 form-control custom-select"
                                            name={"EerciseDay" + this.props.indexed}
                                            value={this.state.day}
                                            onChange={event => {
                                                this.setState({
                                                    day: event.target.value
                                                })
                                            }}
                                            style={{width: '100%' , height:'36px'}}>
                                        <option>Lunedi</option>
                                        <option>Martedi</option>
                                        <option>Mercoledi</option>
                                        <option>Giovedi</option>
                                        <option>Venerdi</option>
                                        <option>Sabato</option>
                                        <option>Domenica</option>
                                    </select>
                                </div>

                            </div>

                            <div className="form-group row justify-content-center">
                                <label htmlFor="userName">Tempo Riposo:</label>
                                <div className="col-md-12 col-sm-12 row justify-content-center">

                                    <div className="col-md-5" style={{textAlign: 'right'}}>
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
                                               type="number" style={{width: '50%'}}/>
                                    </div>


                                    <h4>:</h4>
                                    <div className="col-md-5">

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
                                               type="number" style={{width: '50%'}}/>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>



                </div>


            </div>

        );
    }
}

export default ExerciseToAdd;
