import React, { Component } from 'react';

import {View, Text, ScrollView, SafeAreaView, TouchableOpacity, Platform} from 'react-native';
import {Avatar, Divider, TextInput} from 'react-native-paper';
import avatar from './../assets/ProfileInfo.png'
import CardView from 'react-native-cardview'
import Ionicons from 'react-native-vector-icons/Ionicons';
import ProfileTabOne from '../components/profile/ProfileTabOne';
import ProfileTabTwo from '../components/profile/ProfileTabTwo';
import ProfileTabThree from '../components/profile/ProfileTabThree';

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
                <ScrollView>
                    <View style={{alignSelf: 'center', marginTop: 20}}>
                        <Avatar.Image size={148} source={avatar} />
                    </View>
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

                        <View>
                            <View style={{flexDirection: 'row', justifyContent: 'space-between'}}>

                                <View style={{marginLeft: 40, marginTop: 10}}>

                                    <TouchableOpacity onPress={() => {this.changeTab(0)}}>
                                        <Ionicons name={Platform.OS === 'ios' ? 'ios-person' : 'md-person'} type="FontAwesome" size={40} color={this.state.active === 0 ? '#007AFF' : 'grey'} />
                                    </TouchableOpacity>
                                </View>

                                <View style={{marginTop: 10}}>
                                    <TouchableOpacity onPress={() => {this.changeTab(1)}}>
                                        <Ionicons name={Platform.OS === 'ios' ? 'ios-clipboard' : 'md-clipboard'} type="Ionicons" size={40} color={this.state.active === 1 ? '#007AFF' : 'grey'} />
                                    </TouchableOpacity>
                                </View>

                                <View style={{marginRight: 40, marginTop: 10}}>
                                    <TouchableOpacity onPress={() => {this.changeTab(2)}}>
                                        <Ionicons name={Platform.OS === 'ios' ? 'ios-apps' : 'md-apps'} type="Ionicons" size={40} color={this.state.active === 2 ? '#007AFF' : 'grey'} />
                                    </TouchableOpacity>
                                </View>


                            </View>

                            <View style={{paddingLeft: 15, paddingRight: 15, marginTop: 10}}><Divider/></View>

                            { this.state.active === 0 && <ProfileTabOne/> }

                            { this.state.active === 1 && <ProfileTabTwo/> }

                            { this.state.active === 2 && <ProfileTabThree/> }

                        </View>

                    </CardView>
                    <TouchableOpacity
                        onPress={() => null}
                        style={{
                            marginTop: 20,
                            marginRight: 24,
                            paddingTop: 20,
                            paddingBottom: 20,
                            backgroundColor:'#EB3333',
                            borderRadius: 30,
                            borderWidth: 1,
                            borderColor: '#EB3333',
                            alignSelf: 'flex-end',
                            width: '40%'
                        }}>
                        <Text style={{
                            color:'#FFFFFF',
                            textAlign:'center',
                            fontSize: 25
                        }}>Logout <Ionicons name={Platform.OS === 'ios' ? 'ios-log-out' : 'md-log-out'} size={25} /></Text>
                    </TouchableOpacity>
                </ScrollView>
            </SafeAreaView>
        );
    }
}










