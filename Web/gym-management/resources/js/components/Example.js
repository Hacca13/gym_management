import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Autocomplete from 'react-autocomplete';


export default class Example extends Component {

    constructor(props) {
        super(props);
        this.state = {
            value: '',
            exercises: ''
        }
    }



    componentDidMount() {
        axios.get('/api/jsonExercises').then(value => {
            this.setState({
                exercises: value.data
            });
        }).catch(e => {
            console.log(e);
        })
    }


    render() {
        return (
            <div className="container">

                <div className='row justify-content-center'>

                    <Autocomplete
                        getItemValue={(item) => item.name}
                        items={this.state.exercises}
                        renderItem={(item, isHighlighted) =>
                            <div style={{ display: isHighlighted ? 'block' : 'none' }} className='card-body'>
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
                        onSelect={function (value, item) {
                            document.getElementById('modalBtn').click();
                        }}
                    />

                </div>
            </div>
        );
    }


}

if (document.getElementById('index')) {
    ReactDOM.render(<Example />, document.getElementById('index'));
}
