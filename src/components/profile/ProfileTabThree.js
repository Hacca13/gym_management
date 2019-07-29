import React, { Component } from 'react';

import {Text, View} from 'react-native';

// import styles from './styles';

export default class ProfileTabThree extends Component {
    render() {
        return (
            <View style={{flexDirection: 'column', marginLeft: 20, marginTop: 10, paddingBottom: 10}}>

                <Text style={{color: '#007AFF'}}>Iscrizione</Text>
                <Text style={{fontSize: 25}}>15/07/2019</Text>

                <Text style={{color: '#007AFF'}}>Scadenza</Text>
                <Text style={{fontSize: 25}}>24</Text>

                <Text style={{color: '#007AFF'}}>Abbonamento</Text>
                <Text style={{fontSize: 25}}>Palestra</Text>

            </View>
        );
    }
}
