import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Autocomplete from 'react-autocomplete';
import Autosuggest from 'react-autosuggest';
import ExerciseToAdd from "./exerciseToAdd";
import ExerciseToAddByTime from "./exerciseToAddByTime";
import UserSearch from "./userSearch";

class NewTcard2 extends Component {

    constructor(props) {
        super(props);
        this.state = {
            value: '',
            exerr: [],
            userID: '',
            from: '',
            to: '',
            exercisesList: [],
            suggestions: []
        };
        this.removeExercise = this.removeExercise.bind(this);
        this.returnInfo = this.returnInfo.bind(this);
        this.addUser = this.addUser.bind(this);
    }

    //COMPONENTS FUNCTIONS
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

    //FORM FUNCTIONS
    onChange = (event, { newValue }) => {
        this.setState({
            value: newValue
        });

    };

    handleSubmit = event => {
        event.preventDefault();
        axios.post('/api/insertTrainCard', {
            idUserDatabase: this.state.userID,
            exercises: this.state.exercisesList,
            period: {
                startDate: this.state.from,
                endDate: this.state.to
            }

        }).then(response => {
            window.location.href = response.data;
        })
            .catch(e => {
                console.log(e);
            });
    }

    addUser(user) {
        console.log(user)
    }

    //EXERCISES FUNCTIONS

    addExercise(suggest) {
        let tmp_ex = this.state.exerr;
        let ind = tmp_ex.findIndex(ex => ex.name === suggest);
        let toAdd = {
            idExerciseDatabase: tmp_ex[ind].idDatabase,
            name: tmp_ex[ind].name,
            atTime: tmp_ex[ind].exerciseIsATime,
            numberOfRepetitions: '',
            workoutTime: {
                minutes: '',
                seconds: ''
            },
            restTime: {
                minutes: '',
                seconds: ''
            },
            day: '',
            gif: tmp_ex[ind].gif,
            description: tmp_ex[ind].description,
            link: tmp_ex[ind].link
        };
        let temp_arr = this.state.exercisesList;
        temp_arr.push(toAdd);
        this.setState({ exercisesList: temp_arr, suggest: [], value: ''});

    }

    removeExercise(index) {
        let tmp_exercises = this.state.exercisesList;
        delete tmp_exercises[index];
        this.setState({ exercisesList: tmp_exercises});
    }

    returnInfo(item, index) {
        let tmp_exercises = this.state.exercisesList;
        let tmp_exercise = this.state.exercisesList[index];
        tmp_exercise.numberOfRepetitions = item.series;
        tmp_exercise.workoutTime = {
            minutes: item.work.min,
            seconds: item.work.sec
        };
        tmp_exercise.restTime = {
            minutes: item.rest.min,
            seconds: item.rest.sec
        };
        tmp_exercise.day = item.day;
        this.setState({
            exercisesList: tmp_exercises
        });
    }

    //SUGGESTION FUNCTIONS

    getSuggestions = (value, exer) => {
        const inputValue = value.trim().toLowerCase();
        const inputLength = inputValue.length;
        return inputLength === 0 ? [] : exer.filter(lang =>
            lang.name.toLowerCase().slice(0, inputLength) === inputValue
        );
    };

    getSuggestionValue = suggestion => suggestion.name;

    renderSuggestion = suggestion => (
        <div>
            {suggestion.name + ' ' + suggestion.surname}
        </div>
    );

    onSuggestionSelected = (event, { suggestion, suggestionValue, suggestionIndex, sectionIndex, method }) => {
        this.addExercise(suggestionValue);
        this.setState({
            value: '',
            suggestion: []
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




    render() {
        const { value, suggestions } = this.state;
        const inputProps = {
            placeholder: 'es. Plank, Panca Reclinata',
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

                        <UserSearch
                            mirko={this.addUser}
                        />

                        <div className="card-body">
                            <form onSubmit={this.handleSubmit}>
                                <div className="form-group row">
                                    <div className="col-sm-6">
                                        <label htmlFor="fname"
                                               className="col-sm-12 text-left control-label col-form-label">Scheda
                                            Di:</label>
                                        <input type="text" className="form-control" name="userID"
                                               value={this.state.userID}
                                               onChange={event => (
                                                   this.setState({
                                                       userID: event.target.value
                                                   })
                                               )}
                                               style={{borderRadius: '10px', backgroundColor: 'rgb(255, 255, 255,0.7)'}}/>
                                    </div>

                                </div>

                                <div className="form-group row">
                                    <div className="col-sm-6">
                                        <label htmlFor="fname"
                                               className="col-sm-12 text-left control-label col-form-label">Dal:</label>
                                        <input type="date" pattern="\d{1,2}/\d{1,2}/\d{4}" className="form-control" name="from"
                                               value={this.state.from}
                                               onChange={event => (
                                                   this.setState({
                                                       from: event.target.value
                                                   })
                                               )}
                                               style={{borderRadius: '10px', backgroundColor: 'rgb(255, 255, 255,0.7)'}}/>
                                    </div>

                                    <div className="col-md-6">
                                        <label htmlFor="fname"
                                               className="col-sm-12 text-left control-label col-form-label">Al:</label>
                                        <input type="date" className="form-control" name="to" pattern="\d{1,2}/\d{1,2}/\d{4}"
                                               value={this.state.to}
                                               onChange={event => (
                                                   this.setState({
                                                       to: event.target.value
                                                   })
                                               )}
                                               style={{borderRadius: '10px', backgroundColor: 'rgb(255, 255, 255,0.7)'}}/>
                                    </div>
                                </div>

                                <br/>
                                <div className="row justify-content-center">
                                    <div className="col-md-6 text-center">
                                        <h4>Inserisci esercizio</h4>
                                        <div className="row justify-content-center">
                                            <div className="col-md-8 text-center">
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

                                    <div className="col-md-6 text-center">
                                        <button type="submit" className="bttn-pill bttn-success bttn-md">Inserisci scheda</button>
                                    </div>



                                    <div className="col-md-12">
                                        {
                                            this.state.exercisesList.reverse().map(((value, index) => {
                                                return <ExerciseToAddByTime removeEx={this.removeExercise}
                                                                            name={value.name}
                                                                            indexed={index}
                                                                            key={index}
                                                                            retrieveState={this.returnInfo}/>
                                                /*
                                                <ExerciseToAdd
                                                    removeEx={this.removeExercise}
                                                    name={value.name}
                                                    indexed={index}
                                                    key={index}
                                                    retrieveState={this.returnInfo}
                                                />

                                                 */
                                            }))
                                        }

                                    </div>

                                </div>


                            </form>
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


