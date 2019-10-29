import React, {Component} from 'react';
import {BrowserRouter, Route} from 'react-router-dom'
import NewTcard2 from "./newTcard2";
import ReactDOM from "react-dom";
import AddUserToCourse from "./addUserToCourse";

let addUsrToCourse = (props) => {
    return <AddUserToCourse/>;
};

let InsertTCard = (props) => {
    return <NewTcard2/>;
};


class App extends Component {
    render() {

        return (
            <BrowserRouter>
                <div>
                    <Route exact path="/salvatore" component={addUsrToCourse} />
                    <Route exact path="/nuovaSched" component={InsertTCard} />
                </div>
            </BrowserRouter>
        );
    }
}

export default App;

if (document.getElementById('index')) {
    ReactDOM.render(<App />, document.getElementById('index'));
}
