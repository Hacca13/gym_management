import React, {Component} from 'react';
import {BrowserRouter, Route} from 'react-router-dom'
import NewTcard2 from "../views/newTcard2";
import AddUserToCourse from "../views/addUserToCourse";
import ReactDOM from "react-dom";

import InsertSubscription from "../views/insertSubscription";
import VetrinaHome from "../vetrina/vetrinaHome";
import UpdateTCard2 from "../views/updateTCard2";
import UpdateSubs from "../views/updateSubs";


let InsertTCard = (props) => {
    return <NewTcard2/>;
};

let InsertSubs = (props) => {
    return <InsertSubscription/>;
};

let InsertUserToCourse = (props) => {
    return <AddUserToCourse />;
};

let Vetrina = (props) => {
    return <VetrinaHome />;
};


let UpdateTCard = (props) => {
    return <UpdateTCard2 id={props.match.params.id}/>;
};


let UpdateSubscription = (props) => {
    return <UpdateSubs id={props.match.params.id}/>;
};

class App extends Component {
    render() {

        return (
            <BrowserRouter>
                <div>

                    <Route exact path="/" component={Vetrina} />
                    <Route exact path="/home" component={Vetrina} />
                    <Route exact path="/admin/nuovaScheda" component={InsertTCard} />
                    <Route exact path="/admin/nuovoAbbonamento" component={InsertSubs} />
                    <Route exact path="/admin/inserisciUtenteCorso" component={InsertUserToCourse} />
                    <Route exact path="/admin/modificaScheda/:id" component={UpdateTCard} />
                    <Route exact path="/admin/modificaAbbonamenti/:id" component={UpdateSubscription} />
                </div>
            </BrowserRouter>
        );
    }
}

export default App;

if (document.getElementById('index')) {
    ReactDOM.render(<App />, document.getElementById('index'));
}
