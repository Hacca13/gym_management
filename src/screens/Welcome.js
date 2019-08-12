import React, { Component } from 'react';

import {SafeAreaView, View, Text, Dimensions, TouchableOpacity, ImageBackground} from 'react-native';
import {Divider} from 'react-native-paper';
import TextCarousel from 'react-native-text-carousel'
const { height, width } = Dimensions.get("window");
import gymWallpaper from './../assets/gym-workout-wallpaper.jpg';
import firebase from "react-native-firebase";


export default class Welcome extends Component {
    constructor(props) {
        super(props);
        this.state = {
            user: null,
            mail: ''
        }
    }


    componentDidMount(): void {
        firebase.auth().onAuthStateChanged(user => {
            if (user) {
                //console.log(user)
            } else {
                this.setState({
                    isAuth: true
                })
            }
        })
    }

    render() {
        return (
            <SafeAreaView>
                <ImageBackground source={gymWallpaper} style={{width: '100%', height: '100%'}}>

                    <View style={{alignSelf: 'center', paddingLeft: 50, paddingRight: 50}}>
                        <TextCarousel height={height/3} direction='up'>
                            <TextCarousel.Item>
                                <View style={{marginTop: 80}}><Text style={{fontSize: 28, color: 'white'}}>Success usually comes to those who are too busy to be looking for it.</Text></View>
                            </TextCarousel.Item>
                            <TextCarousel.Item>
                                <View style={{marginTop: 80}}><Text style={{fontSize: 28, color: 'white'}}>Success usually comes to those who are too busy to be looking for it.</Text></View>
                            </TextCarousel.Item>
                            <TextCarousel.Item>
                                <View style={{marginTop: 80}}><Text style={{fontSize: 28, color: 'white'}}>Success usually comes to those who are too busy to be looking for it.</Text></View>
                            </TextCarousel.Item>
                        </TextCarousel>
                    </View>

                    <View style={{paddingLeft: 20, paddingRight: 20}}>
                        <Divider/>
                        <Text>{this.state.mail}</Text>
                    </View>
                    <View>
                        <TouchableOpacity
                            onPress={() => { this.props.navigation.push('TrainOrCourse')}}
                            style={{
                                marginTop: 100,
                                paddingTop: 20,
                                paddingBottom: 20,
                                backgroundColor:'#D8D8D8',
                                borderRadius: 30,
                                borderWidth: 1,
                                borderColor: '#979797',
                                width: width/2,
                                alignSelf: 'center'
                            }}>
                            <Text style={{
                                color:'#000000',
                                textAlign:'center',
                                fontSize: 20
                            }}>Allenati</Text>
                        </TouchableOpacity>
                    </View>
                </ImageBackground>

            </SafeAreaView>
        );
    }
}


