import Document, { Html, Head, Main, NextScript } from 'next/document'

export default class MyDocument extends Document {
  render() {
    return (
      <Html lang="en">
        <Head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

         <meta property="og:url" content="https://www.loganwebdev.com" />
          <meta property="og:title" content="Logan Web Deb" />
          <meta property="og:description" content="Web Maker. Engineer. Enthusiast." />
          <meta property="og:image" content="https://loganwebdev.com/assets/twitter-og.jpg" />
          <meta property="og:site_name" content="Loganwebdev." />
          <meta name="twitter:card" content="summary" />
          <meta name="twitter:site" content="@loganwebdev" />
          <meta name="twitter:creator" content="@js_luke_overflo" />
          <script
            async
            src={`https://www.googletagmanager.com/gtag/js?id=G-B81DJJJWTG`}
          />
          <script
            dangerouslySetInnerHTML={{
              __html: `
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-B81DJJJWTG', {
              page_path: window.location.pathname,
            });
          `,
            }}
          />
        </Head>
        <body>
          <Main />
          <NextScript />
        </body>
      </Html>
    )
  }
}
