import React, { Component } from 'react';

import { View, Text, SafeAreaView, Dimensions, Platform, TouchableOpacity, ScrollView, AsyncStorage } from 'react-native';
const { height, width } = Dimensions.get("window");
import Ionicons from 'react-native-vector-icons/Ionicons';
import WorkoutCard from '../components/workouts/WorkoutCard';
var ls = require('react-native-local-storage');



export default class StartWorkouts extends Component {
    constructor(props) {
        super(props);
        this.state = {
            workouts: [
                {
                    name: 'Leg Press',
                    gif: 'gif',
                    weight: '20kg',
                    reps: '8',
                    series: '3',
                    rest: '00:30',
                },
                {
                    name: 'Plank',
                    gif: 'gif',
                    weight: '0',
                    series: 1,
                    rest: {
                      minutes: 0,
                      seconds: 5
                    },
                    time: {
                        minutes: 0,
                        seconds: 5
                    },
                    restSeries: 1
                },
            ],
            store: null
        }
    }



    componentDidMount(): void {
        ls.get('workouts').then(value => {
            this.setState({store: value})
        })
    }

    render() {
        return (
            <SafeAreaView>

                <TouchableOpacity onPress={() => {null}}>
                    <View style={{backgroundColor: '#D8D8D8', height: height/3, alignItems: 'center', justifyContent: 'center'}}>
                        <Text style={{fontSize: 40}}>
                            <Ionicons name={Platform.OS === 'ios' ? 'ios-play' : 'md-play'} size={40}/>
                            {' '} Inizia allenamento { this.state.key}
                        </Text>
                    </View>
                </TouchableOpacity>

                <ScrollView>

                    <TouchableOpacity onPress={() => {
                        this.props.navigation.push('CircleWorkout', {workout: this.state.workouts[1]})
                    }}>
                        <WorkoutCard bgColor={'white'}/>
                    </TouchableOpacity>

                    <WorkoutCard bgColor={'#4CD964'} doneWorkout={true}/>

                    <WorkoutCard bgColor={'white'}/>
                    <WorkoutCard bgColor={'white'}/>
                    <WorkoutCard bgColor={'white'}/>
                    <WorkoutCard bgColor={'white'}/>
                    <WorkoutCard bgColor={'white'}/>
                </ScrollView>

            </SafeAreaView>
        );
    }
}
