import React, {Component} from 'react';
import {BrowserRouter, Route} from 'react-router-dom'
import NewTcard2 from "../views/newTcard2";
import ReactDOM from "react-dom";
import AddUserToCourse from "../views/addUserToCourse";
import InsertSubscription from "../views/insertSubscription";

let addUsrToCourse = (props) => {
    return <AddUserToCourse/>;
};

let InsertTCard = (props) => {
    return <NewTcard2/>;
};

let InsertSubs = (props) => {
    return <InsertSubscription/>;
};


class App extends Component {
    render() {

        return (
            <BrowserRouter>
                <div>
                    <Route exact path="/salvatore" component={addUsrToCourse} />
                    <Route exact path="/nuovaScheda" component={InsertTCard} />
                    <Route exact path="/nuovoAbbonamento" component={InsertSubs} />
                </div>
            </BrowserRouter>
        );
    }
}

export default App;

if (document.getElementById('index')) {
    ReactDOM.render(<App />, document.getElementById('index'));
}
