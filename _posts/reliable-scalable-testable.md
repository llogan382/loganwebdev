---
title: "Reliable, Scalable, Testable Code"
excerpt: 'what is the role of AI on the team?'
# 640x333
coverImage: '/assets/blog/hello-world/cover.jpg'
date: '2025-09-22T05:35:07.322Z'
author:
  name: Luke Logan
  picture: '/assets/blog/authors/luke.jpg'
  # 640x333
ogImage:
  url: '/assets/blog/hello-world/cover.jpg'
---

# Reliable, scalable, testable code. 
Companies that ship daily- or multiple times a day- have something in common. We all wonder, "how do they do that? How can we imitate their processes?" And I have news for you: it is simple and obvious, but also hard to pull off. 

## Easier said than done. 

Let's unpack that a little bit: in order to accomplish this deployment frequency **with confidence** the team has to be able to make changes to their codebase with confidence knowing that nothing will break on deployment. 

This is accomplished in a few ways:
- Unit Tests to cover the code being written, and the dependencies being used. 
- Snapshot testing to see if any UI changes (or unintended UI changes) arise. 
- E2E tests. These are slow, but can be pretty comprehensive. 
- API tests to check if calls to other services are working *more on this in a minute*. 

In addition, the code has to be **easy to reason about**. What I mean by this is that the code has to be self-documenting. There are no crazy abstractions, no abundance of imports or dependencies. Functional programmers would call it "Pure". They are functions written with no side effects. 

These things are pretty well understood, so why isn't everyone doing it this way? Let's go a bit further. 

Real code in the wild is a bit different: they are deeply embedded in multiple systems. **THe architecture of the system is complicated**. The project being worked up? It is not clear-cut and self-sufficient. Codebases often rely on many, many external systems *hello, microservices!*. 

Things like authentication, payment processes, inventory, user permissions (within the application, and within external systems) all play critical roles in a system and how it performs. Writing tests for these things is crazy- its a serious uphill battle. And even if the desire is there to cover these instances with appropriate testing, how can management buy in to this- that dozens of dev hours will be needed to pull it off, while putting a stop on new feature development in order to do so? This is a delicate dance, and books are written about it. 

## Not every app has the same requirements. 

This is where the Software Development Lifecycle comes into play, and it goes a little somehting like this: 
1. Prototype an idea. *Just try and get approval*
2. Rapid growth. *Gotta get users and create features to create revenue.*
3. Sustainability. *There are users on the app, gotta solve their problems and scale*. 

There are variations to this, but most applications fall somewhere on the spectrum of the steps outlined above. And if we want to look at how scalable, reliable, and testable code can be added, it has to be viewed through the lens of one of the steps above. The business may not care if it is testable if it is not profitable with paying customers. And if an idea is just being developed as a prototype, building in options to scale and add tests is not time well spent. 

## What is the goal, and how to get there?

The goal is threefold:

1. Have test coverage that is reliable, so new code can be deployed with confidence. 
2. Have code that is testable. The code is broken down to smaller functions that can be identified quickly if problems arise. 
3. Tests that mock the real-world application. No code operates in isolation- it is always part of a bigger system (either monolith, microservices, or other architecture pattern). 

And the only way to accomplish this is to have a team lead that is passionate about enforcing this from the ground up. Here are a few examples of what I mean:

- If working with authentication, mock the APIs and the response. Something like Mock Service Worker (MSW) is a great service. Tests should cover the various authetication type responses.
- If storing authentication/authorization in state using React Context, use [React Testing Library](https://testing-library.com/docs/example-react-context/) to cover the various use cases. 
- Use a local version of the database with the same shapes of data as prod. This will give developers the confidence to make and view changes made, and see how it impacts everything, from API calls, to the data modified in the DB. With Docker, anything is possible. 
- Keep the code clean and follow best practices. Code should be simple, and clean; I worked at a place with 500+ lines of code for a single function, that referenced state from other parts of the file, and this just created an impossible situation of code that is "easy to reason about" or test in any meaningful way. When the code is broken down to smaller pieces, it is easier for other devs to check, easier to write tets for, easier to debug, etc. Just make it a habit, you wont regret it!
- If starting with an established codebase, start with E2E testing. Cypress is a great tool, then go in and debug/break apart code into smaller, more manageable units. 
- Lean on AI for this. It is a great tool to break things into smaller pieces, add tests, increase test coverage, etc. 

## What is the takeaway?

Testing and iterating on code go hand in hand. It brings value to the business by allowing more speed and flexibility later on in the product development lifecycle. 

Yes, testing is boring. But, is a slow-moving, bug riddled codebase any more exciting? With AI tools, testing should be included as a part from the very beginning, and enforced by the team lead. If not, new features get added, AI adds to the codebase, and it ends up in an impossible situation to remedy. 

If the application has external dependencies, lean on the tools to mock those API responses to include in unit tests, etc. 

Cypress keeps growing and adding new features- like component testing, to check each items in isolation. 

All I really want to convey is that **testable, reliable code is a natural product of great codebases**. It is easy to add with solid engineers that care about the codebase and have the foresight to know the alternative. Its easier to add in the beginning than as an after thought, and must be enforced along the way. 

The end-product is worth it: a complicated codebase where new features can be added and deployed with confidence, knowing that tests (locally or in the pipeline) will catch any errors, and if it breaks, automatically rollback to the last stable release. We can do this!