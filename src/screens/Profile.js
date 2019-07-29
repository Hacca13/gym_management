import React, { Component } from 'react';

import {View, Text, Button, SafeAreaView} from 'react-native';
import { Avatar , Divider } from 'react-native-paper';
import avatar from './../assets/ProfileInfo.png'


export default class Profile extends Component {

    render() {
        return (
            <SafeAreaView>
                <View style={{alignSelf: 'center', marginTop: 20}}>
                    <Avatar.Image size={148} source={avatar} />
                </View>

                <Divider style={{marginTop: 20}}/>
            </SafeAreaView>
        );
    }
}




