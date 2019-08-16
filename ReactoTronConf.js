import {NativeModules} from 'react-native';

import Reactotron from 'reactotron-react-native'


Reactotron
    .configure() // controls connection & communication settings
    .useReactNative() // add all built-in react native plugins
    .connect() // let's connect!

Reactotron.onCustomCommand("reload", () => NativeModules.DevSettings.reload())
