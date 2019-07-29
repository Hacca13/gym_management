import React, { Component } from 'react';

import {Text, TouchableOpacity, SafeAreaView, View, StyleSheet, Dimensions} from 'react-native';
import CardView from 'react-native-cardview'
import { TextInput } from 'react-native-paper';
import Video from "react-native-video";
const { height } = Dimensions.get("window");

export default class Login extends Component {
    constructor(props) {
        super(props);
        this.state = {
            text: '',
            password: ''
        };
    }

    login() {
       if (this.state.text === 'pelo' && this.state.password === 'pelo') {
           this.props.navigation.navigate('Home');
       } else {
           this.setState({
               text: 'error',
               password: 'error'
           })
       }
    }

    render() {
        return (
            <SafeAreaView backgroundColor={'#D8D8D8'} style={{flexDirection: 'column-reverse', flex: 1}}>
                <Video
                    source={require("./../assets/videoplayback.mp4")}
                    style={styles.backgroundVideo}
                    muted={true}
                    repeat={true}
                    resizeMode={"cover"}
                    rate={1.0}
                    ignoreSilentSwitch={"obey"}/>

                <CardView
                    cardElevation={7}
                    cardMaxElevation={2}
                    cornerRadius={8}
                    style={{
                        marginBottom: 100,
                        marginLeft: 24,
                        marginRight: 24,
                        backgroundColor: 'white'
                    }}>
                    <View style={{
                        padding: 20,
                    }}>
                        <TextInput
                            mode='outlined'
                            label='Email'
                            value={this.state.text}
                            onChangeText={text => this.setState({ text })}
                            theme={{
                                colors: {
                                    primary: 'gray',
                                }
                            }}
                        />
                        <View style={{marginTop: 10}}/>
                        <TextInput
                            secureTextEntry={true}
                            mode='outlined'
                            label='Password'
                            value={this.state.password}
                            onChangeText={password => this.setState({ password })}
                            theme={{
                                colors: {
                                    primary: 'gray',
                                }
                            }}
                        />

                        <View style={{width: '50%', alignSelf: 'flex-end', marginTop: 10}}>
                            <TouchableOpacity
                                onPress={() => this.login()}
                            style={{
                                marginTop: 10,
                                paddingTop: 10,
                                paddingBottom: 10,
                                backgroundColor:'#D8D8D8',
                                borderRadius: 30,
                                borderWidth: 1,
                                borderColor: '#979797'
                            }}>
                                <Text style={{
                                    color:'#000000',
                                    textAlign:'center',
                                    fontSize: 20
                                }}>Accedi</Text>
                            </TouchableOpacity>
                        </View>
                    </View>
                </CardView>
            </SafeAreaView>
        );
    }

}
const styles = StyleSheet.create({
    backgroundVideo: {
        height: height,
        position: "absolute",
        top: 0,
        left: 0,
        alignItems: "stretch",
        bottom: 0,
        right: 0
    }
});

