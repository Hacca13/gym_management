import {observable} from 'mobx';
import Reactotron from 'reactotron-react-native';
import firebase from "react-native-firebase";
import AsyncStorage from '@react-native-community/async-storage';



class UserManagerOffline {
    @observable counter = 0;

    @observable userInfo = null;

    @observable userSubscription = null;

    @observable userCourses = null;

    @observable isSet = false;

    retrieveUser(user) {
        firebase.firestore().collection('User').where('Username', '==', user._user.uid).get().then(fireUser => {
            this.userInfo = fireUser.docs[0].data();
        }).then(() => {
            this.retrieveSubscription(this.userInfo)
        })
    }

    retrieveSubscription(userInfo) {
        firebase.firestore().collection('Abbonamenti').doc(userInfo['Abbonamento']).get().then(subscription => {
            this.userSubscription = subscription.data();
        }).then(() => {
            this.retrieveCourses(this.userSubscription)
        })
    }

    retrieveCourses(userSubs) {
        let courses = [];
        userSubs['IDCorso'].map(val => {
            firebase.firestore().collection('Corsi').doc(val).get().then(course => {
                courses.push(course.data())
            }).then(() => {
                this.userCourses = courses;
                this.multiSet().then(() => {
                })
            })
        })
    }

    getCircularReplacer = () => {
        const seen = new WeakSet();
        return (key, value) => {
            if (typeof value === "object" && value !== null) {
                if (seen.has(value)) {
                    return;
                }
                seen.add(value);
            }
            return value;
        };
    };


    multiSet = async () => {
        const userInfo = ["userInfo", JSON.stringify(this.userInfo, this.getCircularReplacer())];
        const userSubs = ["userSubs", JSON.stringify(this.userSubscription, this.getCircularReplacer())];
        const userCourse = ["userCourses", JSON.stringify(this.userCourses, this.getCircularReplacer())];

        try {
            await AsyncStorage.multiSet([userInfo, userSubs, userCourse])
            return [userInfo, userSubs, userCourse];
        } catch(e) {
            //save error
        }
    };

    getMultiple = async () => {
        let values;
        try {
            values = await AsyncStorage.multiGet(['userInfo', 'userSubs', 'userCourses'])
            return await Promise.resolve(values);
        } catch(e) {
            // read error
        }
    }

    clearAll = async () => {
        try {
            await AsyncStorage.clear()
        } catch(e) {
            // clear error
        }
        Reactotron.log('Cleared')
    }


}
export default new UserManagerOffline();
