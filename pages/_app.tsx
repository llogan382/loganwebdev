import { AppProps } from 'next/app'
import Amplify, { Analytics } from 'aws-amplify';
import '../styles/index.css'
import awsconfig from '../src/aws-exports';
Amplify.configure(awsconfig);

Analytics.configure({
    // OPTIONAL - Allow recording session events. Default is true.
    autoSessionRecord: true,
});
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
