import React, { Component } from 'react';
import { createStackNavigator, createAppContainer } from "react-navigation";

import Navbar from './src/components/Navbar';
import Login from './src/screens/Login';
import Home from './src/screens/Home';
import Profile from './src/screens/Profile';

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
        header: navigationProps => <Navbar {...navigationProps} />
      }
    },
  },
  {
    initialRouteName: 'Home'
  }
);

export default createAppContainer(AppNavigator);
