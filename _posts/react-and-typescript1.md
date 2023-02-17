---
title: "Part 1: React + Typescript = Better"
excerpt: 'React is good, typescript is good, but together, they can be confusing'
# 640x333
coverImage: '/assets/blog/react-typescript/luca-bravo-alS7ewQ41M8-unsplash.jpg'
date: '2023-02-1T05:35:07.322Z'
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

>Is it better to leave types in a globally available `.d.ts` file, or within the component?

If it is widely used, use it in a file; *the best practice is to start out using the types within the components*.

*How do you figure out what kind of TYPE to use for an event?

Take the following component:

```js
import React from 'react';

type ControlPaneProps {
  name: string;
  onChange: Event
}

const ControlPanel = ({ name, onChange }: ControlPaneProps) => {
  return (
    <form
      className="flex flex-row gap-4 text-white bg-primary-10"
      onSubmit={(event) => event.preventDefault()}
    >
      <div>
        <label className="font-bold">Your Name</label>
        <input
          name="name"
          className="w-full"
          type="text"
          value={name}
          onChange={onChange}
        />
      </div>
    </form>
  );
};
export default ControlPanel;
```

Look on the *onChange* element; it is a function, and it is a type that gets passed in as props.

What *TYPE* should be used? Lean on VSCode to point you in the right direction. Here is an image to highlight the type hints that VS Code provides:

![Type hint in VS Code](/assets/blog/react-typescript/tsx-3.png "VS Code gives you tips for your components")

Copy and paste that value and change the `onChange` prop type definition with this value:

`React.ChangeEventHandler<HTMLInputElement> | undefined`

Defining the props and the types in the component can quickly grow out of control; **it is best to break props into a type**.

Change this: passing in each prop by name and the type:

`const ControlPanel = ({name, onChange}: ControlPaneProps) => {`

to this: using *props*, where the individual props are defined in the *type*, called **ControlPanel**.

`const ControlPanel = (props: ControlPaneProps) => {`

## What do you do about children?

This is where the honeymoon of using Typescript can come to an abrupt ending. Children of a component can be just about anything, so how do we address them?

Children can be anything: A string, an array of strings, numbers, `undefined`, etc.

The short answer, if you are passing multiple children:

`type BoxProps = { children: React.ReactNode };`

React has a built-in type, called `PropsWithChildren`, which can take other props as well, like **styles**.

The type would look something like this:

```js
type BoxProps = PropsWithChildren<{
  style: React.CSSProperties
}>;
```

and using it would look like this:

```js
const Box = ({ children, style }: BoxProps) => {
  return (
    <section
      className="m-4"
      style={{ padding: '1em', border: '5px solid purple', ...style }}
    >
      {children}
    </section>
  );
};
```

## State

Besides children, what is the other big thing react developers work with? Thats right. **STATE**.

Typescript will try and stay out of the way for you; When you set state, Typescript will attempt to ensure that all hooks, and all use of state follow the *type* set in state. But keeping it as simple as possible, by just using JAVASCRIPT in order to write tests, can help.

## Fetching API data.

If you are fetching data, often the type of data, or the **shape** of the data, is not known. Typescript is really good at figuring stuff out, but things fail when Typescript *does not have enough information* about the type, like, when the API hasn't sent a response yet.

What do you do?

You can set blank strings. There are many optional parts of the reponse from the API. THere are many either/or parts of the response.

```js
const [quote, setQuote] = useState<Quote | undefined>()

useEffect(() => {
  fetchAQuote().then(setQuote)
}, [third])
```

Then, if you hover your mouse over certain parts of the codebase, if the conditionals that help remove the "undefined" part of the code, Typescript will only show you the TYPES that remain. For example, if there is a check like `if (!quote) {}`, then all **falsy** values for quote (like undefined) will be removed; and the next time *quote* is used, it cannot have the value *undefined*.

So why use Typescript at this point?

The ways that Typescript help to ensure that your code is being written properly just grows astronomically over time.

*Any, Unknown, Never*.

When to use which? If you think you want to use *Any*, use *Unknown* instead. This is an oversimplification. *Unknown* will try and figure out the type before applying the *any* errors acrosss the whole codebase.

What if something is embedded in another component? We have to pass down everything from the parent component to the child component.

The tricky part, is figuring out the type to pass, and the type to use as the child component.

For the child, create a new type. Typically you want to use the syntax of:

```js
export type ComponentProps = {
  count: number;
  onChange: ChangeEventHandler<HTMLInputElement>;
  onSubmit: FormEventHandler<HTMLFormElement>
};
```

The `onChange` and `onSubmit` are really just autocomplete, where Typescript is trying to figure it out for you.

Give yourself a pat on the back if you have no errors coming up in your code.

If you need a type for something you dont know, but you do have the value, you can lean on the Typescript Hints to update what kinds of types are being used.

How does all this work the Dispatch? How does it work with the context api? And is there any way to automate some of the copy and pasting that we have done?

