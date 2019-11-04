import React, {Component} from 'react';
import UserSearch from "../components/userSearch";
import DatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";

class InsertSubscription extends Component {
    constructor(props) {
        super(props);
        this.state = {
            userID: '',
            userName: '',
            from: '',
            to: ''
        };

        this.Entrate = this.Entrate.bind(this);
        this.Annuale = this.Annuale.bind(this);
        this.Corso = this.Corso.bind(this);
        this.addUser = this.addUser.bind(this);
    }


    addUser(user) {
        this.setState({
            userID: user.idDatabase,
            userName: user.name + ' ' + user.surname
        })
    }

    Annuale() {
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
                <div className="card" style={{borderRadius: '10px', backgroundColor: '#d6d8d8'}}>
                    <div className="card-body">
                        <div className="row">
                            <div className="col-md-12">
                                <div className="card" style={{borderRadius: '10px', backgroundColor: '#d6d8d8'}}>
                                    <div className="card-body wizard-content">
                                        <div className="col-md-12">
                                            <h2 className="text-center">Inserisci Dati Abbonamento</h2>
                                        </div>
                                        <br/>
                                        <br/>
                                        <form id="example-form" action="#" className="m-t-40">

                                            <div>
                                                <section>
                                                    <label htmlFor="userName" className="row">Abbonamento di: </label>
                                                    <UserSearch
                                                        retrieveUser={this.addUser}
                                                    />

                                                </section>
                                            </div>

                                            <div>
                                                <br/>
                                                <label htmlFor="userName" className="row">Tipo di abbonamento:</label>
                                                <br/>
                                                <section>
                                                    <input id="myCheck" onClick={this.Annuale} name="acceptTerms" type="radio" className="required"/>
                                                    <label htmlFor="acceptTerms">Periodico</label>
                                                    <input id="entrata" onClick={this.Entrate} name="acceptTerms" type="radio" className="required"/>
                                                    <label htmlFor="acceptTerms">Entrate</label>
                                                    <input id="corso" onClick={this.Corso} name="acceptTerms" type="radio" className="required"/>
                                                    <label htmlFor="acceptTerms">Corso</label>
                                                </section>
                                            </div>
                                            <br/>

                                            <div className="row">

                                                <div className="col-md-6 text-left"  id="inizio" style={{display: 'none'}}>
                                                    <label>Inzio</label>
                                                    <div className="input-group">
                                                        <DatePicker
                                                            required={true}
                                                            selected={this.state.from}
                                                            onChange={date =>
                                                                this.setState({
                                                                    from: date
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
                                                            selected={this.state.to}
                                                            onChange={date =>
                                                                this.setState({
                                                                    to: date
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
                                                    <label>Nome Corso</label>
                                                    <div className="input-group">
                                                        <input type="text" className="form-control mydatepicker" placeholder=""/>
                                                        <div className="input-group-append">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-md-6"  id="iniziocorso" style={{display: 'none'}}>
                                                    <label>Inzio</label>
                                                    <div className="input-group">
                                                        <input type="text" className="form-control mydatepicker" placeholder="mm/dd/yyyy"/>
                                                        <div className="input-group-append">
                                                            <span className="input-group-text"><i className="fa fa-calendar"/></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-md-6"  id="finecorso" style={{display: 'none'}}>
                                                    <label>Fine</label>
                                                    <div className="input-group">
                                                        <input type="text" className="form-control mydatepicker" placeholder="mm/dd/yyyy"/>
                                                        <div className="input-group-append">
                                                            <span className="input-group-text"><i className="fa fa-calendar"/></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="row">
                                                <div className="col-md-6" id="entrate" style={{display: 'none'}}>
                                                    <div className="form-group">
                                                        <label htmlFor="exampleFormControlSelect1">Numero Entrate</label>
                                                        <select className="form-control" id="exampleFormControlSelect1">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <br/>
                                        <div className="col-md-12 row">
                                            <p align="left">
                                                <button id="corso" name="acceptTerms" className="btn btn-danger">Annulla</button>
                                            </p>
                                            <hr/>
                                            <p align="right">
                                                <button id="corso" name="acceptTerms" className="btn btn-success">Inserisci</button>
                                            </p>
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

export default InsertSubscription;
