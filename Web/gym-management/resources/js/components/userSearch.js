import React, {Component} from 'react';
import Autosuggest from 'react-autosuggest';
import axios from "axios";

class UserSearch extends Component {

    constructor(props) {
        super(props);
        this.state = {
            value: '',
            exerr: [],
            userID: '',
            from: '',
            to: '',
            exercisesList: [],
            suggestions: [],
            visible: false,
        };

    }

    //COMPONENTS FUNCTIONS
    componentDidMount() {
        axios.get('/api/jsonUsers').then(value => {
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

    renderInputComponent = inputProps => (

        <div className="input-group">
            <div className="input-group-prepend">
                <span className="input-group-text" id="basic-addon1"><i className="fas fa-user"/></span>
            </div>
            <input type="text" className="form-control" placeholder="Prepend"aria-label="Username"
                   aria-describedby="basic-addon1" {...inputProps} style={{width: '80%'}}/>
        </div>

    );

    //SUGGESTION FUNCTIONS

    getSuggestions = (value, exer) => {
        const inputValue = value.trim().toLowerCase();
        const inputLength = inputValue.length;
        return inputLength === 0 ? [] : exer.filter(lang =>
            lang.surname.toLowerCase().slice(0, inputLength) === inputValue
        );
    };

    getSuggestionValue = suggestion => suggestion.surname;

    renderSuggestion = suggestion => {

        return (
            <div>
                <h4 style={{paddingTop: '2.4%'}}>{suggestion.name + ' ' + suggestion.surname + ' ' + suggestion.dateOfBirth}</h4>
                <hr/>
            </div>
        )
    }


    onSuggestionSelected = (event, { suggestion, suggestionValue, suggestionIndex, sectionIndex, method }) => {
        this.props.retrieveUser(suggestion);
        this.setState({
            value: suggestion.name + ' ' + suggestion.surname,
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


    render() {
        const { value, suggestions } = this.state;
        const inputProps = {
            type: "text",
            className: "form-control",
            placeholder: "Prepend",
            value,
            onChange: this.onChange,
        };

        const containerProps = {
            className: "card",
        };

        return (
            <Autosuggest
                suggestions={suggestions}
                onSuggestionsFetchRequested={this.onSuggestionsFetchRequested}
                onSuggestionsClearRequested={this.onSuggestionsClearRequested}
                getSuggestionValue={this.getSuggestionValue}
                renderSuggestion={this.renderSuggestion}
                inputProps={inputProps}
                onSuggestionSelected={this.onSuggestionSelected}
                renderInputComponent={this.renderInputComponent}
                renderSuggestionsContainer={this.renderSuggestionsContainer}
            />
        );
    }
}

export default UserSearch;
