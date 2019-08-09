import React, { Component } from 'react';

import { View, Text, SafeAreaView, Dimensions, Platform, TouchableOpacity, ScrollView, Modal } from 'react-native';
const { height, width } = Dimensions.get("window");
import Ionicons from 'react-native-vector-icons/Ionicons';
import WorkoutCard from '../components/workouts/WorkoutCard';
var ls = require('react-native-local-storage');
import gifff from './../assets/testgif.gif';
import CardView from 'react-native-cardview';
import EditModal from '../components/modals/editModal';
import InfoModal from '../components/modals/infoModal';


export default class StartWorkouts extends Component {
    constructor(props) {
        super(props);
        this.state = {
            id: 9,
            status: null,
            editModalVisible: false,
            infoModalVisible: false,
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
        };
        this.returnData = this.returnData.bind(this);
        this.setInfoModalVisible = this.setInfoModalVisible.bind(this);
        this.setEditModalVisible = this.setEditModalVisible.bind(this);
    }

    returnData(id, status) {
        const tmp = [...this.state.workouts];
        tmp[id].status = status;
        this.setState({
            workouts: tmp
        })
    }

    setEditModalVisible(visible) {
        this.setState({ editModalVisible: visible})
         console.log(this.state.editModalVisible);
    }

    setInfoModalVisible(visible) {
        this.setState({ infoModalVisible: visible})
        console.log(this.state.infoModalVisible);

    }



    componentWillUnmount(): void {
        this.setEditModalVisible(false);
        this.setInfoModalVisible(false);
    }


    render() {
        return (


            <SafeAreaView style={{flex: 1}}>

                <EditModal visible={this.state.editModalVisible} setEditModalVisible={this.setEditModalVisible.bind(this)}/>

                <InfoModal visible={this.state.infoModalVisible} setInfoModalVisible={this.setInfoModalVisible.bind(this)}/>

                <TouchableOpacity onPress={() => this.setInfoModalVisible(true) }>
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
                                    <WorkoutCard workout={value}
                                                 setEditModalVisible={this.setEditModalVisible.bind(this)}
                                                 setInfoModalVisible={this.setInfoModalVisible.bind(this)}
                                                 bgColor={'white'}/>
                                </TouchableOpacity>
                            )

                    ))}


                </ScrollView>

            </SafeAreaView>
        );
    }
}
