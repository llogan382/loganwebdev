---
title: "How to build a full stack app on AWS Amplify and NextJS: Project Roadmap"
excerpt: "What is the best route to take to implement a scalable, testable, nextjs app following all best practices?"
coverImage: '/assets/blog/setting-up-project/paris_pyramid.jpg'
date: '2020-12-20T05:35:07.322Z'
author:
  name: Luke Logan
  picture: '/assets/blog/authors/luke.jpg'
ogImage:
  url: '/assets/blog/setting-up-project/paris_pyramid.jpg'
---

## Goals for building a full-stack NextJS on AWS Amplify.

A well-architected app starts before the first line of code is committed. What I mean by that is that there needs to be a whole lot of planning involved before sitting down and churning out code. I don't know about you, but when I am starting a new project, my tendency is to jump right into the code and see something on the screen.

This time around, I want to do things a little different. This app is going to be a little slower, a little more intentional, and a LOT better than apps I have built in the past.

This is going to be a NextJS app that follow best coding practices, and is built using AWS Amplify as the backend.

## Best Practices: Tech Stack

What do I mean by best practices? What I mean is that the code is going to be readable. No matter who looks at your code, or where a component is being used in the app, any outsider should be able to look at that piece of code and know exactly what it is doing. There are some great pieces of technology that can help an app get there, and here are a few that will be implemented into our restaurant app:

1. [React Testing Library.](https://testing-library.com/docs/react-testing-library/intro/) Kent Dodds is amazing. I haven't dont any of his courses, but I know a lot of people have. His React Testing Library adds testing to an application, so you can know that any changes you push will have tests that cover all functionality on the site, and if anything breaks, you will be notified before it gets deployed into production. One thing I really appreciate about his library is that it is a11y compliant- meaning in order to write successful tests, you must target the parts of the site *via their accessible properties* in order to write tests, so this is an extra step to ensure that a site is ADA compliant.
2. [Cypress Testing Library.](https://github.com/testing-library/cypress-testing-library) You might be thinking, "Wait, Luke, didnt you just list a testing library? Why would you have another testing lbrary?" There are tons of reasons, but the more testing, the better. Cypress integrates nicely with React Testing Library, and goes a step further: It can do browser testing on a variety of browsers/devices. This is important to catch if, for example, our menu works great on Chrome on windows, but if a user is trying to look at the menu on mobile-safari, they cannot click the "x" button to close the menu- I want to know about it. Cypress is the best tool for the job, and I am looking forward to jumping back into using it again.
3. [Storybook](https://storybook.js.org/) This is an awesome way to visualize the apps that you are writing. As you write, and your component library grows in number and complexity, you are going to want to have a way to document what each component does, and the props that are used in each component. Also, if you write your components in isolation (Which storybook can help you do), you can can have cleaner code that does not depend on props from other components.
4. State mangement. I am not sure what to use for state management, but I am open to suggestions?

## Other Tech that will be used

1. [Formik](https://formium.io/). I recently read that the founder of Formik, the form-builder library, joined the NextJS/Vercel Team, and I anticipate some cool things coming as a result of his joining. Ok, lets get back to this app: We are building a pizza-restaurant app, and much of the user-experience on this kind of app is through forms. Ordering the pizza, creating an account, using coupons, credit card info, reservations- everything is going to need to go througha form, and a simple, consistent form template will need to be used. I have used formik a lot on other work-related projects, but for the most part, the heavy-lifting and implementations had previously been set up by others on my team, so I look forward to wiring up some formik forms as we get going.
2. Typescript. I used to be a JS-only kinda guy, but I have become a believer in the power of TS being a MUST HAVE for *enterprise level* applications, and here is why: When you write your own JS code, it doesnt really matter how you write it, or whether you are consistent or not, becuase *you are the only one reading it*. At scale, TS is a tool to essentially force your team to play by the same set of rules. For example, if a funciton is used in a component, it must be used with the same types of props each time, or TS will let you know, and *politely* ask you to make some changes.
3. Authentication. Currently, I am debating between using the industry-standard [Oauth](https://oauth.net/), and the built-in AWS authentication service. Either way, this will be important to show each user the right information about their orders, and keep that information private.
4. Security. Again, I am a front-end developer, and havent had experience working much with security of apps: typically they are set up before I work on a project, and/or they are the responsibility of another team. However, I look forward to digging into the deeper layers of security to be implemented, though at this point I am not sure what tools this will consist of.
5. Stripe. For payments, this is the industry standard. I personally havent implemented this on any projects before (besides tutorials), but I look forward to getting something up and running here soon.

<!-- 1. Show the end result: how to add data, and show it on frontend.
1. Set up in Amplify (make sure it is the right acct). Icloud
2. Set up AWS CLI. Here is the link. https://docs.aws.amazon.com/cli/latest/userguide/getting-started-install.html
3. run `which aws` to confirm.
4. In AWS, click "launch studio"
5. Data > add model, then deploy.
6.  Create git repo
7. `npx create-next-app`
8. call the app `next_great_pizza_restaurant`
9. run `npm install aws-amplify`
10. run `npm install react-markdown`
11. cd, then `git remote add origin ...`
12. Back in AWS amplify console, run `amplify pull`. Wait until browser asks you to login.
13. Terminal: Walk through the config.
14. Back to Amplify Console, for hosting, add the repo.
15. Amplify Console: update Env Variables. `VERSION_NODE_16` value `16.13.1`
16. Back to Amplify studio, the data model should be complete.
17. Amplify studio, add some mock content.
18. add `pages/posts/[id].js`
19. update `index.js`
20. update `_app.js`
21. Show what it looks like locally.
22. git add all to the cloud, and wait. -->
