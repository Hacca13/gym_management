import React, { Component } from 'react';
import { createStackNavigator, createAppContainer } from "react-navigation";

import Navbar from './src/components/headers/Navbar';
import Login from './src/screens/Login';
import Home from './src/screens/Home';
import Profile from './src/screens/Profile';
import Welcome from './src/screens/Welcome';
import WelcomeNav from './src/components/headers/WelcomeNav';
import ProfileNav from './src/components/headers/ProfileNav';
import StartWorkouts from './src/screens/StartWorkouts';
import singleWorkout from './src/screens/singleWorkout';
import WorkoutNav from './src/components/headers/WorkoutNav';
import TestWorkout from './src/screens/testWorkout';
import CircleWorkout from './src/screens/circleWorkout';

var ls = require('react-native-local-storage');

const workouts =  [
    {
        name: 'Leg Press',
        gif: 'gif',
        weight: '20kg',
        reps: '8',
        series: '3',
        rest: '00:30',
        status: false
    },
    {
        name: 'Plank',
        gif: 'gif',
        weight: '0',
        reps: 3,
        series: 1,
        rest: 2,
        time: 2,
        restSeries: 1,
        status: false
    },
]

ls.save('workouts', workouts).then(() => {
    console.log('setted')
    // output should be "get: Kobe Bryant"
});

class App extends Component {
    render() {
        return <AppNavigator />;
    }
}

const AppNavigator = createStackNavigator(
    {
        Home: {
            screen: Home,
            navigationOptions: {
                header: navigationProps => <Navbar {...navigationProps} />
            }
        },
        Login: {
            screen: Login,
            navigationOptions: {
                header: navigationProps => {
                    navigationProps;
                },
            },
        },
        Profile: {
            screen: Profile,
            navigationOptions: {
                header: navigationProps => <ProfileNav {...navigationProps} />
            }
        },
        Welcome: {
            screen: Welcome,
            navigationOptions: {
                header: navigationProps => <WelcomeNav {...navigationProps} />
            }
        },
        StartWorkout: {
            screen: StartWorkouts,
            navigationOptions: {
                header: navigationProps => <Navbar {...navigationProps} />
            }
        },
        TestWorkout: {
            screen: TestWorkout,
        },
        CircleWorkout: {
            screen: CircleWorkout,
            navigationOptions: {
                header: navigationProps => <WorkoutNav {...navigationProps} />
            }
        }
    },
    {
        initialRouteName: 'StartWorkout'
    }
);
export default createAppContainer(AppNavigator);
