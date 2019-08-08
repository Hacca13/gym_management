import React, { Component } from 'react';

import { View, Text, SafeAreaView, Dimensions, Platform, TouchableOpacity, ScrollView, AsyncStorage } from 'react-native';
const { height, width } = Dimensions.get("window");
import Ionicons from 'react-native-vector-icons/Ionicons';
import WorkoutCard from '../components/workouts/WorkoutCard';
var ls = require('react-native-local-storage');
import gifff from './../assets/testgif.gif';



export default class StartWorkouts extends Component {
    constructor(props) {
        super(props);
        this.state = {
            id: 9,
            status: null,
            workouts: [
                {
                    name: 'Plank',
                    gif: gifff,
                    weight: 60,
                    series: 1,
                    rest: {
                        minutes: 0,
                        seconds: 5
                    },
                    time: {
                        minutes: 0,
                        seconds: 5
                    },
                    restSeries: 1,
                    status: true
                },
                {
                    name: 'Plank',
                    gif: gifff,
                    weight: 60,
                    series: 2,
                    restSeries: 2,
                    rest: {
                        minutes: 0,
                        seconds: 5
                    },
                    time: {
                        minutes: 0,
                        seconds: 5
                    },
                    status: false
                },
                {
                    name: 'Plank',
                    gif: gifff,
                    weight: 60,
                    series: 1,
                    rest: {
                        minutes: 0,
                        seconds: 5
                    },
                    time: {
                        minutes: 0,
                        seconds: 5
                    },
                    restSeries: 1,
                    status: false
                },
                {
                    name: 'Plank',
                    gif: gifff,
                    weight: 60,
                    series: 1,
                    rest: {
                        minutes: 0,
                        seconds: 5
                    },
                    time: {
                        minutes: 0,
                        seconds: 5
                    },
                    restSeries: 1,
                    status: false
                },
                {
                    name: 'Plank',
                    gif: gifff,
                    weight: 60,
                    series: 1,
                    rest: {
                        minutes: 0,
                        seconds: 5
                    },
                    time: {
                        minutes: 0,
                        seconds: 5
                    },
                    restSeries: 1,
                    status: false
                },
                {
                    name: 'Plank',
                    gif: gifff,
                    weight: 60,
                    series: 1,
                    rest: {
                        minutes: 0,
                        seconds: 5
                    },
                    time: {
                        minutes: 0,
                        seconds: 5
                    },
                    restSeries: 1,
                    status: false
                }
            ],
        }
        this.returnData = this.returnData.bind(this);
    }

    returnData(id, status) {
        const tmp = [...this.state.workouts];
        tmp[id].status = status;
        this.setState({
            workouts: tmp
        })
    }


    render() {
        return (
            <SafeAreaView style={{flex: 1}}>
                <TouchableOpacity onPress={() => {null}}>
                    <View style={{backgroundColor: '#D8D8D8', height: height/3, alignItems: 'center', justifyContent: 'center'}}>
                        <Text style={{fontSize: 40}}>
                            <Ionicons name={Platform.OS === 'ios' ? 'ios-play' : 'md-play'} size={40}/>
                            {' '} Inizia allenamento
                        </Text>
                    </View>
                </TouchableOpacity>

                <ScrollView contentContainerStyle={{paddingBottom: 20}}>

                    {this.state.workouts.map((value, index) => (

                        value.status ?

                            (
                                <WorkoutCard key={index}
                                             bgColor={'#4CD964'}
                                             doneWorkout={value.status}
                                             workout={value}
                                />
                            )

                            :

                            (
                                <TouchableOpacity key={index} onPress={() => {
                                    this.props.navigation.push('CircleWorkout', {workout: value, workID: index, statusID: false, returnData: this.returnData.bind(this) })
                                }}>
                                    <WorkoutCard workout={value} bgColor={'white'}/>
                                </TouchableOpacity>
                            )

                    ))}


                </ScrollView>

            </SafeAreaView>
        );
    }
}
