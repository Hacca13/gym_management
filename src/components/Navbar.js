import React, {Component} from 'react';

import {Text, TouchableOpacity} from 'react-native';
import EvilIcons from "react-native-vector-icons/EvilIcons";
import AntDesign from "react-native-vector-icons/AntDesign";
import Header from '@freakycoder/react-native-header-view';


export default class Navbar extends Component {
    render() {
        return (
            <Header
                leftComponent={
                    <TouchableOpacity
                        onPress={() => { this.props.navigation.navigate('Home')}}>
                        <Text style={{color: 'blue', fontSize: 20, marginLeft: 5}}>
                            <AntDesign name="left" type="AntDesign" size={20} color="blue" />Back</Text>
                    </TouchableOpacity>
                }
                rightComponent={
                    <TouchableOpacity
                        onPress={() => { this.props.navigation.navigate('Profile')}}>
                        <EvilIcons name="user" type="EvilIcons" size={40} color="blue" style={{marginRight: 5}}/>
                    </TouchableOpacity>
                }
            />
        );
    }

}
