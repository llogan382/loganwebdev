---
title: "Why I'm not building on AWS"
excerpt: 'It is more important to build successfully than it is to debug and problem solve continually'
coverImage: '/assets/blog/bye-bye-aws/tunnel_checker.jpg'
date: '2022-03-03T05:35:07.322Z'
author:
  name: Luke Logan
  picture: '/assets/blog/authors/luke.jpg'
ogImage:
  url: '/assets/blog/bye-bye-aws/tunnel_checker.jpg'
---

## It's complicated

Let me start by saying that this may be an unpopular opinion, but it is worth exploring. Things have changed, and I have learned a lot, and I have gotten stuck a lot, which has forced me to take a step back and look at my goals.

## What are the goals of this project?

The goal: To build a fully-functional, full stack app where I (a frontend engineer) can learn about the backend. The app is a pizza restaurant, and the backend features that I want to learn about as I build include:

- APIs
- Databases
- Authentication
- Scale
- Payment systems
- Implementing best practices
- using tests, Typescript, NextJs, etc
- User serverless architecture
- Forms
- Security
- CI/CD
- State Management Systems (Redux)

## What are the options?

AWS Amplify, NEXTjs on Vercel, Gatsby, Netlify, and Remix are all vying for attention in this space. They are all good, and the purpose of this post is not to explore all of the advantages and disadvantages of choosing any one over the other.

I chose Amplify because ultimately, I want to grow more in backend development and architecture, and the integrations that AWS amplify offers seem like a great fit to learn more about frontend architecture and patterns, while digging a little deeper into a new topic.

However, I got stuck. Often. The documents changed frequently. NextJS does not work seamlessly with the Amplify build process. API's didnt connect properly. The data I wanted to build wasnt stored in the DynamoDB tables properly.

Help forums on these topics were full of others experiencing similar frustrations. The discord channel also confirmed that problems abound, with recommendations to use older versions of NextJS until features could be added properly. Overall, it became disheartening, and my posts here were put on pause, and I could not make the video I was hoping to share of how to successfully create a fullstack project.

## Senior Developer Guidance.

![Senior Web Engineer](/assets/blog/bye-bye-aws/bg.png "a title")

While chatting with a senior engineer from a recent project I worked on, I shared these thoughts with him. Without blinking, he recommended Netlify. Setup is a breeze, and he said that he has never taken the time to understand AWS yet because he hasn't needed to. So why spend time on working out bugs instead of spending time actually building stuff?

This guy is no-nonsense. So, if it is good enough for him, it is good enough for me.

For right now, even though it is not the best time to explore the depths of backend architecture, I can continue to dig deeper into the wild world of frontend engineering that I love so much.



