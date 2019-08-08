import React, { Component } from 'react';

import {Text, TouchableOpacity, View} from 'react-native';
import Header from '@freakycoder/react-native-header-view';
import AntDesign from 'react-native-vector-icons/AntDesign';
var ls = require('react-native-local-storage');

// import styles from './styles';

export default class WorkoutNav extends Component {
    constructor(props) {
        super(props);
        this.state = {

        }
    }



    render() {
    return (
        <Header
            leftComponent={
                <TouchableOpacity
                    onPress={() => {
                        if (this.props.name)
                        this.props.navigation.goWorkoutList();
                        //this.props.navigation.pop()
                        }
                    }>
                    <Text style={{color: '#007AFF', fontSize: 20, marginLeft: 5}}>
                        <AntDesign name="left" type="AntDesign" size={20} color='#007AFF' />Indietro</Text>
                        <Text>{this.props.navigation.getParam('workID')}</Text>
                </TouchableOpacity>
            }




        />
    );
  }
}
