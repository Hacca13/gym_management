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
                         style={{borderRadius: '10px', backgroundColor: 'rgb(255, 255, 255,0.7)', marginBottom: '10%'}}>

                        <form onSubmit={this.submitForm}>

                            <div className="card-header">
                                <div className="row">
                                    <div className="col-md-8" style={{textAlign: 'left'}}>
                                        <h2>Aggiugi utente ad un corso</h2>
                                    </div>
                                </div>
                            </div>

                            <div className="card-body">

                                <div className="col-md-6" >
                                    <h3>Utente</h3>
                                    <UserSearch retrieveUser={this.addUser}/>
                                </div>

                                <div className="col-md-6" >
                                    <h3>Corso</h3>
                                    <CourseSearch retrieveCourse={this.addCourse}/>
                                </div>

                                <div>

                                    <button type="submit">Inserisci</button>

                                </div>

                            </div>


                        </form>
                    </div>
                </div>
            </div>
        );
    }
}

export default AddUserToCourse;
