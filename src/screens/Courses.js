import React, { Component } from 'react';

import {View, SafeAreaView, ScrollView, Text, Dimensions, Platform, TouchableOpacity} from 'react-native';
import Emoji from 'react-native-emoji';
import CardView from 'react-native-cardview';
import {Card, Divider} from 'react-native-paper';
import plank from '../assets/plank.png';
import Ionicons from 'react-native-vector-icons/Ionicons';
const { height, width } = Dimensions.get("window");
import {Collapse, CollapseHeader, CollapseBody} from "accordion-collapse-react-native";
const timer = require('react-native-timer');

// import styles from './styles';

export default class  extends Component {
    constructor(props) {
        super(props);
        this.state = {
            modalVisible: false,
            modalID: [],
            courses: [
                {
                    name: 'BodyPamp',
                    cadenza: {
                        giorni: ['Lunedì', 'Mercoledì', 'Venerdì']
                    },
                    iscritti: 8,
                    istruttore: 'Pasquale il nero',
                    svolgimento: {
                        inizio: '22/10/2019',
                        fine: '22/10/2020'
                    },
                    collapsed: false
                },

                {
                    name: 'FitBoxe',
                    cadenza: {
                        giorni: ['Martedì', 'Giovedì']
                    },
                    iscritti: 3,
                    istruttore: 'Luca il verde',
                    svolgimento: {
                        inizio: '22/10/2019',
                        fine: '22/10/2020'
                    },
                    collapsed: false
                }
            ],
        };
    }

    collapseManagement(index) {
        let tmp = [...this.state.courses];
        tmp[index].collapsed = !tmp[index].collapsed;
        this.setState({
            courses: tmp
        })
    }

    render() {
        return (
            <SafeAreaView style={{flex: 1, backgroundColor: 'black'}}>


                <ScrollView>

                    {
                        this.state.courses.length > 0 ? (


                                this.state.courses.map((course, index) => (


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
                                        }}>

                                        <Card>
                                            <Card.Cover source={plank}/>

                                            <Card.Content style={{flexDirection: 'row', justifyContent: 'space-between', paddingBottom: 15}}>
                                                <Text style={{marginTop: 10, fontSize: 30, alignSelf: 'center'}}>{course.name}</Text>
                                                <TouchableOpacity onPress={() => {
                                                    this.collapseManagement(index);
                                                }}>

                                                    <Ionicons style={{alignSelf: 'center', marginTop: 15}}
                                                              name={ (this.state.courses[index].collapsed) ?
                                                                  (Platform.OS === 'ios' ? 'md-arrow-dropup' : 'ios-arrow-dropup')
                                                                  :
                                                                  (Platform.OS === 'ios' ? 'md-information-circle-outline' : 'ios-information-circle-outline')
                                                              }
                                                              size={35} />
                                                </TouchableOpacity>
                                            </Card.Content>

                                            { (this.state.courses[index].collapsed) ?
                                                (
                                                    <Card.Content>

                                                        <Divider/>

                                                        <View style={{justifyContent: 'flex-start', flexDirection: 'row', marginTop: 5}}>
                                                            <Text style={{fontSize: 15, color: '#007AFF', marginTop: 5}}>Allenatore:</Text>
                                                            <Text style={{fontSize: 20}}>{' ' + course.istruttore}</Text>
                                                        </View>

                                                        <View style={{justifyContent: 'flex-start', flexDirection: 'row', marginTop: 5}}>
                                                            <Text style={{fontSize: 15, color: '#007AFF', marginTop: 5}}>Cadenza:</Text>
                                                            {course.cadenza.giorni.map((days, index) => (
                                                                <Text key={index} style={{fontSize: 20}}>{' ' + days}</Text>
                                                            ))}
                                                        </View>

                                                        <View style={{justifyContent: 'flex-start', flexDirection: 'row', marginTop: 5}}>
                                                            <Text style={{fontSize: 15, color: '#007AFF', marginTop: 5}}>Inizio:</Text>
                                                            <Text style={{fontSize: 20}}>{' ' + course.svolgimento.inizio}</Text>
                                                        </View>

                                                        <View style={{justifyContent: 'flex-start', flexDirection: 'row', marginTop: 5}}>
                                                            <Text style={{fontSize: 15, color: '#007AFF', marginTop: 5}}>Fine:</Text>
                                                            <Text style={{fontSize: 20}}>{' ' + course.svolgimento.fine}</Text>
                                                        </View>

                                                    </Card.Content>
                                                ) : (<View/>)
                                            }

                                        </Card>

                                    </CardView>


                                ))
                            ) :

                            (<Text style={{color: 'white'}}>NoCourses</Text>)

                    }


                </ScrollView>


            </SafeAreaView>
        );
    }
}
