import React, { Component } from 'react';

import {Button, SafeAreaView, Image, Text, TouchableOpacity, View, Dimensions, Easing, ScrollView, Platform} from 'react-native';
import Fontisto from 'react-native-vector-icons/Fontisto';
import {AnimatedCircularProgress} from 'react-native-circular-progress';
import WorkoutNav from '../components/headers/WorkoutNav';
import AntDesign from 'react-native-vector-icons/AntDesign';
import Header from '@freakycoder/react-native-header-view';

const timer = require('react-native-timer');


export default class CircleWorkout extends Component {

    constructor(props) {
        console.ignoredYellowBox = ['Setting a timer'];
        super(props);
        this.state = {
            ...this.props.navigation.getParam('workout'), //Props derivati da navigation
            snapshot: {
                ...this.props.navigation.getParam('workout'), //Props derivati da navigation (startingpoint)
            },
            animationFill: 0, //STARTING ANIMATION POINT
            workOrRest: true, //WORK OR REST
            progressColor: '#00e0ff', //PROGRESS COLOR
            timeOrAction: false, //SHOW ACTION OR TIMEOUT
            paused: false, //PAUSE CHRONO
            isWorking: false, //CHRONO IS ACTIVE
            doneWorkout: false, //WORKOUT IS DONE
            circularProgressAction: 'Inizia', //ACTION
        };

        this.setWorkoutDone = this.setWorkoutDone.bind(this);
        this.startWorkouTimer = this.startWorkouTimer.bind(this);
        this.stopWorkouTimer = this.stopWorkouTimer.bind(this);
        this.startRestTimer = this.startRestTimer.bind(this);
        this.stopRestTimer = this.stopRestTimer.bind(this);
        this.pauseTimer = this.pauseTimer.bind(this);
        this.resetTimer = this.resetTimer.bind(this);
        this.navigateBack = this.navigateBack.bind(this);
    }



    componentDidUpdate(prevProps: Readonly<P>, prevState: Readonly<S>, snapshot: SS): void {

        //CHECK IN THE PREVIOUS STATE IF WORKOUT IS DONE

        if (prevState.time.seconds === 1) {

            if (prevState.time.minutes === 0 ) {
                this.stopWorkouTimer();
            }

            this.setState({
                time: {
                    minutes: this.state.time.minutes - 1,
                    seconds: 60
                }
            })
        }

        if (prevState.rest.seconds === 1) {
            if (prevState.rest.minutes === 0 ) {
                this.stopRestTimer();
            }
            this.setState({
                rest: {
                    minutes: this.state.rest.minutes - 1,
                    seconds: 60
                }
            })
        }


    }


    startWorkouTimer() {
        timer.clearTimeout(this);
        this.setState({
            timeOrAction: true,
            progressColor: '#00e0ff',
            paused: false
        });
        timer.setInterval(this, 'workCounter', () => {
            this.setState({
                time: {
                    minutes: this.state.time.minutes,
                    seconds: this.state.time.seconds - 1
                }
            })
        }, 1000);

        this.circularProgress.animate(100, (this.state.time.minutes * 60 * 1000) +
            (this.state.time.seconds * 1000), Easing.quad);


    }

    pauseTimer() {
        this.setState({
            paused: true
        });
        timer.clearInterval(this);
        this.circularProgress.animate().stop();
    }


    stopWorkouTimer() {
        this.setState({
            timeOrAction: false,
            progressColor: '#4CD964',
            circularProgressAction: 'Riposo',
        });
        timer.clearInterval(this);
        timer.setTimeout(this, 'workCounter', () => {
            this.setState({
                workOrRest: false,
                rest: {
                    minutes: this.state.snapshot.rest.minutes,
                    seconds: this.state.snapshot.rest.seconds
                }
            });
            this.startRestTimer();
        }, 2000);
        this.setState({series: this.state.series - 1})
        this.circularProgress.animate(0, 2000, Easing.quad);

    }


    startRestTimer() {
        timer.clearTimeout(this);
        this.setState({timeOrAction: true, progressColor: '#FCD533'});
        timer.setInterval(this, 'restCounter', () => {
            this.setState({
                rest: {
                    minutes: this.state.rest.minutes,
                    seconds: this.state.rest.seconds - 1
                }
            })
        }, 1000);

        this.circularProgress.animate(100, (this.state.rest.minutes * 60 * 1000) +
            (this.state.rest.seconds * 1000), Easing.quad);

    }

    stopRestTimer() {

        this.setState({
            timeOrAction: false,
            progressColor: '#4CD964',
            circularProgressAction: this.state.series === 0 ? 'Fine' : 'Allenati',
            restSeries: this.state.restSeries - 1
        });
        timer.clearInterval(this);
        timer.setTimeout(this, 'restCounter', () => {
            this.setState({
                workOrRest: true,
                time: {
                    minutes: this.state.snapshot.time.minutes,
                    seconds: this.state.snapshot.time.seconds
                }
            });
            if (this.state.restSeries === 0 && this.state.series === 0) {
                this.setWorkoutDone();
            }}, 2000);

        this.circularProgress.animate(0, 2000, Easing.quad);


    }




//SET ENVIROMENT TO END WORKOUT
    setWorkoutDone() {
        this.setState({
            doneWorkout: true,
            progressColor: '#4CD964',
            circularProgressAction: 'Avanti'
        });
        this.circularProgress.animate(100, 0, Easing.quad)

    }



    resetTimer() {
        this.pauseTimer();
        this.circularProgress.animate(0,0,Easing.quad);
        this.setState({
            time: this.state.snapshot.time,
            rest: this.state.snapshot.rest,
            timeOrAction: false
        })
    }


    navigateBack() {
        this.props.navigation.state.params.returnData(this.props.navigation.getParam('workID'), true);
        this.props.navigation.pop();
    }

    componentWillUnmount(): void {
        clearInterval(this);
        clearTimeout(this);
        this.circularProgress.animate().stop();

    }


    render() {
        return (

            <SafeAreaView>
                <Header
                    leftComponent={
                        <TouchableOpacity
                            onPress={() => {
                                this.state.doneWorkout ? (this.navigateBack())
                                    :
                                    this.props.navigation.pop();
                            }
                            }>
                            <Text style={{color: '#007AFF', fontSize: 20, marginLeft: 5}}>
                                <AntDesign name="left" type="AntDesign" size={20} color='#007AFF' />Indietro</Text>
                        </TouchableOpacity>
                    }

                />

                <ScrollView>

                    <Text>{this.state.doneWorkout ? 'true' : 'false'}</Text>

                    <Text>{this.state.series}</Text>
                    <Text>{this.state.restSeries}</Text>

                    <AnimatedCircularProgress
                        ref={(ref) => this.circularProgress = ref}
                        size={260}
                        width={40}
                        fill={this.state.doneWorkout ? 100 : this.state.animationFill}
                        backgroundColor="#3d5875"
                        tintColor={this.state.doneWorkout ? '#4CD964' : this.state.progressColor }
                        style={{alignSelf:'center'}}>

                        {
                            (fill) => (

                                //CHECK IF WORKOUT IS DONE

                                this.state.doneWorkout ?


                                    (
                                        //IF TRUE RENDER COMPLETED CIRCULAR PROGRESS GO AHEAD

                                        <View style={{alignItems: 'center', justifyContent: 'center'}}>
                                            <TouchableOpacity onPress={() => {
                                                this.navigateBack();
                                            }}>
                                                <Text style={{fontSize: 35, color: '#4CD964'}} >{this.state.circularProgressAction}</Text>
                                                <Fontisto style={{alignSelf: 'center', justifyContent: 'center', marginTop: 10, color: '#4CD964'}} size={30} name={'angle-dobule-right'}/>

                                            </TouchableOpacity>
                                        </View>

                                    ) :

                                    (
                                        //IF FALSE, CHECK IF RENDER WORK OR REST CIRCULAR PROGRESS

                                        this.state.workOrRest ?

                                            (
                                                //IF TRUE, RENDER WORKOUT CIRCULAR PROGRESS
                                                <View style={{alignItems: 'center', justifyContent: 'center'}}>


                                                    {/* CHECK IF RENDER TIMER OR ACTION*/}
                                                    {this.state.timeOrAction ?

                                                        //IF TRUE RENDER TIMER
                                                        (

                                                            <View>

                                                                <View style={{flexDirection: 'row', justifyContent: 'center', alignItems: 'center'}}>
                                                                    <Text style={{fontSize: 35}}>
                                                                        {this.state.time.minutes + ':' + this.state.time.seconds}
                                                                    </Text>
                                                                </View>

                                                                <View style={{flexDirection: 'row', justifyContent: 'center', alignItems: 'space-between', marginTop: 10}}>

                                                                    {/* Pause/Resume Icon*/}
                                                                    <TouchableOpacity onPress={() => {
                                                                        this.state.paused ? this.startWorkouTimer() : this.pauseTimer()
                                                                    }}>




                                                                        <Fontisto style={{alignSelf: 'center', justifyContent: 'center'}} size={30} name={this.state.paused ? 'play' : 'pause'}/>
                                                                    </TouchableOpacity>

                                                                    {/* Pause/Resume Icon*/}
                                                                    <TouchableOpacity onPress={() => this.resetTimer()}>
                                                                        <Fontisto style={{alignSelf: 'center', justifyContent: 'center', marginLeft: 20}} size={30} name={'redo'}/>
                                                                    </TouchableOpacity>

                                                                </View>

                                                            </View>

                                                        )

                                                        :

                                                        //IF FALSE RENDER ACTION
                                                        (
                                                            <TouchableOpacity onPress={() => {
                                                                this.startWorkouTimer()
                                                            }}>
                                                                <Text style={{fontSize: 35}}>
                                                                    {this.state.circularProgressAction}
                                                                </Text>
                                                            </TouchableOpacity>
                                                        )
                                                    }


                                                </View>
                                            )

                                            :

                                            (
                                                //IF FALSE, RENDER REST CIRCULAR PROGRESS
                                                <View style={{alignItems: 'center', justifyContent: 'center'}}>


                                                    {/* CHECK IF RENDER TIMER OR ACTION*/}
                                                    {this.state.timeOrAction ?

                                                        //IF TRUE RENDER TIMER
                                                        (

                                                            <Text style={{fontSize: 35}}>
                                                                {this.state.rest.minutes + ':' + this.state.rest.seconds}
                                                            </Text>

                                                        )

                                                        :

                                                        //IF FALSE RENDER ACTION
                                                        (

                                                            <Text style={{fontSize: 35}}>
                                                                {this.state.circularProgressAction}
                                                            </Text>
                                                        )
                                                    }


                                                </View>

                                            )

                                    )

                            )
                        }


                    </AnimatedCircularProgress>



                </ScrollView>

            </SafeAreaView>
        );
    }
}
