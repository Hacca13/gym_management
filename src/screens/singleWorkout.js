import React, { Component } from 'react';

import {Platform, SafeAreaView, Image, Text, TouchableOpacity, View, Dimensions} from 'react-native';
import Ionicons from 'react-native-vector-icons/Ionicons';
import WorkoutCard from '../components/workouts/WorkoutCard';
const { height, width } = Dimensions.get("window");


export default class SingleWorkout extends Component {
  render() {
    return (
        <SafeAreaView>

            <TouchableOpacity onPress={() => {null}}>
                <View style={{backgroundColor: '#D8D8D8', height: height/3, alignItems: 'center', justifyContent: 'center'}}>
                    <Image></Image>
                </View>
            </TouchableOpacity>
        </SafeAreaView>
    );
  }
}
