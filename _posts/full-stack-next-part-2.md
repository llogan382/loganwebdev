---
title: "Part 2: Full stack on Vercel"
excerpt: 'The pieces are together'
# 640x333
coverImage: '/assets/blog/full-stack-2/bady-abbas-hxi_yRxODNc-unsplash.jpg'
date: '2023-01-12T05:35:07.322Z'
author:
  name: Luke Logan
  picture: '/assets/blog/authors/luke.jpg'
  # 640x333
ogImage:
  url: '/assets/blog/full-stack-2/bady-abbas-hxi_yRxODNc-unsplash.jpg'
---


## How I did full-stack, as a front-end engineer.

This is actually an embarrassing admission, and I hope I am not alone in this: I don't actually know how the "full-stack" works. Projects that I have been involved in in the past involved a lot more CSS and styling, implementing designs, creating API calls (not Creating APIs, that is different), adding features, fixing bugs, etc. But there are many parts of "the stack" that I have not worked with, and still seem like the "magic" behind the web; things like authentication, databases, server-database connections, "the edge", database types, and more have always been a part of the responsibilities of other teams in my journey, up to this point.

This doesnt even include things that go on in the devOps side of things, which can include:

- Github Hooks
- [Jenkins](https://www.jenkins.io/)
- [Docker](https://hub.docker.com/#!)
- [Kubernetes](https://kubernetes.io/)
- Networking and security

It's overwhelming at times. But it can be a helpful, and humbling, reminder to take it one step at a time. For this project, I am focusing first off on the "full stack", and then will proceed to learn more about how Devops can help things.


![The full stack](/assets/blog/full-stack-2/1904.i305.019.programmer.jpg "Vercel build time")

## Where I have been, where I want to be.

Experience with the front-end has exposed me to various technologies. I am grateful for having experience with the following aspects AND technologies:

- Accessibility
- Testing, in various forms, including:
  - [cypress](https://www.cypress.io/)
  - [selenium](https://www.selenium.dev/)
- Development in isolation using [storybook](https://storybook.js.org/)
- Type safety with [typescript](https://www.typescriptlang.org/)
- ReactJS for creating sites using components
- [Redux](https://redux.js.org/) for state management

But the elusive question for me was, how can I build an app that can do some of the basic parts of a simple website? Things that a user expects? How can I take my frontend expertise, and build out something? What else would I need to add to the tools I am already familiar with?

Besides my frontend tech, I would need to:

- Create APIs (NextJS can do this)
- Create login/Authentication (NexxtJS Auth can help)
- Create a DATABASE. I have no background here.
- Ensure data is stored as the proper type for the database.
- Write DB Queries
- Organize the DB
- host the database somewhere

So far, so good. The biggest part to navigate would be the scary task of selecting the right database, and building the proper database schema. This area of computer science is *so big*, and has *so many* different ways of being implemented, it is very hard to get started. The best phrase that comes to mind is, how do you eat an elephant? 1 bite at a time.

## Two database types, really.

Databases are either relational (SQL) on non relational (NoSql). There are an impossible amount of "right answers" to this I know, but what is the easiest way for a front end engineer to get something up and running?

Use a template.

NextJS, the superior framework, has several templates already created for setting up a framework that connects to a database, and the most popular databases that I hear about on twitter are [mongodb](https://www.mongodb.com/) and [postgresQL](https://www.postgresql.org/), so it comes down to, which type to use?

[Here is a great article](https://www.geeksforgeeks.org/difference-between-sql-and-nosql/) explaining some of the important differences between the two.

## Local development

One of the greatest perks in front-end development is how great the local setup can be. The cloud can seem intimidating, and as often as possible, I prefer to do as much work locally as possible. It helps keep things in my control, including caching, errors, etc. This doesnt include the pricing. If hosting somehting like a database in the cloud, there is a chance that you can be hit with a surprise bill if you don't know what you are doing; basically, if you are a person like me.

## What does the flow of information look like?

I build the user interface on the front end. This is what the site looks like, and can be handled with NextJS.

The app needs a way to make calls to the DB to get the info it needs. These calls cannot run in the browser (where the user can alter the calls). Calls to the DB need to happen in the backend, and they are often in the form of *api calls*. This is also controlled by NextJS, and can be written in Typescript/Javascript.

The data from the application needs to query the database properly. The app needs a way to interact with the database, using the same language as the database. **This is where I learned a lot**. Depending on your database (for me it was NoSql using Mongo, or Sql using Postgres), the way the app will CREATE, READ, UPDATE, or DELETE (CRUD) data will need to be written in. MongoDB is pretty versatile, so these queries can be written in most programming languages. For SQL databases, this would mean writing SQL queries.

Though I tried MongoDB, I ended up going with PostGres. So how will my API interact with the DB to get all of the updated information? How will I write SQL queries? Luckily, there are many resources available to use, but because I wanted to take the easiest route (because this was my first time creating everything from scratch), I used one of the templates on the NextJS website: Prisma.

So far, this is what we have:

Front end -> API -> How to make DB calls? -> PostGres.

## The missing piece

In short, the answer was [prisma.io](https://www.prisma.io/). It can take your code, and create the appropriate calls to the DB. With just the change of one line of code, you can change your database from PostgresQL to MySql.

After adding the latest from Prisma, and setting up a database on Amazon (be sure to use the version on the free tier!), my site was up and ready to go.
