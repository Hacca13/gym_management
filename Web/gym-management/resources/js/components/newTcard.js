import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Autocomplete from 'react-autocomplete';
import ExerciseToAdd from "./exerciseToAdd";

class NewTcard extends Component {

    constructor(props) {
        super(props);
        this.state = {
            value: '',
            exerr: [
                {
                    id: 'fsefes',
                    name: 'Panca reclinata',
                    atTime: true,
                    reps: 5,
                    work: {
                        min: 0,
                        sec: 30
                    },
                    rest: {
                        min: 0,
                        sec: 30
                    }
                },
                {
                    id: 'lsngagm',
                    name: 'albicocca',
                    atTime: true,
                    reps: 5,
                    work: {
                        min: 0,
                        sec: 30
                    },
                    rest: {
                        min: 0,
                        sec: 30
                    }
                },

                 ],
            exercisesList: [
                /*
                {
                    id: 'fsefes',
                    name: 'Panca reclinata',
                    atTime: true,
                    reps: 5,
                    work: {
                        min: 0,
                        sec: 30
                    },
                    rest: {
                        min: 0,
                        sec: 30
                    }
                },
                {
                    id: 'lsngagm',
                    name: 'Panca reclinata',
                    atTime: true,
                    reps: 5,
                    work: {
                        min: 0,
                        sec: 30
                    },
                    rest: {
                        min: 0,
                        sec: 30
                    }
                },

                 */
            ],
        }
        this.removeExercise = this.removeExercise.bind(this);
    }

    componentDidMount() {
        axios.get('/api/jsonExercises').then(value => {
            this.setState({
                //exerr: value.data
            });
        }).catch(e => {
            console.log(e);
        })
    }

    addExercise(item) {
        let tmp_ex = this.state.exercisesList;
        let exer = {
            id: item.idDatabase,
            name: item.name,
            atTime: item.exerciseIsATime,
            reps: 5,
            work: {
                min: 0,
                sec: 30
            },
            rest: {
                min: 0,
                sec: 30
            }
        }
        tmp_ex.push(exer);
        this.setState({ exercisesList: tmp_ex})
        document.getElementById('modalBtn').click();

    }

    removeExercise(index) {
        let tmp_exercises = this.state.exercisesList;
        tmp_exercises.splice(index);
        this.setState({ exercisesList: tmp_exercises});
    }

    handleSubmit() {

    }

    render() {
        return (

            <div className="row justify-content-center">
                <div className="col-md-10">
                    <div className="card"
                         style={{borderRadius: '10px', backgroundColor: 'rgb(255, 255, 255,0.7)', marginBottom: '10%'}}>
                        <div className="card-header">
                            <div className="row">
                                <div className="col-md-8" style={{textAlign: 'left'}}>
                                    <h2>Inserisci Scheda</h2>
                                </div>
                            </div>
                        </div>
                        <div className="card-body">
                            <form onSubmit={this.handleSubmit}>

                                <div className="form-group row">
                                    <div className="col-sm-6">
                                        <label htmlFor="fname"
                                               className="col-sm-12 text-left control-label col-form-label">Scheda
                                            Di:</label>
                                        <input type="text" className="form-control" name="name"
                                               style={{borderRadius: '10px', backgroundColor: 'rgb(255, 255, 255,0.7)'}}/>
                                    </div>
                                    <div className="col-md-6">
                                        <button type="button" className="btn btn-primary margin-5"
                                                data-toggle="modal" data-target="#Modal1">Inserisci Esercizio
                                        </button>
                                    </div>
                                </div>

                                <div className="form-group row">
                                    <div className="col-sm-6">
                                        <label htmlFor="fname"
                                               className="col-sm-12 text-left control-label col-form-label">Dal:</label>
                                        <input type="date" className="form-control" name="from"
                                               style={{borderRadius: '10px', backgroundColor: 'rgb(255, 255, 255,0.7)'}}/>
                                    </div>

                                    <div className="col-md-6">
                                        <label htmlFor="fname"
                                               className="col-sm-12 text-left control-label col-form-label">Al:</label>
                                        <input type="date" className="form-control" name="to"
                                               style={{borderRadius: '10px', backgroundColor: 'rgb(255, 255, 255,0.7)'}}/>
                                    </div>
                                </div>

                            </form>

                            <div className="row">

                                <div className="col-md-12" style={{border: '1px red dotted'}}>
                                    {
                                        this.state.exercisesList.map(((value, index) => {
                                            return <ExerciseToAdd
                                                removeEx={this.removeExercise}
                                                name={value.name}
                                                indexed={index}
                                                key={index}
                                            />
                                        }))
                                    }

                                </div>

                            </div>

                            <div className="col-md-5">

                                <div className="modal fade" id="Modal1" tabIndex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true ">
                                    <div className="modal-dialog" role="document ">
                                        <div className="modal-content">
                                            <div className="modal-header">
                                                <h5 className="modal-title" id="exampleModalLabel">Popup
                                                    Header</h5>
                                                <button type="button" id="modalBtn" className="close"
                                                        data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true ">&times;</span>
                                                </button>
                                            </div>
                                            <div className="modal-body">
                                                <div className="container">

                                                    <div className='row justify-content-center'>

                                                        <Autocomplete
                                                            getItemValue={(item) => item.name}
                                                            items={this.state.exerr}
                                                            renderItem={(item, isHighlighted) =>
                                                                <div key={item.idDatabase} style={{ background: isHighlighted ? 'red' : 'white' }} className='card-body'>
                                                                    <h2>{item.name}</h2>
                                                                    <hr/>
                                                                </div>
                                                            }
                                                            value={this.state.value}
                                                            onChange={(e) => this.setState({value: e.target.value})}
                                                            menuStyle={{
                                                                borderColor: 'red'
                                                            }}
                                                            renderInput={
                                                                function(props) {
                                                                    return <div className="input-group input-lg">
                                                                        <div className="input-group-prepend">
                                                                            <span className="input-group-text" id="basic-addon1">
                                                                                <i className="fas fa-search"/>
                                                                            </span>
                                                                        </div>
                                                                        <input {...props} className="form-control"/>
                                                                    </div>
                                                                }
                                                            }
                                                            renderMenu={function(items, value) {
                                                                return <div
                                                                    className='col-md-12 card'
                                                                    style={{ ...this.menuStyle }} children={items}/>
                                                            }}
                                                            onSelect={(value, item) => {
                                                                this.addExercise(item);
                                                            }}
                                                        />

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

export default NewTcard;

if (document.getElementById('index')) {
    ReactDOM.render(<NewTcard />, document.getElementById('index'));
}


