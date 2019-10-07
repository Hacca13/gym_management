import React, { Component } from 'react';

import {Text, View} from 'react-native';
import Entrance from '../subscription/entrance';
import Periodical from '../subscription/periodical';
import ActiveCourses from '../subscription/activeCourses';
import Reactotron from 'reactotron-react-native'

// import styles from './styles';

export default class ProfileTabThree extends Component {
    constructor(props) {
        super(props);

    }

    componentDidMount() {

    }

    render() {
        return (
            <View style={{flexDirection: 'column', marginLeft: 20, marginTop: 10, paddingBottom: 10}}>


                <Text style={{color: '#007AFF'}}>Abbonamento</Text>

                <Text style={{fontSize: 25}}>
                    {this.props.userSubscription['type'] === 'period' && 'Periodico' }

                    {this.props.userSubscription['type'] === 'revenue' &&  'Entrate'}

                </Text>


                {this.props.userSubscription['type'] === 'period' && <Periodical start={this.props.userSubscription['startDate']}
                                                                              end={this.props.userSubscription['endDate']}/> }


                {this.props.userSubscription['type'] === 'revenue' && <Entrance entrance={this.props.userSubscription['numberOfEntries']}
                                                                          remain={this.props.userSubscription['numberOfEntries'] -
                                                                          this.props.userSubscription['numberOfEntriesMade']} />}

                {/*<Text style={{color: '#007AFF'}}>Iscrizione</Text>
                <Text style={{fontSize: 25}}>{this.props.userSubscription['startDate']}</Text> */
                }

                {//this.props.userSubscription['IDCorso'].length > 0 ? <ActiveCourses navigation={this.props.navigation} active={true}/> : <ActiveCourses active={false}/>
                     }


            </View>
        );
    }
}
