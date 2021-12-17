---
title: "AWS Amplify: A Frontend Developer's initial thoughts"
excerpt: "AWS Amplify seems like it does everything. But what is it really like to work with the REACT friendly AWS service?"
coverImage: '/assets/blog/aws-initial-thoughts/architecture-II.jpg'
date: '2020-12-17T05:35:07.322Z'
author:
  name: Luke Logan
  picture: '/assets/blog/authors/luke.jpg'
ogImage:
  url: '/assets/blog/aws-initial-thoughts/architecture.jpg'
---

## AWS Amplify: What is the experience really like?

Let's back up and take a look at the goal here: launch a NextJS website on the AWS network using Amplify. The site will be a (mock) pizza restaurant (because who doesnt like pizza?) and utlize **Amplify** features like authentication, a DynamoDB database, cloudfront for a CDN, REST APIs, and Analytics. As the project grows and our pizza chain goes national, we may want to integrate with their built-in notifications and interations. Who knows, there may be room to implement PREDICTIONS (like, which customers will want Pineapple?).

They have an awesome [sandbox environment](https://sandbox.amplifyapp.com/getting-started) where the building blocks of the code can be created automatically by filling out a few simple questions. That feature is a cool +1, and if you are interested in checking it out for the first time, that is the best place to start.

> TLDR: AWS Amplify had the potential of the Roman Empire, but lack of upkeep can make it go the way of Caesar.

The [amplify docs for NextJS](https://aws.amazon.com/blogs/mobile/host-a-next-js-ssr-app-with-real-time-data-on-aws-amplify/) were my landing point, and in this example, they walk you through the steps of building your first to-do app with the framework.

I had two completely different experiences here: the first was a complete train-wreck, and the second, was quite seamless. I dont want to go too far into the weeds about why the first experience of connecting a repo with Amplify backend was poor- but working through it helped me understand a lot about the build process Amplify uses, and how to configure the `amplify.yml` file to fix them- like if you need to run a specific version of Next.

Amplify is cool because the backend can be added either locally, running `amplify init`, or the backend can be set up through the amplify console in the browser with a really neat UI. After setting up the backend with the UI, simply run the command they give you: `amplify pull --appId xxxxx --envName dev`, and an `amplify` directory is created on your local machine with all of the files you might need, including types and graphql mutations, etc. After doing your updates locally, run `amplify push` to update the backend. OR, just run `git push` and your updates will trigger a new build.

The biggest sticking point that caused all the failed-builds and debugging issues with me was after the backend was integrated with the frontend.

Some of the issues I encountered included:

- I have multiple AWS accounts. It is darn near impossible to figure out which account the *amplify cli* is trying to connect to.
- When running `amplify init`, the tutorial says to accept the default configurations. This would not work, as the `Distribution Directory Path` should ne `.next` instead of `build` (build is for react, but Next does it differently)
- the build command is `npm run build` not `npm-run-start`. The start command similarly needs to be updated.
- On Firefox (my preferred browser), the default code from the repo relies on the IDBDDatabase, and gives the following error: `NotFoundError: IDBDatabase.transaction: 'datastore_Setting' is not a known object store name`.
- If using Typescript, the default version was not compatible


### Once everything is set up...

Once the frontend and the backend are set up and integrated and deployed properly, it becomes really, really easy to create a workflow, that just works.

### AWS Amplify is a great tool to use if you...

Getting my Github Repo connected and deployed was really, really easy with Amplify. After getting it connected, Amplify sets it up and deployes it for you.

If all that you want is a static site hosted and deployed really easily, this is an easy way to go.

![Amplify connect your repo](/assets/blog/aws-initial-thoughts/amplify-connect-repo.png "a title")

### AWS Amplify is not a great tool to use if you...

Want really fast build-times. There are some open issues about this, and the response from AWS has been that the build time they use to distribute assets in the cloud (using AWS Cloudfront ) is fundamentally different than the way Vercel deploys assets on their edge network.

There is a way around this IF you are ok with just using static site: in the `build` script in your `package.json` file, for the `build` command, change `next build` to `next build && next export`. This will deploy your site as a STATIC HTML site, so it is NOT using SSR, but the build time will be cut significantly.

Currently, my build time is around 10 minutes- for a super small site with 6 pages. Using `next build && next export`, the build time was cut down to around 2 minuted.


## Summary

It was hard to get things up and running the first time around. I ran into a number of errors related to outdated packages, etc. These errors especially showed up after connecting my frontend with the backend.

Now that things are set up, I look forward to using this tool to set up a mock pizza restaurant app. Follow this blog to learn about the process- and if you prefer videos, I have a screencast coming soon.
