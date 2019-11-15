import React, {Component} from 'react';
import UserSearch from "../components/userSearch";
import CourseSearch from "../components/courseSearch";
import axios from 'axios';

class AddUserToCourse extends Component {
    constructor(props) {
        super(props);
        this.state = {
            user: '',
            course: ''
        }
        this.addUser = this.addUser.bind(this);
        this.addCourse = this.addCourse.bind(this);
    }

    addUser(user) {
        this.setState({user});
    }

    addCourse(course) {
        this.setState({course});
    }

    submitForm = event => {
        event.preventDefault();
        if (this.state.user !== '' && this.state.course !== '') {
            axios.post('/api/insertUserToCourse', {
                user: this.state.user.idDatabase,
                course: this.state.course.idDatabase
            }).then(response => {
                window.location.href = response.data;
            }).catch(err => {
                console.log(err.message);
            })
        }

    };

    render() {
        return (
            <div className="row justify-content-center">
                <div className="col-md-10">
                    <div className="card"
                         style={{borderRadius: '10px', backgroundColor: 'rgb(30, 31, 45,0.8)', marginBottom: '10%'}}>
                        <div className="card-body">

                                <div className="col-md-12">
                                    <h2 className="text-center" style={{color: '#d6d8d8'}}>Aggiugi Utente Ad Un Corso</h2>
                                </div>

                            <form onSubmit={this.submitForm}>
                                <div className="card" style={{borderRadius: '10px', backgroundColor: '#d6d8d8'}}>
                                    <div className="card-body">

                                        <div className="col-md-6" >
                                            <h3>Utente</h3>
                                            <UserSearch retrieveUser={this.addUser}/>
                                        </div>
                                        <br></br>
                                        <div className="col-md-6" >
                                            <h3>Corso</h3>
                                            <CourseSearch retrieveCourse={this.addCourse}/>
                                        </div>

                                        <div>
                                            <br></br>
                                            <br></br>
                                            <div className="col-md-6 row ">
                                                <button id="corso" name="acceptTerms" className="btn btn-success" style={{borderRadius: '10px', marginLeft: '2%'}}>Inserisci Utente</button>
                                            </div>
                                        </div>

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

export default AddUserToCourse;
