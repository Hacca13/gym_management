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
import CircleWorkout from './src/screens/circleWorkout';
import TrainOrCourse from './src/screens/TrainOrCourse';
import TrainOrCourseNav from './src/components/headers/TrainOrCourseNav';
import Courses from './src/screens/Courses';

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

        CircleWorkout: {
            screen: CircleWorkout,
            navigationOptions: {
                header: null
            }
        },

        TrainOrCourse: {
          screen: TrainOrCourse,
          navigationOptions: {
              header: navigationProps => <TrainOrCourseNav {...navigationProps} />
          }
        },

        Couses: {
            screen: Courses,
            navigationOptions: {
                header: navigationProps => <Navbar {...navigationProps} />
            }
        }

    },

    {
        initialRouteName: 'Welcome'
    }
);
export default createAppContainer(AppNavigator);
