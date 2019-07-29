import React, { Component } from 'react';

import {SafeAreaView, View, Text, Dimensions, TouchableOpacity, ImageBackground} from 'react-native';
import {Divider} from 'react-native-paper';
import TextCarousel from 'react-native-text-carousel'
const { height, width } = Dimensions.get("window");
import gymWallpaper from './../assets/gym-workout-wallpaper.jpg';


export default class Welcome extends Component {

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
                    </View>
                    <View>


                        <TouchableOpacity
                            onPress={() => null}
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


