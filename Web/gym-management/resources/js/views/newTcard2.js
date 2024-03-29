import React, {Component} from 'react';
import axios from 'axios';
import Autosuggest from 'react-autosuggest';
import ExerciseToAdd from "../components/exerciseToAdd";
import ExerciseToAddByTime from "../components/exerciseToAddByTime";
import UserSearch from "../components/userSearch";
import DatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";

class NewTcard2 extends Component {

    constructor(props) {
        super(props);
        this.state = {
            value: '',
            exerr: [],
            userName: '',
            userID: '',
            exercisesList: [],
            suggestions: [],
            from: new Date(),
            to: new Date(),
            visible: false
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

    handleChange = date => {
        this.setState({
            startDate: date
        });
    };

    handleSubmit = event => {
        event.preventDefault();
        axios.post('/api/insertTrainCard', {
            idUserDatabase: this.state.userID,
            exercises: this.state.exercisesList,
            period: {
                startDate: this.formatDate(this.state.from),
                endDate: this.formatDate(this.state.to)
            }
        }).then(response => {
            window.location.href = response.data;
        }).catch(e => {
            console.log(e);
        });
    }

    addUser(user) {
        this.setState({
            userID: user.idDatabase,
            userName: user.name + ' ' + user.surname
        })
    }

    //EXERCISES FUNCTIONS

    addExercise(suggest) {
        let tmp_ex = this.state.exerr;
        let ind = tmp_ex.findIndex(ex => ex.name === suggest);
        let toAdd;
        if (tmp_ex[ind].exerciseIsATime) {
            toAdd = {
                idExerciseDatabase: tmp_ex[ind].idDatabase,
                name: tmp_ex[ind].name,
                atTime: tmp_ex[ind].exerciseIsATime,
                numberOfSeries: '',
                work: {
                    min: '',
                    sec: ''
                },
                rest: {
                    min: '',
                    sec: ''
                },
                day: '',
                gif: tmp_ex[ind].gif,
                description: tmp_ex[ind].description,
                link: tmp_ex[ind].link
            };
        } else {
            toAdd = {
                idExerciseDatabase: tmp_ex[ind].idDatabase,
                name: tmp_ex[ind].name,
                atTime: tmp_ex[ind].exerciseIsATime,
                numberOfRepetitions: '',
                weight: '',
                numberOfSeries: '',
                rest: {
                    min: '',
                    sec: ''
                },
                day: '',
                gif: tmp_ex[ind].gif,
                description: tmp_ex[ind].description,
                link: tmp_ex[ind].link
            };
        }
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
        tmp_exercise.numberOfSeries = item.numberOfSeries;
        if(tmp_exercise.atTime) {
            tmp_exercise.work = {
                min: item.work.min,
                sec: item.work.sec
            };
            tmp_exercise.rest = {
                min: item.rest.min,
                sec: item.rest.sec
            };
        } else {
            tmp_exercise.weight = item.weight;
            tmp_exercise.numberOfRepetitions = item.numberOfRepetitions;
            tmp_exercise.rest = {
                min: item.rest.min,
                sec: item.rest.sec
            };
        }
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

    renderSuggestion = suggestion => {

        return (
            <div>
                <h4 style={{paddingTop: '2.4%'}}>{suggestion.name}</h4>
                <hr/>
            </div>
        )
    }

    onSuggestionSelected = (event, { suggestion, suggestionValue, suggestionIndex, sectionIndex, method }) => {
        this.addExercise(suggestionValue);
        this.setState({
            value: '',
            suggestion: [],
            visible: false
        });
    };

    onSuggestionsFetchRequested = ({value}) => {
        this.setState({
            suggestions: this.getSuggestions(value, this.state.exerr),
            visible: true
        });
    };

    onSuggestionsClearRequested = () => {
        this.setState({
            suggestions: [],
            visible: false
        });
    };

    renderInputComponent = inputProps => (

        <div className="input-group">
            <div className="input-group-prepend">
                <span className="input-group-text" id="basic-addon1"><i className="fas fa-user"/></span>
            </div>
            <input type="text" className="form-control" placeholder="Prepend"aria-label="Username"
                   aria-describedby="basic-addon1" {...inputProps} style={{width: '80%'}}/>
        </div>

    );

    renderSuggestionsContainer = ({ containerProps, children, query }) => (
        <div {...containerProps}
             style={{
                 display: this.state.visible ? 'block' : 'none',
                 backgroundColor: 'white',
                 paddingBottom: '2%',
                 paddingTop: '2%'
             }}>
            {children}

        </div>
    );

    formatDate(date) {
        return date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
    }

    setFrom(date) {
        this.setState({
            from: date
        })
    }

    render() {
        const { value, suggestions } = this.state;
        const inputProps = {
            placeholder: 'es. Plank, Panca Reclinata',
            value,
            onChange: this.onChange
        };

        const ExampleCustomInput = ({ value, onClick }) => (
            <div className="input-group">
                <div className="input-group-prepend">
                    <span className="input-group-text" id="basic-addon1"><i className='fas fa-calendar'/></span>
                </div>
                <input type="text" value={value} className="form-control" onClick={onClick} />
            </div>

        );

        return (
            <div className="row justify-content-center">
                <div className="col-md-12">
                    <div className="card"
                         style={{borderRadius: '10px', backgroundColor: 'rgb(31, 38, 45,0.8)'}}>
                        <div className="card-body">
                            <div className="col-md-12">
                                <h2 className="text-center" style={{color: '#d6d8d8'}}>Inserisci nuova scheda</h2>
                            </div>


                            <div className="row justify-content-center">
                                <div className="col-md-12">
                                    <div className="card" style={{borderRadius: '10px', backgroundColor: '#d6d8d8'}}>
                                        <div className="card-body">
                                            <form onSubmit={this.handleSubmit}>

                                                <div className="form-group row justify-content-center">
                                                    <div className="col-sm-12 col-md-12 col-lg-6">
                                                        <label htmlFor="fname"
                                                               className="col-sm-12 text-left control-label col-form-label" style={{backgroundColor: 'transparent', border: 'none', color: '#1F262D'}}>Utente</label>
                                                        <UserSearch
                                                            retrieveUser={this.addUser}
                                                        />
                                                    </div>
                                                    <div className="col-md-12 col-sm-12 col-lg-6">
                                                        <div className="form-group row">
                                                            <div className="col-sm-12 col-md-6">
                                                                <label htmlFor="fname"
                                                                       className="col-sm-12 control-label col-form-label" style={{backgroundColor: 'transparent', border: 'none', color: '#1F262D'}}>Data inizio</label>
                                                                <DatePicker
                                                                    required={true}
                                                                    selected={this.state.from}
                                                                    onChange={date =>
                                                                        this.setState({
                                                                            from: date
                                                                        })}
                                                                    dateFormat="dd/MM/yyyy"
                                                                    customInput={<ExampleCustomInput
                                                                        fromOrTo={true}
                                                                    />}
                                                                />
                                                            </div>
                                                            <div className="col-sm-12 col-md-6">
                                                                <label htmlFor="fname"
                                                                       className="col-sm-12 control-label col-form-label" style={{backgroundColor: 'transparent', border: 'none', color: '#1F262D'}}>Data fine</label>
                                                                <DatePicker
                                                                    required={true}
                                                                    selected={this.state.to}
                                                                    onChange={date =>
                                                                        this.setState({
                                                                            to: date
                                                                        })}
                                                                    dateFormat="dd/MM/yyyy"
                                                                    customInput={<ExampleCustomInput
                                                                        fromOrTo={false}/>
                                                                    }
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-12 col-md-10 col-lg-6">
                                                        <label htmlFor="fname" className="col-sm-12 control-label col-form-label" style={{backgroundColor: 'transparent', border: 'none', color: '#1F262D'}}>Esercizio</label>
                                                        <Autosuggest
                                                            suggestions={suggestions}
                                                            onSuggestionsFetchRequested={this.onSuggestionsFetchRequested}
                                                            onSuggestionsClearRequested={this.onSuggestionsClearRequested}
                                                            getSuggestionValue={this.getSuggestionValue}
                                                            renderSuggestion={this.renderSuggestion}
                                                            inputProps={inputProps}
                                                            onSuggestionSelected={this.onSuggestionSelected}
                                                            renderSuggestionsContainer={this.renderSuggestionsContainer}
                                                            renderInputComponent={this.renderInputComponent}
                                                        />
                                                    </div>
                                                </div>

                                                <div className="form-group row">

                                                    <div className="col-md-12">
                                                        {
                                                            this.state.exercisesList.map(((value, index) => {
                                                                if (value.atTime) {
                                                                    return <ExerciseToAddByTime removeEx={this.removeExercise}
                                                                                                name={value.name}
                                                                                                indexed={index}
                                                                                                key={index}
                                                                                                retrieveState={this.returnInfo}
                                                                                                currEx={false}
                                                                    />
                                                                } else {
                                                                    return  <ExerciseToAdd
                                                                        removeEx={this.removeExercise}
                                                                        name={value.name}
                                                                        indexed={index}
                                                                        key={index}
                                                                        retrieveState={this.returnInfo}
                                                                        currEx={false}
                                                                    />
                                                                }

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

                                                <br></br>
                                                <div className="form-group row">
                                                    <div className="col-md-6">
                                                        <p align="center">
                                                            <button id="corso" name="acceptTerms" className="btn btn-danger" style={{borderRadius: '10px'}}>Annulla</button>
                                                        </p>
                                                    </div>
                                                    <div className="col-md-6">
                                                        <p align="center">
                                                            <button id="corso" name="acceptTerms" className="btn btn-success" style={{borderRadius: '10px'}}>Inserisci Scheda</button>
                                                        </p>
                                                    </div>
                                                </div>
                                            </form>
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



