---
title: "Intro: Full stack series"
excerpt: 'What does a new web developer need to know about the modern web?'
# 640x333
coverImage: '/assets/blog/series1/CH_ChooseChicago_hancock_e30c2ef6-f985-4803-9c70-fa7b96b16999-1800x1200.jpg'
date: '2024-07-08T05:35:07.322Z'
author:
  name: Luke Logan
  picture: '/assets/blog/authors/luke.jpg'
  # 640x333
ogImage:
  url: '/assets/blog/series1/CH_ChooseChicago_hancock_e30c2ef6-f985-4803-9c70-fa7b96b16999-1800x1200.jpg'
---


# A new series

I'm going to write a series of posts over the next period of time- it is hard to say whether it will be a few weeks or months exactly, but time will tell.

This is going to be a series of posts that speak to something I wish I had seen at various parts of my career. It is going to be a list of brief summaries, or recaps, of major bits of technology used for software engineers working with web-related technologies.

For a couple years now I have been writing a personal blog about family-related things. Vacations, birthdays, and other silly family events would be covered. Writing posts on that blog is something I enjoy, but I have been looking for a way to bring the same joy of writing to my blog here- at loganwebdev.com.

So I will be using that energy of just sharing what I have learned, what I have found helpful in my 9 years as a software engineer.


![Full Stack items](/assets/blog/series1/image2.jpg  "things to know")


**Who is the audience?** Honestly, in many ways, I am the audience. This is going to be a review of the technologies I use every day.

Since the world of Javascript-based technologies is changing so rapidly, I wanted to take some time to get back to the basics, and do a recap of some of the fundamentals.

*This is a highway, and there will be off-ramps*. This is a high-level overview of many concepts, complete with references to other resources to go deeper on a topic, and a brief review of how to use those resources. If there is an area to explore a little more and go a little deeper, then follow the links and dive deep into some of these other topics.

I think the best way to learn something is to just do it- and that is the intention here. Using this approach, we will walk through how to build a common 'to-do' app, as well as a video player.

We will start by doing this with just HTML, look at the basic concepts and limitations of HTML for using a form, and then look into using a javascript based form submission for the same form.

Javascript is king and has a wealth of browser APIs, but there is a flavor called "node", which runs on the server; lacking browser APIs, but the world of streams and filesystems come into play here.

Javascript is a very loosely-typed language. It is beautiful in a way, but it can introduce bugs in many parts of a codebase- especially for larger teams. For comparison, most other programming languages are "strongly typed" and do not have the same quirks. **Typescript** is a superset of the language, and solves many of these problems.

As the uses of Javascript in web development have grown over time, so have the expectations of end-users and developers. There have been some changes to the language over time- like the introduction of ESM modules. There is a term, **compilers**, to get familiar with. And one of the best technologies out there, at the time of this writing, is Vitejs.

Changing compilers fixes some issues, but if we go back to our original example: A to-do app, or a video player, there are inherent limitations to how an application can perform. Think of a series of posts in a feed on social media, for example.

Enter ReactJS. This is a JS framework used to help address many of the shortcomings faced before: how can the DOM show a series of "posts" like a social media feed, and still remain interactive? Or put another way, how can front-end code use components, like backend code has done for decades?

As an application grows in complexity, it becomes challenging to ensure that any changes to the codebase do not break other parts of the application. One way to check is to use every feature of the application by, for example, testing every field in every form after every change to the codebase, and ensure proper functionality. But developers are lazy, and that wouldn't scale- luckily there is another approach: **testing** which we will look at.

Similarly, as a codebase grows, and each engineer working on the code has their own unique way to build a feature, **design patterns** are a lens for how to write code in a way that can scale, while remaining efficient and understandable.

Back to our original example: A to-do list and a video player. No matter how we build the app, the "to-dos" need to be saved somewhere so that the user can look at those items at a later time, and this is where databases come in. We will take a look at PostgreSQL, and take a survey of the landscape of other databases.

Setting up a DB is hard. Getting a frontend, a backend, and a server all set up properly, along with permissions, storage, etc. is a pretty big challenge. There is an ongoing joke among developers where the answer is "it works on my machine". **Docker** is a technology that looks to solve that problem.

Finally, once the great to-do app is built, it can't be used by anyone else unless it is on a server somewhere for the world to see. To get the app to that server (in a Docker container, for example), it will require some CI/CD (continuous integration and continuous deployment) to be set up.

There are a certain group of people that prefer to look at things in the form of bullet points. When I am working to find an answer at work, I am one of those people as well. So, here is a bulleted list of the items I just described:

- Computer setup: tools and features.
- HTML
    - What is it
    - where does it live
    - Tags, attributes, links
    - forms, default behaviors
    - buttons
    - where to go for more information
- Javascript
    - What is it
    - functions, classes
    - submit a form
    - Browser APIs
    - Compilers
    - Where to go for more information
- Node
    - What is it
    - Streams
    - FS
    - Express
    - NestJS
    - Where to go for more information
- Vite
- Typescript
    - What is it
    - problems it solves
    - VS code setup
- ReactJS
    - What is it? What problems does it solve?
    - Submit a form
    - hooks
    - state
    - RSCs
    - the new react compiler
    - where to go for more information
- Testing
    - unit, E2E
    - What is it, what problems does it solve?
    - Cypress
    - react testing library.
- Software architecture
    - What is it, why do we need it?
    - Why is it important?
    - important patterns and examples
    - Where to go for more information.
- Databases
    - What are they
    - various types
    - Postgres
    - Some services to use currently
- Docker
    - What is it, and why is it needed?
    - Important concepts
- CI/CD

*Note*: You may have noticed there is nothing about CSS included. This is correct and intentional: There are plenty of great resources available and I will be happy to provide links. However, I am going to be focusing on a bare-bones, non-styled rendering of many HTML elements, and spend time focusing on the integration of systems.