---
title: "Part II: NextJS version 13: Data fetching and styling"
excerpt: 'Everyones favorite framework got a major facelift in version 13'
coverImage: '/assets/blog/nextjs2/edificio.jpg'
date: '2023-02-28T05:35:07.322Z'
author:
  name: Luke Logan
  picture: '/assets/blog/authors/luke.jpg'
  # 640x333
ogImage:
  url: '/assets/blog/nextjs2/edificio.jpg'
---

- [NextJS version 13: What do we need to know?](#nextjs-version-13-what-do-we-need-to-know)
  - [Fetching Data With Server COmponents](#fetching-data-with-server-components)
    - [APIs](#apis)
    - [NextJS Apis.](#nextjs-apis)
    - [Static Params.](#static-params)
    - [Loading Page.](#loading-page)
    - [Error Boundaries.](#error-boundaries)
    - [Types with Components and API responses.](#types-with-components-and-api-responses)
  - [Mutating Data.](#mutating-data)
  - [Global Styles.](#global-styles)
  - [CSS Modules](#css-modules)


# NextJS version 13: What do we need to know?

>These are notes and takeaways from a course taught by Scott Moss looking into the newest features of NextJS.

In the last post, rendering and client verses server components were reviewed. In this post, we will take a deeper look at *data fetching* and *styling* with the newest release of NextJS.

## Fetching Data With Server COmponents

Sometimes a page needs data before it can be rendered. How do you put it on a page and get SEO benefits?

Inside a server component, there are options for how to fetch data. YOu can interact w data directly (without API calls), access to backends, keep your app secure, etc.

There is no slowness between the client and the network connection.

Lets start from the top, with a common API call. How do you get data from an API, like  CMS? In a server component, they can make an `async` function. This is like an async function on the client, but it prevents the component from returning until the data is returned:

```js
const getData = async () => {
  const data = await fetch('https://www.somewebsite.com')
  return data.json()
}

// Components could never be async before.
export async function About(){

  // This will block the component from rendering until data is returned.
  const showData = await getData()

  return (
    <div>

    </div>
  )
}
```

Previously, there was no such thing as an `async` component (or page, I am using these two terms interchangeably here). React components historically have just been a series of lifecycle hooks and re-renders, and async would not be able to work inside a re-render, as it would just cause a re-render loop, and crash.

*this new method* will only show if the data is returned. That means you don't need to do conditional code for what happens when the data is not returned. This is HUGE! This is a completely new paradigm for how react can work.

You can do anything you want: a database call, a call to the stripe api, etc.

*React Next* has hijacked the `fetch` method, and added control for caching to tell whether a component should be re-rendered. *the default caching should work for most instances*.

What about cache? React caches *per segment* (this means, "per route"). React will treat data as static data, until React is told that the route is a dynamic one, and needs to be re-validated. Something like, `cache: 'no-store'` will always fetch new data.

### APIs

Let's take a look: why do you go to a page? When you go to a page, you are reading, not mutating data (this is usually done on the client). Client API requests rely on mutating data, using fetch, APIs, etc.

React has something called `use()` which is a hook like `swr`, and it does caching. It is not quite ready, but it is close. This is all done on the client side.

### NextJS Apis.

It is as simple as it can be: Take a request, return a response. With the request, you can do anything you want: you can access the file system, you can reach out to another api, etc.

Then, return something. Here is an example of an API on the server:

```js
import type { NextApiRequest, NextApiResponse } from "next";

type Data = {
  name: string
}

export default function handler(
  req: NextApiRequest,
  res: NextApiResponse<Data>
) {
  res.status(200).json({name: 'Alex Smith'})
}
```

Making API routes is still unchanged from NextJS 12: created in the `pages` directory, under 'api'. So, if you wanted to make a user profile API, the path might be `pages/api/user/[profile].tsx`.

Inside that page would be the function that takes a request, and returns a response.

Here is an example of a basic API route that can be found in the

```js
export default function handler(req, res){
  res.json({profile: {name: 'Benjamin Franklin'}})
}
```

By visiting the route listed above, the data for `name` will be returned; it works as middleware, and works as a serverless function, cached from the server closest to your house.

*What about Serverless functions?* Up until recently, they were very short lived, and something like a web-socket couldnt be used. If something is API driven, and not connected to your backend, it is best not to use a serverless function.

![NextJS setup confid ](/assets/blog/nextjs2/Oscar-Niemeyer-International-Cultural-Centre-Asturias-Most-Famous-Architects.jpg "NextJS terminal when running setup.")

### Static Params.

How do you get access to something that can change? Like a page with a dynamic path?
A dynamic path would be something like this:
`/app/posts/[slug]/page.tsx`;

Use the *generateStaticParams* hook:

This would involve two different pages. The first page would get the data to create all the other page paths, and the second page would render each page with the data that was created.

`app/blog/page.tsx` would create the page routes.
`app/blog/[...slug]/page.tsx` would render the data.


Creating the page routes could look like this:

```js
//app/blog/page.tsx
export default function getStaticParams(){
  return [
    {slug: 'React-hooks'},
    {slug: 'Nextjs-is-better'}
  ]
}
```

The page that consumes that data woule be:
```js
//app/blog/[...slug]/page.tsx
export default funciton Post({params}){
  return(
    <div>
    {params.slug}
    <div>
  )
}
```

Altogether it would look something like this:

```js
//`/app/posts/[slug]/page.tsx`:
export default async function Page({ params }) {
  const { slug } = params;
  // use this slug to fetch post data
  const post = await getPost(slug);

  return <div>{post.title}</div>;
}

// This will generate all the paths
export async function generateStaticParams() {
  const posts = await getPosts();

  return posts.map((post) => ({
    slug: post.slug,
  }));
}
```

The major difference is that considerations about what runs on the client and what runs on the server don't matter. Everything runs on the server.

`GetStaticParams` is the equivalent of `getStaticPaths` and `getStaticProps` from NextJS 12.

### Loading Page.

There are more special pages than layouts, templates, etc. One of them is the LOADING page. This is a page that shows the loading indicator while the server is fetching data. If there are many elements on a page, and each is a different server component, you can show a different loader for each component.

*Loading* is just using *suspense* in react, which is a way to stream a component to the frontend. In this case, we are streaming the LOADING component while the data is being fetched.

For example, you can wrap a slow-loading component in a SUSPENSE tag. This is the manual (or "OLD") way of doing it.

```js
import { Suspense } from "react";

<Suspense fallback={<Loader/>}>
  <Header />
</Suspense>
```

NextJS does this for you now automatically with the special `LOADING` page.


### Error Boundaries.

It can be thought of as a try...catch for a component.

Here is an example:

```js
// app/profile/[...slug]/error.tsx

export default function ProfileError(){
  return(
    <div>
  {error.message}
    </div>
  )
}

// app/profile/[...slug]/page.tsx

export default async function Profile({params}){
  const {slug} = params
  const post = await getData(slug)

  throw new Error('oh no!')
  return(
    // Rest of component here
  )
}
```

This gives granular control over what happens, and can reduce some of the guessing involved in trying to figure out what failed.


### Types with Components and API responses.

here is a good pattern to follow:

```js
import { FC } from "react";

interface InputInterface {
  inputName: string;
}

const Input: FC<InputInterface> = ({inputName}) => {
  return(
    <input>
    </input>
  )
}
```

Notice above, it is structured as a *functional component*. This will allow the props to be known. This is for a *client side component*, so `use client` needs to be added to the top.

For API responses, it is a little different; types aren't really needed here, because everything in the API is used separately from the client, so there are no types used in clients AND the APIs; they are both used at different parts of the network, so there is no overlap of types being consumed (I hope that makes sense?)


## Mutating Data.

The term *mutating* means "changing" the data on the database; this happens on the client. When the data is refreshed, the user wants the data on the page to be refreshed. NextJS is looking at ways to streamline this. Stay tined.

## Global Styles.

Remember the old days of the internet, where each site had a single `.css` stylesheet that was imported into the `index.html` file?

Yeah, its just like that.

Be sure to create a `styles` directory, and keep all the stylesheets there. In the standard NextJS repository, this is automatically created in the `app` directory.

## CSS Modules

This is just like legacy NextJS. It was not created by NextJS, but it is a scoped piece of CSS.

Let's say there was a component. For simplicity sake, the code above will be re-used.

```js
// input.module.css

.largeFont{
  size: 1.5rem;
  color: red;
}



// input.tsx
import { FC } from "react";
import styles from './input.module.css'

interface InputInterface {
  inputName: string;
}

const Input: FC<InputInterface> = ({inputName}) => {
  return(
    <input className={styles.large_font}>
    </input>
  )
}
```

`styles` will get imported as an object above, and the properties of the css

Does NextJS support Sass out of the box? Yes, but you have to install Sass yourself, so the bundler would have to be extended.

