import React, { Component } from 'react';

import {Text, View} from 'react-native';
import firebase from "react-native-firebase";
// import styles from './styles';

export default class ProfileTabOne extends Component {
    constructor(props) {
        super(props);

    }



    render() {
        return (
            <View style={{flexDirection: 'column', marginLeft: 20, marginTop: 10, paddingBottom: 10}}>

                <Text style={{color: '#007AFF'}}>Nome</Text>
                <Text style={{fontSize: 25}}>{this.props.userInfo ? this.props.userInfo['Nome'] : ' '}</Text>

                <Text style={{color: '#007AFF'}}>Cognome</Text>
                <Text style={{fontSize: 25}}>{this.props.userInfo ? this.props.userInfo['Cognome'] : ' '}</Text>

                <Text style={{color: '#007AFF'}}>Età</Text>
                <Text style={{fontSize: 25}}>{this.props.userInfo ? this.props.userInfo['DataNascita'] : ' '}</Text>

                <Text style={{color: '#007AFF'}}>Email</Text>
                <Text style={{fontSize: 25}}>{this.props.userInfo ? this.props.userInfo['Email'] : ' '}</Text>

                <Text style={{color: '#007AFF'}}>Telefono</Text>
                <Text style={{fontSize: 25}}>{this.props.userInfo ? this.props.userInfo['Telefono'] : ' '}</Text>

            </View>
        );
    }
}
