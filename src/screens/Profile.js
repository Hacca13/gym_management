import React, { Component } from 'react';

import {View, Text, Button, SafeAreaView, TouchableOpacity} from 'react-native';
import {Avatar, Divider, TextInput} from 'react-native-paper';
import avatar from './../assets/ProfileInfo.png'
import CardView from 'react-native-cardview'
import FontAwesome from "react-native-vector-icons/FontAwesome";
import Ionicons from 'react-native-vector-icons/Ionicons';


export default class Profile extends Component {
    constructor(props) {
        super(props);
        this.state = {
            active: 0
        }
    }

    changeTab(val) {
        this.setState({
            active: val
        })
    }

    render() {
        return (
            <SafeAreaView>
                <View style={{alignSelf: 'center', marginTop: 20}}>
                    <Avatar.Image size={148} source={avatar} />
                </View>

                <Divider style={{marginTop: 20}}/>

                <CardView
                    cardElevation={7}
                    cardMaxElevation={2}
                    cornerRadius={8}
                    style={{
                        marginTop: 20,
                        marginLeft: 24,
                        marginRight: 24,
                        backgroundColor: 'white'
                    }}>


                    <View style={{flexDirection: 'row', justifyContent: 'space-between'}}>

                        <View style={{marginLeft: 20, marginTop: 10}}>

                            <TouchableOpacity onPress={() => {this.changeTab(0)}}>
                                <FontAwesome name="user" type="FontAwesome" size={40} color={this.state.active === 0 ? 'blue' : 'grey'} />
                            </TouchableOpacity>
                        </View>

                        <View style={{marginTop: 10}}>
                            <TouchableOpacity onPress={() => {this.changeTab(1)}}>
                                <Ionicons name="md-clipboard" type="Ionicons" size={40} color={this.state.active === 1 ? 'blue' : 'grey'} />
                            </TouchableOpacity>
                        </View>

                        <View style={{marginRight: 20, marginTop: 10}}>
                            <TouchableOpacity onPress={() => {this.changeTab(2)}}>
                                <Ionicons name="md-apps" type="Ionicons" size={40} color={this.state.active === 2 ? 'blue' : 'grey'} />
                            </TouchableOpacity>
                        </View>

                    </View>
                </CardView>
            </SafeAreaView>
        );
    }
}








