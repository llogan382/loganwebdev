import { AppProps } from 'next/app'
import { useEffect } from 'react';
import { useRouter } from 'next/router'
import Amplify, { Analytics } from 'aws-amplify';
import '../styles/index.css'
import awsconfig from '../src/aws-exports';
import Auth from '@aws-amplify/auth';
Amplify.configure(awsconfig);


const amplifyConfig = {
  Auth: {
    identityPoolId: 'us-east-1:778adcaa-6e51-4c0b-907b-37d6a2c0e8c7',
    region: 'us-east-1'
  }
}


//Initialize Amplify
Auth.configure(amplifyConfig);

const analyticsConfig = {
  AWSPinpoint: {
        // Amazon Pinpoint App Client ID
        appId: '6b9df0ba8cc64248b5dca18c88a17f6b',
        // Amazon service region
        region: 'us-east-1',
        mandatorySignIn: false,
  }
}

Analytics.configure(analyticsConfig)

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

const router = useRouter()

  useEffect(() => {
    const handleRouteChange = url => {
      window.gtag('config', 308907953, {
        page_path: url,
      })
    }
    router.events.on('routeChangeComplete', handleRouteChange)
    return () => {
      router.events.off('routeChangeComplete', handleRouteChange)
    }
  }, [router.events])

export default function MyApp({ Component, pageProps }: AppProps) {
  return <Component {...pageProps} />
}
