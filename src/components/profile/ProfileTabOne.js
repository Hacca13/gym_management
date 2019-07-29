import React, { Component } from 'react';

import {Text, View} from 'react-native';

// import styles from './styles';

export default class ProfileTabOne extends Component {
    render() {
        return (
            <View style={{flexDirection: 'column', marginLeft: 20, marginTop: 10, paddingBottom: 10}}>

                <Text style={{color: '#007AFF'}}>Nome</Text>
                <Text style={{fontSize: 25}}>Mirko</Text>

                <Text style={{color: '#007AFF'}}>Cognome</Text>
                <Text style={{fontSize: 25}}>Aliberti</Text>

                <Text style={{color: '#007AFF'}}>Età</Text>
                <Text style={{fontSize: 25}}>24</Text>

                <Text style={{color: '#007AFF'}}>Email</Text>
                <Text style={{fontSize: 25}}>urbs@gmail.com</Text>

                <Text style={{color: '#007AFF'}}>Telefono</Text>
                <Text style={{fontSize: 25}}>333-7656543</Text>

            </View>
        );
    }
}
