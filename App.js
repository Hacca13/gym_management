import React, { Component } from 'react';
import { createStackNavigator, createAppContainer } from "react-navigation";

import Navbar from './src/components/headers/Navbar';
import Login from './src/screens/Login';
import Home from './src/screens/Home';
import Profile from './src/screens/Profile';
import Welcome from './src/screens/Welcome';
import WelcomeNav from './src/components/headers/WelcomeNav';
import ProfileNav from './src/components/headers/ProfileNav';

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
        }
    },
    {
        initialRouteName: 'Profile'
    }
);
export default createAppContainer(AppNavigator);
