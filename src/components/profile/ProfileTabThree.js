import React, { Component } from 'react';

import {Text, View} from 'react-native';
import Entrance from '../subscription/entrance';
import Periodical from '../subscription/periodical';
import ActiveCourses from '../subscription/activeCourses';

// import styles from './styles';

export default class ProfileTabThree extends Component {
    constructor(props) {
        super(props);

    }

    render() {
        return (
            <View style={{flexDirection: 'column', marginLeft: 20, marginTop: 10, paddingBottom: 10}}>


                <Text style={{color: '#007AFF'}}>Abbonamento</Text>

                <Text style={{fontSize: 25}}>
                    {this.props.userSubscription['Tipo'].Periodico && 'Periodico' }

                    {this.props.userSubscription['Tipo'].Entrate &&  'Entrate'}

                </Text>


                {this.props.userSubscription['Tipo'].Periodico && <Periodical start={this.props.userSubscription['Periodo'].Inizio}
                                                                              end={this.props.userSubscription['Periodo'].Fine}/> }


                {this.props.userSubscription['Tipo'].Entrate && <Entrance entrance={this.props.userSubscription['Entrate']}
                                                                          remain={this.props.userSubscription['EntrateAttuali']} />}

                <Text style={{color: '#007AFF'}}>Iscrizione</Text>
                <Text style={{fontSize: 25}}>{this.props.startSubscription}</Text>

                {this.props.userSubscription['IDCorso'].length > 0 ? <ActiveCourses navigation={this.props.navigation} active={true}/> : <ActiveCourses active={false}/>}


            </View>
        );
    }
}
