import React, { Component } from 'react';

import {View, Text, Platform, Image, Dimensions, TouchableOpacity, ListView} from 'react-native';
import CardView from 'react-native-cardview';
import plank from './../../assets/plank.png';
import gifff from './../../assets/testgif.gif';
const { height, width } = Dimensions.get("window");
import Ionicons from 'react-native-vector-icons/Ionicons';
import FontAwesome from 'react-native-vector-icons/FontAwesome';
import Tooltip from 'rn-tooltip';


export default class WorkoutCard extends Component {
    render() {
        return (
                <CardView
                    cardElevation={7}
                    cardMaxElevation={2}
                    cornerRadius={8}
                    style={{
                        marginTop: 20,
                        marginLeft: 24,
                        marginRight: 24,
                        backgroundColor: this.props.bgColor
                    }}>


                    <View style={{flexDirection: 'row', justifyContent: 'space-between'}}>

                        <View style={{ width: width/4}}>
                            <Image source={gifff} style={{width: '100%', height: 80, marginTop: 20, marginLeft: 20, marginBottom: 20, borderRadius: 10}}/>
                        </View>

                        <View style={{justifyContent: 'center', marginLeft: 20}}>
                            <Text style={{fontSize: 25}}>Leg press</Text>
                            <Text style={{fontSize: 20, marginTop: 5, color: 'grey'}}>60kg - x3</Text>
                        </View>

                        <View style={{flexDirection: 'row', marginRight: 20, marginTop: 45}}>
                            {/*<TouchableOpacity onPress={() => {null}}>
                                <Ionicons name={Platform.OS === 'ios' ? 'ios-create' : 'md-create'} color='#007AFF' size={30}/>
                            </TouchableOpacity>*/}



                            {this.props.doneWorkout ?
                                (<FontAwesome style={{marginLeft: 15}} name={'check'} color='#007AFF' size={30}/>)
                                :
                                (
                                    <TouchableOpacity onPress={() => {null}}>
                                        <Tooltip
                                            withPointer={false}
                                            withOverlay={true}
                                            backgroundColor={'white'}
                                            height={100}
                                            popover={
                                                <View>
                                                    <TouchableOpacity>
                                                        <Text style={{fontSize: 20}}>
                                                            <Ionicons name={Platform.OS === 'ios' ? 'ios-create' : 'md-create'} color='#007AFF' size={25}/>
                                                            {' '}Modifica
                                                        </Text>
                                                    </TouchableOpacity>

                                                    <TouchableOpacity>
                                                        <Text style={{fontSize: 20, marginTop: 15}}>
                                                            <Ionicons name={Platform.OS === 'ios' ? 'ios-information-circle-outline' : 'md-information-circle-outline'} color='#007AFF' size={25}/>
                                                            {' '}Info
                                                        </Text>
                                                    </TouchableOpacity>
                                                </View>
                                            }>

                                            <FontAwesome style={{marginLeft: 15}} name={'ellipsis-v'} color='#007AFF' size={30}/>

                                        </Tooltip>
                                    </TouchableOpacity>
                                )
                            }





                        </View>
                    </View>
                </CardView>
        );


    }
}
