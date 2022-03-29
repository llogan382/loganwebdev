---
title: "Part 1: Full stack on Vercel"
excerpt: 'The words that come to mind are: "the process was like a dream"'
# 640x333
coverImage: '/assets/blog/full-stack-next-1/squared.jpg'
date: '2022-03-29T05:35:07.322Z'
author:
  name: Luke Logan
  picture: '/assets/blog/authors/luke.jpg'
  # 640x333
ogImage:
  url: '/assets/blog/full-stack-next-1/squared.jpg'
---


## Deploy your next.js project on Vercel!

Have you seen those words (often) and yet ignored them? I have continually- after all, there are several hosting services out there, so why would I need to use Vercel? Plus, I dont want to have another place where I have to enter my credit card details for a "free trial", and then inevitably forget about it.

>TLDR: I tried it, and I loved it.

## What took me here

1. I am determined to use NEXTJS. The use of Routes build in, their always-current documentation, and their rapid improvments to the platform far-exceed other JS frameworks.
2. Documentation. Next.JS docs are a joy to work with. They are always up-to-date, and are very clear when features will/will not work with certain releases. My only hang up is that some explanations only use classes in their examples, but those are slowly changing.
In addition, their Github repo has examples of integrations with just about every platform you could wish to work with.
3. Features. As mentioned above, the built in pages feature means no more `React Router` or complex setups. The new(ish) `<Image>` tag is great and takes page performance to the next level. And one of the most important things (for me, as a front end engineer at this point in my development journey) is the built-in api-support. Though I am familiar with API's from a front-end perspective, I haven't had a tremendous amount of experience building APIs, and most importantly, connecting those API's to a database.
4. Quick build times. When deploying a Next.js app to Amplify, it often took 15 minutes to deploy. The reason for this is the way that AWS servers and the Vercel network handle caching on its edge network are very different, do the build times are more demanding on AWS. Here is a screenshot of the build-time on Vercel:



![Senior Web Engineer](/assets/blog/full-stack-next-1/vercel-build-time.png "Vercel build time")

Yes, the above says *51 seconds*.

# What is the goal?

It is important to stay focused on the end goal, despite the ever-changing landscape of javascript frameworks. For me, that end goal is to learn more **by building** full stack apps. The emphasis is not on design. The emphasis is having a better understanding of an app's architecture, and implementing best practices.

> The goal remains the same: Build a full-stack pizza app.

User features will include:

- creating an account
- creating an order
- customizing your pizza with toppings, crust, and size.
- Selecting your restaurant location
- Ordering as a "guest"
- Saving payment info
- Using a coupon.
- User roles: Managers, employees, customers, etc.

Developer features/tools will include:

- Typescript
- NextJS as the framework
- [Jest](https://jestjs.io/ "The best search engine for privacy"). for testing react components.
- [Auth0](https://auth0.com/ "Autho") for authentication.
- [storybook](https://storybook.js.org/ "storybook") for building components in isolation
- [redux](https://redux-toolkit.js.org/ "redux") for state management.
- [prisma](https://prisma.io/ "prisma") to connect to the DB. This is billed as an ORM, or "object-relational mapping" tool.
- Postgres for the DB.
- NextJS Api routes for the built-in API routes.
- A very clean codebase.
- Github Actions to build out a seamless devops process.
- ESlint

Is there anything missing from the list above? Please let me know.

# Where am I now?

The screenshot from above is from [this page](https://vercel.com/guides/nextjs-prisma-postgres "How to Build a Fullstack App with Next.js, Prisma, and PostgreSQL").

![Build a Full Stack App](/assets/blog/full-stack-next-1/full-stack-ss.png "Vercel build time")

This tutorial, along with the deployment process, were a breeze. This was a completely different developer experience than the many, many hours I spend trying to wrangle an amplify deployment in order to achieve success.

## What's next?

The next steps are to change this app by customizing this stack to create a fully-functionaly, full stack app for a pizza restaurant.

After feeling defeated from the lack of progress deploying on Amplify, I am optimistic about getting things up and rolling for this project. Stay tuned!
