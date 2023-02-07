import { AppProps } from 'next/app'
import { useEffect } from 'react';
import { useRouter } from 'next/router'
import '../styles/index.css'

export default function MyApp({ Component, pageProps }: AppProps) {
const router = useRouter()

  useEffect(() => {
    const handleRouteChange = (url: any) => {
      // @ts-ignore
      window.gtag('config', 'G-B81DJJJWTG', {
        page_path: url,
      })
    }
    router.events.on('routeChangeComplete', handleRouteChange)
    return () => {
      router.events.off('routeChangeComplete', handleRouteChange)
    }
  }, [router.events])

  return <Component {...pageProps} />
}
