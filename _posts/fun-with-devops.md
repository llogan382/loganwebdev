---
title: "Fun with Devops, part I"
excerpt: 'What is a proper roadmap for learning devops in 2023?'
# 640x333
coverImage: '/assets/blog/fun-with-devops/building.jpg'
date: '2023-01-09T05:35:07.322Z'
author:
  name: Luke Logan
  picture: '/assets/blog/authors/luke.jpg'
  # 640x333
ogImage:
  url: '/assets/blog/fun-with-devops/building.jpg'
---

# Devops is growing at a rapid clip. Where to begin in 2023?

Over the past several weeks, I have begun to learn devops, namely because it seems like a black-box of coding-magic that happens behind the scenes, and I have always been curious to learn more about exactly what is going on in that part of the build-and-release cycle.

I am a front-end engineer. Building applications in React, and learning as much as possible about using templates and re-usable patterns, while avoiding code-bloat has been my primary motivation. But after running `git add . ; commit -m "fixes- bugs related to ticket 44858" ; git push`; There are build processes, and, if the build is successful, my feature will launch.

If the build is not successful, there are logs to indicate exactly why.

Here is a recent example of some build logs that needed to be addressed (exact codes have been randomized)
```
Error: P1001: Can't reach database server at `website-dev-environemtn.gieufms68h.us-east-1.rds.amazonaws.com`:`5432`
Please make sure your database server is running at `website-dev-environemtn.gieufms68h.us-east-1.rds.amazonaws.com`:`5432`
Error: Command "npm run build" exited with 1
```

These logs are not something to take for granted. This build was an easy one to fix. But when working on a team, these error logs need to point exactly to the problem, to help fix the error, and allow the new feature to be shipped properly.

## Devops is the answer

According to the AWS Devops Certification training, Devops is more than a set of tools (though it includes a set of tools). They define devops as:

> *The ability to deliver apps at high valicity, faster than orgs using traditional software devlopment. It emphasizes better collaboration.
> It consists of three things:

>  1. Remove barriers and sharing responsibility
>  2. Processes developed for speed and quality
>  3. Tools that align with processes and automate tasks, making releases more efficient and code reliable.*

Devops is a **methodology** of sorts, to help build, devlop, and ship at a faster, more reliable rate.

## The roadmap

When looking at something new, my wife and I have a system that tends to work. We learned this system early in our marriage, and it still tends to be pretty successful for us (we have been married 12 years). The system is this: if there is a new topic we need to make a decision on, and neither of us have any experience, we rely on an expert, an outside-party to help us understant what is important in order to make the decision together. Otherwise, we both create opinions about things we aren't familiar with, and it often ends up in an argument.

With Devops, it is much the same. I have a limited amount of experience, yet this is one example of a roadmap for learning devops in 2022 (similar roadmaps for 2023 are not available, at the time of this writing):

[![Devops Roadmap, 2022](/assets/blog/fun-with-devops/roadmap.png "Devops roadmap, 2022. ")](https://roadmap.sh/devops/)

## Waypoints to use.

A few names pop out as reliable technologies- something I have worked on in the past, and these are the points I wish to start with, as they are cornerstones in the project I am working on currently.

1. Docker
2. Jenkins
3. Kubernetes
4. Git/Git Hooks.

That being said, this is where we will start.
