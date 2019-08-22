import React, { Component } from 'react';
import {View, SafeAreaView, ScrollView, Text, Dimensions, Platform, TouchableOpacity, NativeModules} from 'react-native';
import Emoji from 'react-native-emoji';
import CardView from 'react-native-cardview';
import {Card, Divider} from 'react-native-paper';
import plank from '../assets/plank.png';
import Ionicons from 'react-native-vector-icons/Ionicons';
const { height, width } = Dimensions.get("window");
const timer = require('react-native-timer');
import firebase from 'react-native-firebase';
import UserManagerOffline from '../UserManagerOffline';
import {observer} from 'mobx-react';

@observer
export default class  extends Component {

    constructor(props) {
        super(props);
        this.state = {
            spinner: true,
            fireCourse: [],
        };

        this.collapseManagement = this.collapseManagement.bind(this);
    }

    collapseManagement(index) {
        let tmp = [...this.state.fireCourse];
        tmp[index].collapsed = !tmp[index].collapsed;
        this.setState({
            fireCourse: tmp
        })
    }


    componentDidMount(): void {
        firebase.auth().onAuthStateChanged(user => {
            if (user) {
                this.setState({
                    fireCourse: UserManagerOffline.userCourses
                })
            } else {
                console.log('nouser')
            }
        })
    }

    render() {
        return (
            <SafeAreaView style={{flex: 1, backgroundColor: 'black'}}>


                <ScrollView>

                    {

                        this.state.fireCourse.length > 0  ? (

                            this.state.fireCourse.map((course, index) => (

                                <CardView
                                    key={index}
                                    cardElevation={7}
                                    cardMaxElevation={2}
                                    cornerRadius={8}
                                    style={{
                                        marginTop: 24,
                                        marginLeft: 24,
                                        marginRight: 24,
                                        marginBottom: 24,
                                        backgroundColor: 'white'
                                    }}>

                                    <Card>
                                        <Card.Cover source={plank}/>

                                        <Card.Content style={{
                                            flexDirection: 'row',
                                            justifyContent: 'space-between',
                                            paddingBottom: 15
                                        }}>
                                            <Text style={{
                                                marginTop: 10,
                                                fontSize: 30,
                                                alignSelf: 'center'
                                            }}>{course['Nome']}</Text>
                                            <TouchableOpacity activeOpacity={0.5} delayPressIn={50} onPress={() => {
                                                this.collapseManagement(index);
                                            }}>

                                                <Ionicons style={{alignSelf: 'center', marginTop: 15, color: '#007AFF'}}
                                                          name={(this.state.fireCourse[index].collapsed) ?
                                                              (Platform.OS === 'ios' ? 'md-arrow-dropup' : 'ios-arrow-dropup')
                                                              :
                                                              (Platform.OS === 'ios' ? 'md-information-circle-outline' : 'ios-information-circle-outline')
                                                          }
                                                          size={35}/>
                                            </TouchableOpacity>
                                        </Card.Content>

                                        {(this.state.fireCourse[index].collapsed) ?
                                            (
                                                <Card.Content>

                                                    <Divider/>

                                                    <View style={{
                                                        justifyContent: 'flex-start',
                                                        flexDirection: 'row',
                                                        marginTop: 5
                                                    }}>
                                                        <Text style={{
                                                            fontSize: 15,
                                                            color: '#007AFF',
                                                            marginTop: 5
                                                        }}>Istruttore:</Text>
                                                        <Text style={{fontSize: 20}}>{' ' + course['Istruttore']}</Text>
                                                    </View>

                                                    <View style={{
                                                        justifyContent: 'flex-start',
                                                        flexDirection: 'row',
                                                        marginTop: 5
                                                    }}>
                                                        <Text style={{
                                                            fontSize: 15,
                                                            color: '#007AFF',
                                                            marginTop: 5
                                                        }}>Cadenza:</Text>

                                                        <View style={{flexDirection: 'column'}}>

                                                            {

                                                                course['Cadenza']['Giorni'].map((days, index) => (
                                                                        <Text key={index} style={{fontSize: 18, marginTop: 2}}>
                                                                            {
                                                                                ' ' + days['Giorno']['Giorno'] + ' - ' + days['Giorno']['Ora inizio']['Ora'] + ':'
                                                                                + (days['Giorno']['Ora inizio']['Minuti'] === 0 ? '00' : days['Giorno']['Ora inizio']['Minuti'])
                                                                                + '/' + days['Giorno']['Ora Fine']['Ora'] + ':'
                                                                                + (days['Giorno']['Ora Fine']['Minuti'] === 0 ? '00' : days['Giorno']['Ora Fine']['Minuti'])
                                                                            }
                                                                        </Text>
                                                                    )
                                                                )
                                                            }
                                                        </View>


                                                    </View>

                                                    <View style={{
                                                        justifyContent: 'flex-start',
                                                        flexDirection: 'row',
                                                        marginTop: 5
                                                    }}>
                                                        <Text style={{
                                                            fontSize: 15,
                                                            color: '#007AFF',
                                                            marginTop: 5
                                                        }}>Inizio:</Text>
                                                        <Text
                                                            style={{fontSize: 20}}>{' ' + course['Svolgimento']['Inizio']}</Text>
                                                    </View>


                                                    <View style={{
                                                        justifyContent: 'flex-start',
                                                        flexDirection: 'row',
                                                        marginTop: 5
                                                    }}>
                                                        <Text style={{
                                                            fontSize: 15,
                                                            color: '#007AFF',
                                                            marginTop: 5
                                                        }}>Fine:</Text>
                                                        <Text
                                                            style={{fontSize: 20}}>{' ' + course['Svolgimento']['Fine']}</Text>
                                                    </View>

                                                </Card.Content>
                                            ) : (<View/>)
                                        }

                                    </Card>

                                </CardView>

                            ))
                        ) : (<CardView
                            cardElevation={7}
                            cardMaxElevation={2}
                            cornerRadius={8}
                            style={{
                                marginTop: 24,
                                marginLeft: 24,
                                marginRight: 24,
                                marginBottom: 24,
                                backgroundColor: 'white'

                            }}>
                            <View style={{justifyContent: 'center', flexDirection: 'column', marginTop: 5}}>
                                <Ionicons style={{color: '#007AFF', alignSelf: 'center'}} size={100}
                                          name={Platform.OS === 'ios' ? 'md-close-circle' : 'md-close-circle'}/>

                            </View>
                        </CardView>)


                    }

                </ScrollView>


            </SafeAreaView>
        );
    }
}
