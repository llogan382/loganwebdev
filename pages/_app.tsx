import { AppProps } from 'next/app'
import Amplify, { Analytics } from 'aws-amplify';
import '../styles/index.css'
import awsconfig from '../src/aws-exports';
import Auth from '@aws-amplify/auth';
Amplify.configure(awsconfig);


const amplifyConfig = {
  Auth: {
    identityPoolId: 'COGNITO_IDENTITY_POOL_ID',
    region: 'us-east-1'
  }
}

//Initialize Amplify
Auth.configure(amplifyConfig);



const analyticsConfig = {
    autoSessionRecord: true,
  AWSPinpoint: {
        // Amazon Pinpoint App Client ID
        appId: '2e8049eb2c1a47fe8c26579513e27a23',
        // Amazon service region
        region: 'us-east-1',
        mandatorySignIn: false,
  }
}



Analytics.configure(analyticsConfig);
Analytics.autoTrack('pageView', {
    // REQUIRED, turn on/off the auto tracking
    enable: true,
    // OPTIONAL, the event name, by default is 'pageView'
    eventName: 'pageView',
    // OPTIONAL, the attributes of the event, you can either pass an object or a function
    // which allows you to define dynamic attributes
    attributes: {
        attr: 'attr'
    },
    // when using function
    // attributes: () => {
    //    const attr = somewhere();
    //    return {
    //        myAttr: attr
    //    }
    // },
    // OPTIONAL, by default is 'multiPageApp'
    // you need to change it to 'SPA' if your app is a single-page app like React
    type: 'multiPageApp',
    // OPTIONAL, the service provider, by default is the Amazon Pinpoint
    provider: 'AWSPinpoint',
    // OPTIONAL, to get the current page url
    getUrl: () => {
        // the default function
        return window.location.origin + window.location.pathname;
    }
});
export default function MyApp({ Component, pageProps }: AppProps) {
  return <Component {...pageProps} />
}
