import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Autocomplete from 'react-autocomplete';
import ExerciseToAdd from "./exerciseToAdd";
import Autosuggest from 'react-autosuggest';

class NewTcard2 extends Component {

    constructor(props) {
        super(props);
        this.state = {
            value: '1',
            exerr: [],
            exercisesList: [],
            suggestions: [],
            no: 1
        };
        this.removeExercise = this.removeExercise.bind(this);
        this.returnInfo = this.returnInfo.bind(this);
        this.myRef = React.createRef();
    }

    componentDidMount() {
        axios.get('/api/jsonExercises').then(value => {
            this.setState({
                exerr: value.data
            });
        }).catch(e => {
            console.log(e);
        }).then(() => {
        })

    }

    addExercise(suggest) {
        let tmp_ex = this.state.exerr;
        let ind = tmp_ex.findIndex(ex => ex.name === suggest);
        let toAdd = {
            id: tmp_ex[ind].idDatabase,
            name: tmp_ex[ind].name,
            atTime: tmp_ex[ind].exerciseIsATime,
            reps: '',
            work: {
                min: '',
                sec: ''
            },
            rest: {
                min: '',
                sec: ''
            }
        }
        let temp_arr = this.state.exercisesList;
        temp_arr.push(toAdd);
        this.setState({ exercisesList: temp_arr});
        document.getElementById('modalBtn').click();
    }

    onChange = (event, { newValue }) => {
        this.setState({
            value: newValue
        });

    };

    removeExercise(index) {
        let tmp_exercises = this.state.exercisesList;
        delete tmp_exercises[index];
        this.setState({ exercisesList: tmp_exercises});
    }

    getSuggestions = (value, exer) => {
        const inputValue = value.trim().toLowerCase();
        const inputLength = inputValue.length;
        return inputLength === 0 ? [] : exer.filter(lang =>
            lang.name.toLowerCase().slice(0, inputLength) === inputValue
        );
    };

// When suggestion is clicked, Autosuggest needs to populate the input
// based on the clicked suggestion. Teach Autosuggest how to calculate the
// input value for every given suggestion.
    getSuggestionValue = suggestion => suggestion.name;

// Use your imagination to render suggestions.
    renderSuggestion = suggestion => (
        <div>
            {suggestion.name}
        </div>
    );

    handleSubmit() {

    }

    onSuggestionSelected = (event, { suggestion, suggestionValue, suggestionIndex, sectionIndex, method }) => {
        this.addExercise(suggestionValue);
        this.setState({
            value: ''
        });
    };

    onSuggestionsFetchRequested = ({value}) => {
        this.setState({
            suggestions: this.getSuggestions(value, this.state.exerr)
        });
    };

    onSuggestionsClearRequested = () => {
        this.setState({
            suggestions: []
        });
    };


    returnInfo(item, index) {


    }

    render() {
        const { value, suggestions } = this.state;
        const inputProps = {
            placeholder: 'Type a programming language',
            value,
            onChange: this.onChange
        };
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
                                                retrieveState={this.returnInfo}
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
                                                    Headfewfwer</h5>
                                                <button type="button" id="modalBtn" className="close"
                                                        data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true ">&times;</span>
                                                </button>
                                            </div>
                                            <div className="modal-body">
                                                <div className="container">

                                                    <div className='row justify-content-center'>

                                                        <Autosuggest
                                                            suggestions={suggestions}
                                                            onSuggestionsFetchRequested={this.onSuggestionsFetchRequested}
                                                            onSuggestionsClearRequested={this.onSuggestionsClearRequested}
                                                            getSuggestionValue={this.getSuggestionValue}
                                                            renderSuggestion={this.renderSuggestion}
                                                            inputProps={inputProps}
                                                            onSuggestionSelected={this.onSuggestionSelected}
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

export default NewTcard2;

if (document.getElementById('index')) {
    ReactDOM.render(<NewTcard2 />, document.getElementById('index'));
}


