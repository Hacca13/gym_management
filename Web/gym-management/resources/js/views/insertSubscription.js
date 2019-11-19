import React, {Component} from 'react';
import UserSearch from "../components/userSearch";
import DatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";
import CourseSearch from "../components/courseSearch";
import axios from "axios";


class InsertSubscription extends Component {
    constructor(props) {
        super(props);
        this.state = {
            userID: '',
            userName: '',
            annuale_from: '',
            annuale_to: '',
            corso_from: '',
            corso_to: '',
            courseID: '',
            courseName: '',
            typeOfSubs: 'period',
            numberOfEntries: 1
        };

        this.Entrate = this.Entrate.bind(this);
        this.Annuale = this.Annuale.bind(this);
        this.Corso = this.Corso.bind(this);
        this.addUser = this.addUser.bind(this);
        this.addCourse = this.addCourse.bind(this);
    }


    addUser(user) {
        this.setState({
            userID: user.idDatabase,
            userName: user.name + ' ' + user.surname
        })
    }

    Annuale() {

        this.setState({
            typeOfSubs: 'period'
        })

        var checkBox = document.getElementById("myCheck");

        var inizio = document.getElementById("inizio");

        var fine = document.getElementById("fine");

        if (checkBox.checked === true){
            inizio.style.display = "block";
            fine.style.display = "block";
            entrate.style.display = 'none';
            corsi.style.display = "none";
            iniziocorso.style.display = "none";
            finecorso.style.display = "none";
        } else {
            inizio.style.display = "none";
            fine.style.display = "none";
        }
    }

    Entrate() {

        this.setState({
            typeOfSubs: 'revenue'
        })

        var entrata = document.getElementById("entrata");

        var entrate = document.getElementById("entrate");

        if (entrata.checked === true){
            entrate.style.display = "block";
            corsi.style.display = "none";
            iniziocorso.style.display = "none";
            finecorso.style.display = "none";
            inizio.style.display = "none";
            fine.style.display = "none";
        } else {
            entrate.style.display = "none";
        }
    }

    Corso() {

        this.setState({
            typeOfSubs: 'course'
        })

        var corso = document.getElementById("corso");

        var course = document.getElementById("corsi");

        var iniziocorso = document.getElementById("iniziocorso");

        var finecorso = document.getElementById("finecorso");


        if (corso.checked === true){
            corsi.style.display = "block";
            iniziocorso.style.display = "block";
            finecorso.style.display = "block";
            entrate.style.display = 'none';
            inizio.style.display = "none";
            fine.style.display = "none";
        } else {
            corsi.style.display = "none";
            iniziocorso.style.display = "none";
            finecorso.style.display = "none";
        }
    }

    submitForm = event => {
        event.preventDefault();
        let subsToAdd = {
            idUserDatabase: this.state.userID,
            isActive: true,
        };
        switch (this.state.typeOfSubs) {
            case "period":
                subsToAdd = {
                    ...subsToAdd,
                    startDate: this.formatDate(this.state.annuale_from),
                    endDate: this.formatDate(this.state.annuale_to),
                    type: this.state.typeOfSubs
                };
                break;
            case "revenue":
                subsToAdd = {
                    ...subsToAdd,
                    numberOfEntries: this.state.numberOfEntries,
                    numberOfEntriesMade: 0,
                    type: this.state.typeOfSubs
                };
                break;
            case "course":
                subsToAdd = {
                    ...subsToAdd,
                    idCourseDatabase: this.state.courseID,
                    startDate: this.formatDate(this.state.corso_from),
                    endDate: this.formatDate(this.state.corso_to),
                    type: this.state.typeOfSubs
                };
                break;
        }

        axios.post('/api/insertSubscription', subsToAdd).then(response => {
            window.location.href = response.data;
        }).catch(err => {
            console.log(err);
        })

    };

    formatDate(date) {
        return date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
    }

    addCourse(course) {
        this.setState({
            courseID: course.idDatabase,
            courseName: course.name
        });
    }


    render() {

        const ExampleCustomInput = ({ value, onClick }) => (
            <div className="input-group">
                <div className="input-group-prepend">
                    <span className="input-group-text" id="basic-addon1"><i className='fas fa-calendar'/></span>
                </div>
                <input type="text" value={value} className="form-control" id={this.props.dateName} onClick={onClick} />
            </div>

        );
        return (
            <div className="col-md-12">
                <div className="card" style={{borderRadius: '10px', backgroundColor: 'rgb(31,30,45,0.8)'}}>
                    <div className="card-body">
                        <div className="col-md-12">
                            <h2 className="text-center" style={{color: '#d6d8d8'}}>Inserisci Dati Abbonamento</h2>
                        </div>
                        <div className="row">
                            <div className="col-md-12">
                                <div className="card" style={{borderRadius: '10px', backgroundColor: '#d6d8d8'}}>
                                    <div className="card-body">
                                        <br/>
                                        <br/>
                                        <form onSubmit={this.submitForm}>

                                            <div className="row">

                                                <div className="col-md-4">
                                                    <section>
                                                        <label htmlFor="userName" className="row">Abbonamento di: </label>
                                                        <UserSearch
                                                            retrieveUser={this.addUser}
                                                        />

                                                    </section>
                                                </div>

                                                <div className="col-md-12">

                                                    <br/>
                                                    <label htmlFor="userName" className="row">Tipo di abbonamento:</label>
                                                    <br/>
                                                    <section>
                                                        <div className="custom-control custom-radio">
                                                        <input id="myCheck" onClick={this.Annuale} name="acceptTerms" type="radio" className="required custom-control-input" style={{marginLeft: '2%'}}/>
                                                        <label htmlFor="myCheck" style={{marginLeft: '1%'}} className="custom-control-label" >Periodico</label>
                                                        </div>
                                                        <div className="custom-control custom-radio">
                                                        <input id="entrata" onClick={this.Entrate} name="acceptTerms" type="radio" className="required custom-control-input"style={{marginLeft: '2%'}}/>
                                                        <label htmlFor="entrata"style={{marginLeft: '1%'}} className="custom-control-label">Entrate</label>
                                                        </div>
                                                        <div className="custom-control custom-radio">
                                                        <input id="corso" onClick={this.Corso} name="acceptTerms" type="radio" className="required custom-control-input" style={{marginLeft: '2%'}}/>
                                                            <label htmlFor="corso"style={{marginLeft: '1%'}} className="custom-control-label">Corso</label>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                            <br/>

                                            <div className="row">

                                                <div className="col-md-6 text-left"  id="inizio" style={{display: 'none'}}>
                                                    <label>Inzio</label>
                                                    <div className="input-group">
                                                        <DatePicker
                                                            required={true}
                                                            selected={this.state.annuale_from}
                                                            onChange={date =>
                                                                this.setState({
                                                                    annuale_from: date
                                                                })}
                                                            dateFormat="dd/MM/yyyy"
                                                            customInput={<ExampleCustomInput
                                                                dateName={'inizio'}/>
                                                            }
                                                        />
                                                    </div>
                                                </div>

                                                <div className="col-md-6"  id="fine" style={{display: 'none'}}>
                                                    <label>Fine</label>
                                                    <div className="input-group">
                                                        <DatePicker
                                                            required={true}
                                                            selected={this.state.annuale_to}
                                                            onChange={date =>
                                                                this.setState({
                                                                    annuale_to: date
                                                                })}
                                                            dateFormat="dd/MM/yyyy"
                                                            customInput={<ExampleCustomInput
                                                                dateName={'fine'}/>
                                                            }
                                                        />
                                                    </div>
                                                </div>

                                            </div>

                                            <div className="row">
                                                <div className="col-md-6"  id="corsi" style={{display: 'none'}}>
                                                    <section>
                                                        <label htmlFor="userName" className="row">Nome corso: </label>
                                                        <CourseSearch
                                                            retrieveCourse={this.addCourse}
                                                        />
                                                    </section>
                                                </div>
                                                <div className="col-md-12"  id="iniziocorso" style={{display: 'none'}}>
                                                    <label>Inzio</label>
                                                    <div className="input-group">
                                                        <DatePicker
                                                            required={true}
                                                            selected={this.state.corso_from}
                                                            onChange={date =>
                                                                this.setState({
                                                                    corso_from: date
                                                                })}
                                                            dateFormat="dd/MM/yyyy"
                                                            customInput={<ExampleCustomInput
                                                                dateName={'iniziocorso'}/>
                                                            }
                                                        />
                                                    </div>
                                                </div>
                                                <div className="col-md-12"  id="finecorso" style={{display: 'none'}}>
                                                    <label>Fine</label>
                                                    <div className="input-group">
                                                        <DatePicker
                                                            required={true}
                                                            selected={this.state.corso_to}
                                                            onChange={date =>
                                                                this.setState({
                                                                    corso_to: date
                                                                })}
                                                            dateFormat="dd/MM/yyyy"
                                                            customInput={<ExampleCustomInput
                                                                dateName={'finecorso'}/>
                                                            }
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="row">
                                                <div className="col-md-6" id="entrate" style={{display: 'none'}}>
                                                    <div className="form-group">
                                                        <label htmlFor="exampleFormControlSelect1">Numero Entrate</label>
                                                        <select className="form-control" id="exampleFormControlSelect1"
                                                                value={this.state.numberOfEntries}
                                                                onChange={(event) => {
                                                                    event.preventDefault();
                                                                    this.setState({numberOfEntries: event.target.value})}}>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                            <div className="col-md-12 row">
                                                <p align="left">
                                                    <button id="corso" name="acceptTerms" className="btn btn-danger" style={{borderRadius: '10px'}}>Annulla</button>
                                                </p>
                                                <hr/>
                                                <p align="right">
                                                    <button type="submit" id="corso" name="acceptTerms" className="btn btn-success" style={{borderRadius: '10px'}}>Inserisci</button>
                                                </p>
                                            </div>
                                        </form>
                                        <br/>

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

    export default InsertSubscription;
