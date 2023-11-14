---
title: "What to learn next as a senior software engineer"
excerpt: 'Mastering Javascript is hard. Learning to apply best practices to a number of projects is even harder'
coverImage: '/assets/blog/preview/cover.jpg'
date: '2023-11-14T05:35:07.322Z'
author:
  name: Luke Logan
  picture: '/assets/blog/authors/luke.jpg'
ogImage:
  url: '/assets/blog/preview/cover.jpg'
---


![alt text](https://learning.oreilly.com/library/cover/0201633612/250w/)

Let's take a look at *Design Patterns*. This was a book recommended by a co-worker, and it takes a deeper dive into the architecture of code.

**Why read this book?**

Let's start with an example. I am a software engineer, and my only experience has been with Javascript. This has served me well as a frontend engineer. When I started learning react, the framework was moving away from class-based components and beginning to move towards a functional-component approach.

**Where am I now in my learning journey?**

You may be thinking you are a software engineer, and can build something pretty good. You can use react, connect it to a database, have a frontend and backend, can do some auth, and boom! You have a full stack app.

Let's drill in a little deeper on this example with something like an app for a pizza restaurant. Let's say it is a react application, and it has a menu, a way to update/edit the menu, stores some images, etc. It also has a way to order pizzas. Now we are getting into the backend side of things, and if you have an order, it will need to be linked to:
1.    A customer; this will have a name, contact info, etc. They will also need an order history, payments method, and more.
2.    Menu items. This will include size, price, if they have ordered it before, etc.

So far, so good. Let's say you wanted to build this kind of app. If I was going to build it, I would build it in NextJS. Build out the mock designs; use **PRISMA.i** to create a postgres database.
The next part is where things get complicated. At work, we are using intermediate systems between the front end *and various backend systems* to integrate everything. What does this look like for our pizza app?

Let's say you have built react server components for a User, and a Menu, and an Order. For each order, you are linked to a customer and some items from the menu; an order will also need to be paid for, so there is a payment integration.

Also, for each order you may want to send the customer updates on their order. Eventually, you may want to send emails to the customer about specials, promotions, and more. For the order, additional payment methods may want to be included eventually like Apple Pay, venmo, etc. Those payment systems may require a new set of data to be submitted for each payment. When that happens, where will that new data structure be created? Or, to make it a little crazier, another location of the restaurant may open up. How can all of that be included in the application as it grows and changes, while keeping all features isolated?

If that wasnt enough, let's look at the infrastructure of an application like this. I am a javascript engineer.

However, when I deploy to my preferred environment, where is it being hosted? What if the server goes down? How is it connected to the database, and how will my database be backed up? What if the database goes down? Some systems like Next have some great integrations where mych of that decision making is made for you. But what if you wanted to deploy to a digital ocean droplet?
Object Oriented JS isnt where the programming language really shines. However, I am getting more familiar with it as I use NestS for some backend projects, and I am hoping that this book will help provide a framework for building scalable apps in Javascript Ithat can grow easily as new features are added, like some of the use cases listed above.

In short, this is my personal weak-spot as a self-taught engineer: I didn't learn these concepts as part of a CS degree. And in real life, applications don't live and function in isolation. If they did, then my skills would be perfectly sufficent for a pizza restaurant app. The truth is that systems work along with other systems, and must be built to scale, grow, and integrate with these systems. For our pizza application, not only will we be taking orders, but we may want to integrate with a system like Uber Eats. My goal in reading this book is to apply that concept to an app like a pizza restaurant. Then, the principles learned can be applied to understand various codebases everywhere
