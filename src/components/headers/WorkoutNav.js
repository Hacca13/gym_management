import React, { Component } from 'react';

import {Text, TouchableOpacity, View} from 'react-native';
import Header from '@freakycoder/react-native-header-view';
import AntDesign from 'react-native-vector-icons/AntDesign';

// import styles from './styles';

export default class WorkoutNav extends Component {
  render() {
    return (
        <Header
            leftComponent={
                <TouchableOpacity
                    onPress={() => { this.props.navigation.pop()}}>
                    <Text style={{color: '#007AFF', fontSize: 20, marginLeft: 5}}>
                        <AntDesign name="left" type="AntDesign" size={20} color='#007AFF' />Indietro</Text>
                </TouchableOpacity>
            }




        />
    );
  }
}
