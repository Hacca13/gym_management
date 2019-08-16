import React, { Component } from 'react';
import AsyncStorage from '@react-native-community/async-storage';
import firebase from 'react-native-firebase';
import Reactotron from 'reactotron-react-native';

export default class OfflineManager extends Component {

    storeCourses(user) {

        firebase.firestore().collection('User').where('Username', '==', user._user.uid).get().then(value => {
            value.docs.map((value1) => {
                firebase.firestore().collection('Abbonamenti').doc(value1.data()['Abbonamento']).get().then(value => {
                    if (value.data()['IDCorso'].length > 0) {
                        let fireCourses = [];
                        value.data()['IDCorso'].map((value) => {
                            firebase.firestore().collection('Corsi').doc(value).get().then(value1 => {
                                fireCourses.push({...value1.data(), collapsed: false})
                            }).then(async () => {
                                try {
                                    await AsyncStorage.setItem('@courses', JSON.stringify(fireCourses))
                                    return fireCourses
                                } catch (e) {
                                    Reactotron.log(e);
                                }
                            })
                        })
                    }

                }).catch(err => {
                    console.log(err)
                })
            })
        })
    }


    getCourses = async (user) => {
        try {
            const value = await AsyncStorage.getItem('@courses')
            if (value !== null) {
                return await Promise.resolve(JSON.parse(value));
            } else {
                Reactotron.log('setting')
                this.storeCourses(user)
            }
        } catch (e) {

        }
    }

}
