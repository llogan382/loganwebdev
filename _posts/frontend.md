---
title: "Why I'm using NextJS for the Frontend of my Full Stack Application"
excerpt: 'NextJS is the obvious choice for the frontend of my full stack application built on AWS infrastructure. NextJS version 12 has some great features for images, middleware, and more'
coverImage: '/assets/blog/preview/cover.jpg'
date: '2021-12-15T05:35:07.322Z'
author:
  name: Luke Logan
  picture: '/assets/blog/authors/luke.jpg'
ogImage:
  url: '/assets/blog/preview/cover.jpg'
---

NextJS 12 was dropped a few months ago. Just last night I read a tweet that the creator of Formik, the form library I am using on a work project, has joined the team at vercel/next. So have some other **awesome** developers.

## Features

Next.js 12 comes with:

- Rust compiler. _it is blazing fast_
- Middleware. _check for user authentication for requests_
- `<Image />` tags. _use the best size for an image to load quickly_
- Native ES Modules suppot. _uses all of the standards for ES Modules_

That is a lot of features that need to be unpacked, so lets look at them one at a time. The RUST compiler is a little surprising, because Rust is not all that developed of a programming language. We hear all the time about both Rust and Go gaining a foothold into the limelight of major programming languages, but this is the largest breakthrough in terms of going "mainstream" that either of these languages have accomplished to date.

Let's back it up: *what is a compiler, and why is it important?* Modern web development often relies on things like *typescript* to take things like types and JSX, and convert it into Javascript that your browser can read. This can be expensive in terms of the memory required for running the app locally on your computer during the development lifecycle, especially when the app grows. On this project I am working on at work, we are not using Nextjs12, and loading all the types can seem to take forever- my VS code will say at the bottom "loading types" and seem to freeze for an extended period of time. The rust compiler can help to speed up that process, because no one has time to sit around and wait for their code to be compiled. We want it done, and we want it done now.

*Middleware* is another one of those buzzwords you may have heard about, but can still seem a little vague, so let's take a stab at trying to put some meat on that definition. From the Nextjs website:

> Middleware enables you to use code over configuration. This gives you full flexibility in Next.js because you can run code before a request is completed. Based on the user's incoming request, you can modify the response by rewriting, redirecting, adding headers, or even streaming HTML.

Let's take an example from the hypothetical pizza restaurant we are going to build: whena  user clicks on the "My account" page, the user needs to be logged in first before they can see any account information. It is the job of middleware to check if the user is actually logged in before allowing the user to view the "account info" page.

Middleware will also be used for A/B testing, to incrementally adopt new features on the site over time. If you arent familiar with A/B testing, it is a marketing concept where you show one set of users a certain feature or design, and another set of users another design. By measuring the metrics and conversions, you can see which feature or design works better. All the major corporations like Facebook and Netflix use this approach to incrementally grow the user experience on their apps.

Images are one of the features I am most excited about. NextJs added the `<Image/>` component, which takes care of a lot of issues right out of the box. It is an extension of the HTML `<img>` element, perfected for the modern JAMStack architecture. It performs better, is more stable, is faster, and more flexible. Let's break it down through the example we will be building: a pizza restaurant app.

Pineapple, pepperoni, ooey gooey cheese, logos- these are all images we will want to use on our site. So when a user is looking at the site from a PRO sized phone, or an Ipad, or an SE sized phone- the image needs to use the correct image size. NextJS does this by *automatically generating* multiple url's that are the right size for any viewport. No more messing around with the HTML `<picture>` attribute, and finding the right URL, and creating the exact right size image for every use-case.

Do you ever scroll on a site, and as you click on a button, the page shifts, and you end up clicking on the wrong button altogether? This is due to layout-shift. Here is what is happening under the hood: The page loads the content and adds the PAINT to the page, meaning as the HTML is added, it fills in the content (like the words), then loads the styles from the various styling sources, then applies those styles in something called the _paint_ process. Adding this paint- with things like margins, padding, floats, etc- can sometimes effect the other elements on the page, seeming the *shift* the page. For images, if the DOM is loaded and the size is unknown, or the size is different than the space it needs to fill, the browser doesnt know how much space to reserve for the image. When the image is subsequently loaded, it can affect the layout of the page in a terrible way. The NEXTJS image component must have a size attrinbuted to it.

The `<Image>` component only loads the image when it enters the viewport. Some restaurants, or clickbait articles I read from Twitter, can have the slowest load times, then a modal pops up, then this, then that...and before you get to the content, you already want to leave the page. This can be due to a variety of reasons and I am not going to go into them here, but one of them can be due to pages trying to load all of the images when the page load. Loading them as they come into the viewport is called _lazy loading_, and google implemented this attribute years ago.

There is more about the image component, and this is a feature I think we will revisit in the future. And I am not going to get into the modules feature yet, but when I get a chance to dig into it, I'll be sure to share.


