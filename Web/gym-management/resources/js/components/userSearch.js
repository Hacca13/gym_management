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
            suggestions: []
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

    //SUGGESTION FUNCTIONS

    getSuggestions = (value, exer) => {
        const inputValue = value.trim().toLowerCase();
        const inputLength = inputValue.length;
        return inputLength === 0 ? [] : exer.filter(lang =>
            lang.surname.toLowerCase().slice(0, inputLength) === inputValue
        );
    };

    getSuggestionValue = suggestion => suggestion.surname;

    renderSuggestion = suggestion => (
        <div>
            {suggestion.name + ' ' + suggestion.surname + ' ' + suggestion.dateOfBirth}
        </div>
    );

    onSuggestionSelected = (event, { suggestion, suggestionValue, suggestionIndex, sectionIndex, method }) => {
        this.props.mirko('pelo');
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
            <Autosuggest
                suggestions={suggestions}
                onSuggestionsFetchRequested={this.onSuggestionsFetchRequested}
                onSuggestionsClearRequested={this.onSuggestionsClearRequested}
                getSuggestionValue={this.getSuggestionValue}
                renderSuggestion={this.renderSuggestion}
                inputProps={inputProps}
                onSuggestionSelected={this.onSuggestionSelected}

            />
        );
    }
}

export default UserSearch;
