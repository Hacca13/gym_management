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
            courseID: [],
            courseName: [],
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
            console.log(err.message);
        })

    };

    formatDate(date) {
        return date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
    }

    addCourse(course) {
        let coursesID=[];
        let coursesName=[];
        coursesID.push(course.idDatabase);
        coursesName.push(course.name);
        this.setState({
            courseID: coursesID,
            courseName: coursesName
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
                <div className="card" style={{borderRadius: '10px', backgroundColor: 'rgb(31,38,45,0.8)'}}>
                    <div className="card-body">
                        <div className="col-md-12">
                            <h2 className="text-center" style={{color: '#d6d8d8'}}>Inserisci dati abbonamento</h2>
                        </div>
                        <div className="row"
                             style={{marginTop: '2.5%'}}>
                            <div className="col-md-12">
                                <div className="card" style={{borderRadius: '10px', backgroundColor: '#d6d8d8'}}>
                                    <div className="card-body">

                                        <form onSubmit={this.submitForm}>

                                            <div className="row justify-content-center">

                                                <div className="col-lg-8 col-md-12 col-sm-12" style={{textAlign: "center"}}>
                                                    <section>
                                                        <label htmlFor="userName" className="col-form-label" style={{backgroundColor: 'transparent', border: 'none', color: 'rgb(31, 38, 45, 0.8)', fontSize: '18px'}}>Abbonamento di: </label>
                                                        <UserSearch
                                                            retrieveUser={this.addUser}
                                                        />

                                                    </section>
                                                </div>

                                                <div className="col-lg-8 col-md-12 col-sm-12" style={{textAlign: "center"}}>

                                                    <br/>
                                                    <label htmlFor="userName" className="col-form-label" style={{backgroundColor: 'transparent', border: 'none', color: 'rgb(31, 38, 45, 0.8)', fontSize: '18px'}}>Tipo di abbonamento:</label>
                                                    <br/>
                                                    <section>
                                                        <div className="row justify-content-center">
                                                            <div className="custom-control custom-radio" style={{marginRight: '5%'}}>
                                                                <input id="myCheck" onClick={this.Annuale} name="acceptTerms" type="radio" className="required custom-control-input"/>
                                                                <label htmlFor="myCheck" className="custom-control-label" style={{fontSize: '15px'}}>Periodico</label>
                                                            </div>
                                                            <div className="custom-control custom-radio" style={{marginRight: '5%'}}>
                                                                <input id="entrata" onClick={this.Entrate} name="acceptTerms" type="radio" className="required custom-control-input"/>
                                                                <label htmlFor="entrata" className="custom-control-label" style={{fontSize: '15px'}}>Entrate</label>
                                                            </div>
                                                            <div className="custom-control custom-radio" style={{marginRight: '5%'}}>
                                                                <input id="corso" onClick={this.Corso} name="acceptTerms" type="radio" className="required custom-control-input"/>
                                                                <label htmlFor="corso" className="custom-control-label" style={{fontSize: '15px'}}>Corso</label>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                            <br/>

                                            <div className="row justify-content-center">
                                                <div className="col-md-4" id="inizio" style={{display: 'none'}}>
                                                    <label style={{color: 'rgb(31, 38, 45, 0.8)', fontSize: '13px'}}>Inzio</label>
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

                                                <div className="col-md-4"  id="fine" style={{display: 'none'}}>
                                                    <label style={{color: 'rgb(31, 38, 45, 0.8)', fontSize: '13px'}}>Fine</label>
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

                                            <div className="row justify-content-center">
                                                <div className="col-md-12 col-lg-9 col-sm-12"  id="corsi" style={{display: 'none'}}>
                                                    <section>
                                                        <label htmlFor="userName" className="row" style={{color: 'rgb(31, 38, 45, 0.8)', fontSize: '13px'}}>Nome corso: </label>
                                                        <CourseSearch
                                                            retrieveCourse={this.addCourse}
                                                        />
                                                    </section>
                                                </div>
                                                <div className="col-md-6 col-lg-4 col-sm-12"  id="iniziocorso" style={{display: 'none'}}>
                                                    <label style={{color: 'rgb(31, 38, 45, 0.8)', fontSize: '13px'}}>Inzio</label>
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
                                                <div className="col-md-6 col-lg-4 col-sm-12"  id="finecorso" style={{display: 'none'}}>
                                                    <label style={{color: 'rgb(31, 38, 45, 0.8)', fontSize: '13px'}}>Fine</label>
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

                                            <div className="row justify-content-center">
                                                <div className="col-md-2" id="entrate" style={{display: 'none'}}>
                                                    <div className="form-group">
                                                        <label htmlFor="exampleFormControlSelect1" style={{color: 'rgb(31, 38, 45, 0.8)', fontSize: '13px'}}>Numero Entrate</label>
                                                        <input className="form-control" type="number"
                                                                value={this.state.numberOfEntries}
                                                                onChange={(event) => {
                                                                    event.preventDefault();
                                                                    this.setState({numberOfEntries: event.target.value})}}>
                                                        </input>
                                                    </div>
                                                </div>

                                            </div>

                                            <div className="form-group row" style={{padding: '10px 0 0 0'}}>
                                                <div className="col-lg-6 col-md-6 col-sm-12">
                                                    <p align="center">
                                                        <button id="corso" name="acceptTerms" className="btn btn-danger" style={{borderRadius: '10px'}}>Annulla</button>
                                                    </p>
                                                </div>
                                                <div className="col-lg-6 col-md-6 col-sm-12">
                                                    <p align="center">
                                                        <button type="submit" id="corso" name="acceptTerms" className="btn btn-success" style={{borderRadius: '10px'}}>Inserisci</button>
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
        );
    }
}

export default InsertSubscription;
