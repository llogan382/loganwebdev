---
title: "React + Typescript = Better"
excerpt: 'React is good, typescript is good, but together, they can be confusing'
# 640x333
coverImage: '/assets/blog/react-typescript/luca-bravo-alS7ewQ41M8-unsplash.jpg'
date: '2023-02-29T05:35:07.322Z'
author:
  name: Luke Logan
  picture: '/assets/blog/authors/luke.jpg'
  # 640x333
ogImage:
  url: '/assets/blog/react-typescript/luca-bravo-alS7ewQ41M8-unsplash.jpg'
---


# File formats

Use `.tsx` as the file as the extension. It is the same thing as `.jsx`. But what makes it a TYPESCRIPT component?

> The only thing unique about TS components, is the extension.

Typescript will try and figure out as much as it can for you.

Take the following component. It is pasted as an image so you can see what VSCode offers as a benefit when using Typescript:

![TSX Component in VS Code](/assets/blog/react-typescript/tsx-component.png "VS Code gives you tips for your components")

VS Code tells you it is a function on its own. If you hover over some sections, you can see what it is. These typings, or hints, can tell you what the component should be.


  "devDependencies": {
    "@types/jest": "^26.0.23",
    "@types/node": "^15.6.0",
    "@types/react": "^17.0.2",
    "@types/react-dom": "^17.0.5",
    "autoprefixer": "^10.2.5",
    "postcss": "^8.3.0",
    "tailwindcss": "^2.1.2",
    "typescript": "^4.2.4"
  }
