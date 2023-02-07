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

# Assumptions

The following assumes that you know what typescript is, and the basics of why it is needed:

1. Type inference
2. Javascript Compile Time
3. Javascript run time.

Typescript helps to speed these items up.

# File formats

Use `.tsx` as the file as the extension. It is the same thing as `.jsx`. But what makes it a TYPESCRIPT component?

> The only thing unique about TS components, is the extension.

Typescript will try and figure out as much as it can for you.

Take the following component. It is pasted as an image so you can see what VSCode offers as a benefit when using Typescript:

![TSX Component in VS Code](/assets/blog/react-typescript/tsx-component.png "VS Code gives you tips for your components")

VS Code tells you it is a function on its own. If you hover over some sections, you can see what it is. These typings, or hints, can tell you what the component should be.

Most errors in our applications are Type errors, so this can help; typescript figures it out for you.
In TS, you dont have to use prop types; Typescript is able to tell the return types, but it cannot tell the types that are passed in to a component as a prop, so you should help it out by providing types as often as possible.

Take the following:

```js
const NameBadge = (props: {name: string}) => {
  return (
    <section className="badge">
      <header className="badge-header">
        <h1 className="text-5xl">HELLO</h1>
        <p>My name is…</p>
      </header>
      <div className="badge-body">
        <p className="badge-name">Steve</p>
      </div>
      <footer className="badge-footer" />
    </section>
  );
};

export default NameBadge;

```


Being explicit about the props, and what is expected, helps.

Now that you know the props are a string, TS will only show you the STRING methods, as they can be used for the props:
(again, this is an image so you can see the hints VS Code provides)

![TSX Component in VS Code](/assets/blog/react-typescript/tsx-2.png "VS Code gives you tips for your components")


Adding this part can help for unit tests looking for types like `null` or `number`, if they are passed in:

`const NameBadge = (props: {name: string}): JSX.Element => {`

If you are migrating from proptypes, you can add `allowJs` into your `tsconfig` file, and convert your proptypes using the npm package `prop-types`.

Converting can be fairly easy, but be sure to check out the `tsconfig` file to make sure it is set up properly.



