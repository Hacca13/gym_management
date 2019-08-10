import React, { Component } from 'react';

import {View, SafeAreaView, ScrollView, Text, Dimensions, Platform, TouchableOpacity} from 'react-native';
import Emoji from 'react-native-emoji';
import CardView from 'react-native-cardview';
import {Card, Divider} from 'react-native-paper';
import plank from '../assets/plank.png';
import Ionicons from 'react-native-vector-icons/Ionicons';
const { height, width } = Dimensions.get("window");
import {Collapse, CollapseHeader, CollapseBody} from "accordion-collapse-react-native";
import CourseModal from '../components/modals/courseModal';

// import styles from './styles';

export default class  extends Component {
  constructor(props) {
    super(props);
    this.state = {
      modalVisible: false,
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
          }
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
          }
        }
      ],
      modalCourse: null

    };

    this.setModalVisible = this.setModalVisible.bind(this);
    this.dismissModal = this.dismissModal.bind(this);


  }

  setModalVisible(course) {
    this.setState({
      modalVisible: true,
      modalCourse: course
    })
  }

  dismissModal() {
    this.setState({
      modalVisible: false
    })
  }

  render() {
    return (
        <SafeAreaView style={{flex: 1, backgroundColor: 'black'}}>

          <CourseModal visible={this.state.modalVisible} course={this.state.modalCourse} dismissModal={this.dismissModal.bind(this)}/>

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

                              <Card.Content style={{flexDirection: 'row', justifyContent: 'space-between'}}>
                                <Text style={{marginTop: 10, fontSize: 30, alignSelf: 'center'}}>{course.name}</Text>
                                <TouchableOpacity onPress={() => this.setModalVisible(course)}>
                                  <Ionicons style={{alignSelf: 'center', marginTop: 15}}
                                            name={Platform.OS === 'ios' ? 'md-information-circle-outline' : 'ios-information-circle-outline'}
                                            size={35} />
                                </TouchableOpacity>
                              </Card.Content>
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
