import React, {Component} from 'react';
import {BrowserRouter, Route} from 'react-router-dom'
import NewTcard2 from "../views/newTcard2";
import AddUserToCourse from "../views/addUserToCourse";
import ReactDOM from "react-dom";

import InsertSubscription from "../views/insertSubscription";


let InsertTCard = (props) => {
    return <NewTcard2/>;
};

let InsertSubs = (props) => {
    return <InsertSubscription/>;
};

let insertUserToCourse = (props) => {
    return <AddUserToCourse />;
};


class App extends Component {
    render() {

        return (
            <BrowserRouter>
                <div>

                    <Route exact path="/admin/nuovaScheda" component={InsertTCard} />
                    <Route exact path="/admin/nuovoAbbonamento" component={InsertSubs} />
                    <Route exact path="/admin/inserisciUtenteCorso" component={insertUserToCourse} />

                </div>
            </BrowserRouter>
        );
    }
}

export default App;

if (document.getElementById('index')) {
    ReactDOM.render(<App />, document.getElementById('index'));
}
