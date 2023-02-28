---
title: "Part I: NextJS version 13: What do we need to know?"
excerpt: 'Everyones favorite framework got a major facelift in version 13'
coverImage: '/assets/blog/nextjs/708_708_4.jpg'
date: '2023-02-22T05:35:07.322Z'
author:
  name: Luke Logan
  picture: '/assets/blog/authors/luke.jpg'
  # 640x333
ogImage:
  url: '/assets/blog/nextjs/708_708_4.jpg'
---


Table of contents:

- [NextJS version 13: What do we need to know?](#nextjs-version-13-what-do-we-need-to-know)
  - [What is NextJS?](#what-is-nextjs)
  - [Creating a NEXTJS app](#creating-a-nextjs-app)
  - [Routing](#routing)
    - [Route Grouping](#route-grouping)
  - [Rendering](#rendering)
    - [Head Component](#head-component)
    - [Layout Component](#layout-component)
    - [Navigation](#navigation)
    - [Server and Client components](#server-and-client-components)
  - [What are server components?](#what-are-server-components)
  - [Client Components](#client-components)

# NextJS version 13: What do we need to know?

There are quite a few changes with this recent version. What is important to know?

1. The pages directory, versus the app directory. There were many changes. What were they?
2. Server and Client components are different. How are they different, and what does that mean?
3. Fetching data. This can be done server side, or client side. What does this look like, and when do we use it?
4. Configuration. This can be done in many different ways. Rust compiler? Typescript? YES. Let's look.
5. Styling. *There is more to the world than just Tailwind, people!*.

## What is NextJS?

To answer that question, you first have to ask, what is react? The short answer is, it is kind of like a library. However, it is complicated; routers need to be set up, so does api routes, and HTML and how things are rendered (besides JSX), and a build system, etc. This is a headache, as there are so many options.

![Just a break in the flow of text. ](/assets/blog/nextjs/Adjaye-Assocites-Abu-Dhabi-1920x1200.jpg "a title")

**Enter NextJS**. They saw an opportunity to simplify a lot of these decisions to make an app that is easier to build React Applications. Routing is built in, so is state management, so are a million other things.

But when do you use NextJS? The answer is, almost any time you want to use React, NextJS can be the best solution.

What if you have an API that is already built in? This can be an issue. However, you can build out the pages without using the internal NextJS API routes, just using the API that runs on another server.

There are alternatives: Astro and Remix. Astro is like a "free architecture", which they call "islands", which are optimizations to your Javascript. It wraps around your framework (like Javascript). They boast themselves as being **fast**.

NextJS has built-in API routes, which are serverless functions. They can scale (but can become expensive). Again, you can use these, or API routes from an external platform/framwork/service.

## Creating a NEXTJS app

**Be sure to use Node 16 or Node 18 with NextJS 13**.

This is pretty easy. Assuming you have Node on your computer, just run this command:

`npx create-next-app@latest --experimental-app`

As of the time this blog post is being written, the install will ask for a few setup questions that look like the following:

![NextJS setup confid ](/assets/blog/nextjs/setup-terminal.png "NextJS terminal when running setup.")

After running the setup script, jump into the app and the `package.json` file will look like the following:

```js
{
  "name": "nextjs-13-app",
  "version": "0.1.0",
  "private": true,
  "scripts": {
    "dev": "next dev",
    "build": "next build",
    "start": "next start",
    "lint": "next lint"
  },
  "dependencies": {
    "@next/font": "13.1.6",
    "@types/node": "18.14.0",
    "@types/react": "18.0.28",
    "@types/react-dom": "18.0.11",
    "eslint": "8.34.0",
    "eslint-config-next": "13.1.6",
    "next": "13.1.6",
    "react": "18.2.0",
    "react-dom": "18.2.0",
    "typescript": "4.9.5"
  }
}
```

If you are running in *dev* mode, this is very stable. This will start a local server.
*build* is when you want to deploy. This will fetch some parts of the data.
*start* will run the server after it is deployed.

Looking at the `next.config.js` file, and it should look like the following:

```js
/** @type {import('next').NextConfig} */
const nextConfig = {
  experimental: {
    appDir: true,
  },
}

module.exports = nextConfig
```

We are opting in to the `appDir`, which is now stable, per the NEXTJS team.

The bulk of the changes are in the `app` and the `pages` directories. In this post, we are going to use the `app` directory (not pages).

The API directory is still being updated, but for now, it is under the `pages` directory.

*Is there an _app.tsx file?* Short answer, is No. There is something equivalent, but let's take a deeper look at that later.

## Routing

File-based routing is my favorite thing about NextJS. I am a developer (or an engineer, I am unclear where one stops and the other begins), and I am lazy, so I want to get the biggest return by doing as little as possible. Setting up a react app with *react-router* is a pain, and a few years ago, I didn't want to deal with learning a new library, so I started working with NextJS because they already made all of the decisions for me.

Version 13 changes a little bit about how that works. In the `app` directory, any file called `page` is going to be treated similar to an `index` file. At the root level, the file at `app/page` will be served. If another file based route needs to be rendered, say, an "about" page, a directory would need to be added by the name "about" and it would need a `page.tsx` or `page.jsx` file.

**This is one of the biggest differences between NextJS 12 and 13**. A lot of the routing confusion has been solved with this approach.

![NextJS setup confid ](/assets/blog/nextjs/Greek-and-Roman-Classical-Architecture.jpeg "NextJS terminal when running setup.")

What if you don't know what the path will be? Like, a list of blog posts by name?

For NextJS, create a diretory and use the brackets to name it like this, `[slug]`, and this will tell NextJS that this is a dynamic path.

THere is an option to use a *catch all* route, in case you still have no idea what the url will be, but you want to serve something anyways.

I used this in a recent project, by creating a file (or a directory) with a name like this: `[...slug]`.

What about Authenticated routes? There is nothing built-in to address this. However, you can use middleware to check cookies, by abstracting away cookies or something. This can be covered soon by looking at server side routes.

### Route Grouping

At times you may want a singlular site with a client-side way to render content, like landing pages, but the site also needs to have logged-in user content, like dashboards, etc.

For this, parenthesis can be put around the name of the directory, and that directory will be ignored in the url, but the child directory will be rendered, like this:
`app/(landing)/coupons`.
The url for this would be: "/coupons", and the "landing" portion will be ignored. This will become important later.

To recap, there are routes for:

- *dynamic paths* where you dont know the url path: `app/[slug]/page.tsx`
- *catch-all-paths* where the 404 page will not be used when an incorrect path is entered, like `app/[...slug]/page.tsx`.
- *Route grouping* for parts of the URL that don't need to be rendered, but the pages in that path need to behave in the same way with layouts, etc.

![Just a break in the flow of text. ](/assets/blog/nextjs/Greek-and-Roman-Classical-Architecture.jpeg "a title")

## Rendering

### Head Component

Everything in the Head tag goes here. In version 12, this is in the `document.tsx` page. It contains- you guessed it - the HEAD tag.

In NextJS 13, you can have multiple head tags, so you can put a different tag on each page (or path).

### Layout Component

This wraps around the page or section to tell the page how to do layout. In version 12, you can't get data into a layout component, so this is a problem.

It will be applied to each page underneath it in the `app` directory, and provides first-level support in version 13.

There are 2 different kinds of layout: a ROOT layout, and a SECTION layout. If you have route grouping, you will have more than one ROOT layout.

The second kind of layout is a TEMPLATE- it changes every time a route segment changes. This can be used for animations, or adding fetching between different pages.

### Navigation

How does it get handled in this framework? When there is a transition, the route updates, and NextJS re-uses segments that have not changed. NextJS will serve any data from cache while it tries to fetch any new data, to see if it is different.

But what is important the know is the `next/link` component.

When you use the built in component, it does everything listed above. If you use an anchor tag, you will not have any of those benefits.

### Server and Client components

The lines are getting blurred. In NextJS 12, `getServerSideProps()` was used at the bottom of a component to run node code at a certain part of the file, and client side JS throughout the rest of the file.

The updated version of NextJS (version 13),  all JS in the APP directory is not being sent to the client. Just the HTML is sent to the client. The whole time, we are doing SERVER components, so NODE works throughout. *By default, NextJS 13 will use server components*.

If something like `useRouter` is needed, a tag is needed at the top of the file:

```js
'use client'
```

With that magic line, React knows it will be served as  a client. A router is something that only exists in the browser, and since this is on the server and there are no browsers on the server, this distinction is needed.

Also, this tag, `use client`, is a React 18 standard, not NextJS. NextJS just implemented this feature quickly, and made it pretty seamless.

Are client components rendered on the server?

It depends. A client component can be rendered on the client, using SSR. Server side components do *streaming*.

React by default makes all components server components.

If you only need one piece of the component to be client side, you do not need to write the whole component as a client component.

It is a fundamental shift from the process of fetching data, passing it down as props to the children, etc.

If you do it properly, you can do client components within server components, and the data does not interfere with itself.

## What are server components?

They are components that never leave the server. No JS gets shipped to the client. Nothing with State will work either. Server components do not have a rendering cycle, so none of the "hooks" into the lifecycle will work.

**SSR vs Server Components:** All data is serialized, and passed to the client where it is *hydrated*; this is SSR. The data needs to be readable by the JS in the browser.

Server components will fetch all data on the server, and as data results are returned, the data gets streamed to the client. Apps will have the effect where certain parts of the page will render when the data is returned.

**When do I use server components?** As often as possible, unless you need client side functionality.

The integration with NextJS for many libraries will be slow; not every app or library will work right off the bat with NextJS 13 using server side components.

**How does STATE work with nextJS13?** Take a step back and look at the big picture. Now, state is more like a data layer, and it comes from many places, with many caching strategies. It is like a data-first rendering lifecycle. One of the goals is to send less JS to the browser.

## Client Components

To clarify, these are the kinds of components you have always been using with NextJS. The only difference is that you have to add `use client` at the top. Those components can still be rendered on the server, but the are not server components. The can still use hooks, but they use the initial HTML on the server. They are being executed on the server.

*When do we use them?*? When we need to use hooks.

Also if you are using CLASS components. The server does not work with class based components. Basically anything related to the browser API (like, events, timers, css, interactions, etc) use client components.

*what directory do I use for components?* Put them in a directory in the root of the project. If the components are created in the `app` directory, they will be server components; if components are created in the `pages` directory, they will be client components. If components are created in the root, and then imported into the `pages` or the `app` directory, then they will be used as client/server components.

If using Next13+: use pages for API, and thats it. Pages should go in `app` directory.

As an example, a `header` component can be used as a server component OR a client component.

Server components *can be imported* into server components with no problems.
Client components *can be imported* in server components as well
Server components *can be imported* into client components. Its immediate parent is a client, so it imports automatically.

> Server versus client: It is all about data fetching, and how much JS is being sent to the client.



