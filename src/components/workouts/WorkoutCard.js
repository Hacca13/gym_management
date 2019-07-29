import React, { Component } from 'react';

import {View, Text, Platform, Image, Dimensions, TouchableOpacity} from 'react-native';
import CardView from 'react-native-cardview';
import plank from './../../assets/plank.png';
import gifff from './../../assets/testgif.gif';
const { height, width } = Dimensions.get("window");
import Ionicons from 'react-native-vector-icons/Ionicons';

// import styles from './styles';

export default class WorkoutCard extends Component {
    render() {
        return (
            <View>
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

                        <View style={{ width: width/4}}>
                            <Image source={{uri: 'https://upload.wikimedia.org/wikipedia/commons/2/2c/Rotating_earth_%28large%29.gif'}} style={{width: '100%', height: 80, marginTop: 20, marginLeft: 20, marginBottom: 20, borderRadius: 10}}/>
                        </View>



                        <View style={{justifyContent: 'center'}}>
                            <Text style={{fontSize: 25}}>Leg press</Text>
                            <Text style={{fontSize: 20, marginTop: 5}}>Leg press</Text>
                        </View>

                        <View style={{flexDirection: 'row', marginRight: 20, marginTop: 45}}>
                            <TouchableOpacity onPress={() => {null}}>
                                <Ionicons name={Platform.OS === 'ios' ? 'ios-create' : 'md-create'} color='#007AFF' size={30}/>
                            </TouchableOpacity>

                            <TouchableOpacity onPress={() => {null}}>
                                <Ionicons style={{marginLeft: 20}} name={Platform.OS === 'ios' ? 'ios-information-circle' : 'md-information-circle'} color='#007AFF' size={30}/>
                            </TouchableOpacity>
                        </View>
                    </View>

                </CardView>
            </View>
        );



    }
}
