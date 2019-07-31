import React, { Component } from 'react';

import { View, Text, SafeAreaView, Dimensions, Platform, TouchableOpacity, ScrollView } from 'react-native';
const { height, width } = Dimensions.get("window");
import Ionicons from 'react-native-vector-icons/Ionicons';
import WorkoutCard from '../components/workouts/WorkoutCard';

// import styles from './styles';

export default class StartWorkouts extends Component {
    render() {
        return (
            <SafeAreaView>

                <TouchableOpacity onPress={() => {null}}>
                    <View style={{backgroundColor: '#D8D8D8', height: height/3, alignItems: 'center', justifyContent: 'center'}}>
                        <Text style={{fontSize: 40}}>
                            <Ionicons name={Platform.OS === 'ios' ? 'ios-play' : 'md-play'} size={40}/>
                            {' '} Inizia allenamento
                        </Text>
                    </View>
                </TouchableOpacity>

                <ScrollView>

                    <TouchableOpacity onPress={() => {this.props.navigation.push('SingleWorkout')}}>
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
