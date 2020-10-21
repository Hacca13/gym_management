import React, {Component} from 'react';
import axios from "axios";
import UserSearch from "../components/userSearch";
import DatePicker from "react-datepicker";
import Autosuggest from "react-autosuggest";
import ExerciseToAddByTime from "../components/exerciseToAddByTime";
import ExerciseToAdd from "../components/exerciseToAdd";
import moment from "moment";

class UpdateTCard2 extends Component {
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
            visible: false,
            isActive: true,
            user: ''
        };
        this.removeExercise = this.removeExercise.bind(this);
        this.returnInfo = this.returnInfo.bind(this);
        this.addUser = this.addUser.bind(this);
    }

    retrieveData = () => {
        axios.get('/api/updateTCard/' + this.props.id).then(value => {
            this.setState({
                exercisesList: value.data[0].exercises,
                isActive: value.data[0].isActive,
                userName: value.data[2].name + ' ' + value.data[2].surname,
                userID: value.data[3],
                to: moment(value.data[0].period.endDate, "DD/MM/YYYY").toDate(),
                from: moment(value.data[0].period.startDate, "DD/MM/YYYY").toDate()
            })
        }).catch(e => {
            console.log(e);
        }).then(() => {
            axios.get('/api/jsonExercises').then(value => {
                this.setState({
                    exerr: value.data
                })
            })
        })
    }

    //COMPONENTS FUNCTIONS
    componentDidMount() {
        this.retrieveData()
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
        axios.post('/api/updatePostTCard/' + this.props.id , {
            idUserDatabase: this.state.userID,
            exercises: this.state.exercisesList,
            isActive: this.state.isActive,
            period: {
                startDate: this.formatDate(this.state.from),
                endDate: this.formatDate(this.state.to)
            }
        }).then(response => {
            alert(response.data);
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
                day: 'Lunedì',
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
                day: 'Lunedì',
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
        let deleted = tmp_exercises.filter((elem, index2) => {
            if (index2 !== index) {
                return elem
            }
        })
        //delete tmp_exercises[index];
        this.setState({ exercisesList: deleted});
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
                                <h2 className="text-center" style={{color: '#d6d8d8'}}>Modifica scheda</h2>
                            </div>


                            <div className="row justify-content-center">
                                <div className="col-md-12">
                                    <div className="card" style={{borderRadius: '10px', backgroundColor: '#d6d8d8'}}>
                                        <div className="card-body">
                                            <form onSubmit={this.handleSubmit}>

                                                <div className="form-group row justify-content-center">
                                                    <div className="col-sm-12 col-md-12 col-lg-6">
                                                        <label htmlFor="fname"
                                                               className="col-sm-12 text-left control-label col-form-label">Utente</label>
                                                        <UserSearch
                                                            currentUser={this.state.userName}
                                                            retrieveUser={this.addUser}/>

                                                    </div>


                                                    <div className="col-md-12 col-sm-12 col-lg-6">
                                                        <div className="form-group row">
                                                            <div className="col-sm-12 col-md-6">
                                                                <label htmlFor="fname"
                                                                       className="col-sm-12 control-label col-form-label">Data inizio</label>
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
                                                                       className="col-sm-12 control-label col-form-label">Data fine</label>
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
                                                        <label htmlFor="fname" className="col-sm-12 control-label col-form-label">Esercizio</label>
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
                                                                                                currEx={value}
                                                                    />
                                                                } else {
                                                                    return  <ExerciseToAdd
                                                                        removeEx={this.removeExercise}
                                                                        name={value.name}
                                                                        indexed={index}
                                                                        key={index}
                                                                        retrieveState={this.returnInfo}
                                                                        currEx={value}
                                                                    />
                                                                }
                                                            }))
                                                        }

                                                    </div>

                                                </div>

                                                <br></br>
                                                <div className="form-group row">
                                                    <div className="col-md-6">
                                                        <p align="center">
                                                            <a onClick={() => window.location.reload()}  className="btn btn-danger" style={{borderRadius: '10px', color: 'white'}}>Annulla</a>
                                                        </p>
                                                    </div>
                                                    <div className="col-md-6">
                                                        <p align="center">
                                                            <button id="corso" name="acceptTerms" className="btn btn-success" style={{borderRadius: '10px'}}>Modifica Scheda</button>
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

export default UpdateTCard2;
