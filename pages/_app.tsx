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
            // OPTIONAL -  Amazon service region
            // OPTIONAL - Default Endpoint Information
            endpoint: {
                address: 'xxxxxxx', // The unique identifier for the recipient. For example, an address could be a device token, email address, or mobile phone number.
                attributes: {
                    // Custom attributes that your app reports to Amazon Pinpoint. You can use these attributes as selection criteria when you create a segment.
                    hobbies: ['piano', 'hiking'],
                },
                channelType: 'APNS', // The channel type. Valid values: APNS, GCM
                demographic: {
                    appVersion: 'xxxxxxx', // The version of the application associated with the endpoint.
                    locale: 'xxxxxx', // The endpoint locale in the following format: The ISO 639-1 alpha-2 code, followed by an underscore, followed by an ISO 3166-1 alpha-2 value
                    make: 'xxxxxx', // The manufacturer of the endpoint device, such as Apple or Samsung.
                    model: 'xxxxxx', // The model name or number of the endpoint device, such as iPhone.
                    modelVersion: 'xxxxxx', // The model version of the endpoint device.
                    platform: 'xxxxxx', // The platform of the endpoint device, such as iOS or Android.
                    platformVersion: 'xxxxxx', // The platform version of the endpoint device.
                    timezone: 'xxxxxx' // The timezone of the endpoint. Specified as a tz database value, such as Americas/Los_Angeles.
                },
                location: {
                    city: 'xxxxxx', // The city where the endpoint is located.
                    country: 'xxxxxx', // The two-letter code for the country or region of the endpoint. Specified as an ISO 3166-1 alpha-2 code, such as "US" for the United States.
                    latitude: 0, // The latitude of the endpoint location, rounded to one decimal place.
                    longitude: 0, // The longitude of the endpoint location, rounded to one decimal place.
                    postalCode: 'xxxxxx', // The postal code or zip code of the endpoint.
                    region: 'xxxxxx' // The region of the endpoint location. For example, in the United States, this corresponds to a state.
                },
                metrics: {
                    // Custom metrics that your app reports to Amazon Pinpoint.
                },
                /** Indicates whether a user has opted out of receiving messages with one of the following values:
                 * ALL - User has opted out of all messages.
                 * NONE - Users has not opted out and receives all messages.
                 */
                optOut: 'ALL',
                // Customized userId
                userId: 'XXXXXXXXXXXX',
                // User attributes
                userAttributes: {
                    interests: ['football', 'basketball', 'AWS']
                    // ...
                }

  }
}
};



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
Analytics.configure(analyticsConfig);

export default function MyApp({ Component, pageProps }: AppProps) {
  return <Component {...pageProps} />
}
