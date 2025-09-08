---
title: "Software Architecture"
excerpt: 'Keep growing: what is software architecture?'
# 640x333
coverImage: '/assets/blog/setting-up-project/paris_pyramid.jpg'
date: '2025-09-01T05:35:07.322Z'
author:
  name: Luke Logan
  picture: '/assets/blog/authors/luke.jpg'
  # 640x333
ogImage:
  url: '/assets/blog/setting-up-project/paris_pyramid.jpg'
---


I'be been listening to a podcast recently- its what I do when I take a minute away from the desk and the deep work I am committed to, and go out for a 30 minute run or so. If you aren't taking time away from your desk to get out and exercise, I encourage you to do do, but I digress. 

This podcast is a little different than the other ones I listen to in that it goes a bit deeper on some concepts, rather than sticking with the Javascript ecosystem in particular. From the podcasts website:

> Book Overflow is a podcast dedicated to helping software engineers improve their craft and careers by discussing the best technical books in the world.

One of the books I gobbled up after listening to the podcast was the [Fundamentals of Software Architecture.](https://www.amazon.com/dp/1492043451?bestFormat=true&k=fundamentals+of+software+architecture+an+engineering+approach&crid=2TIRHTEJP6HZ&sprefix=fundamentals+of+software+a&linkCode=sl1&tag=bookoverflo00-20&linkId=117894807019b800d0746110507193d0&language=en_US&ref_=as_li_ss_tl), and its a great place to start digging into this topic. 

One valueable thing I learned from this book is that tightly-coupled software is not always a bad thing. In the past, I had always heard that tightly-coupled is strictly frowned upon, and an anti-pattern that is to be avoided like the plague. *Maybe this isnt true?*. To go back to the main, repeated mantra of the book: **Everything is a tradeoff**, and tightly-coupled software is no exception. 

The advantages of tightly-coupled is that it is easy to reason about and easy to iterate on (initially anyways). The tradeoff comes in where if the goal of the business is to iterate on a feature quickly, and the feature is not a very complex one, tightly coupled is ok- and this explanation was a brilliant one for me to hear. 

Of course there are patterns of software architecture to get into- the book covers some of the older patterns from the pre-cloud days, and the patterns used commonly now: specifically, microservices. 

An area of passion for me has always been testing, and the reason for this is that proper testing coverage allows me to iterate quickly without fear of breaking things downstream. This is something that has been a priority in some of my employers, but not in others, and I have discovered the pros and cons of both views. Personally, if my code is going to break something, I want to fail-fast, rather than wait for human QA to identify something several days after working on the feature. 

When it comes to architecture, testing is easier to implement in some patterns than it is in others- again, just a tradeoff. 

Talking about systems architecture decisions can be tough- when things grow and become complex, there may be many "heads" involved with every decision in the process- and not every detail is important. As an engineer, communicating the "Why" instead of the "how" helps a tremendous amount. I know a lot about software- and can easily get lost in the overanalyzing part of a feature, asking "Why are we doing it this way?" and sometimes thinking, "this is dumb." Starting from the high-level, and sharing "why" something is done the way we are doing it can help save a ton of time. 

My wife works in leadership training, helping CEOs and other leaders in large organizations implement changes. *Alignment* is the phrase used to describe what I am referring to here: having the architect share "Why" something is done a particular way can align all of the engineers and other people working on the project with the design patterns being used and help maintain consistency in the project. This can help with all parts of the process, and I can't emphasize this part enough. The whole team should be aligned with the "why" of a project to move together in the same direction. 

