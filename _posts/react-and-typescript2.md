---
title: "Part 2: React + Typescript = Better"
excerpt: 'Reducers and the Context Api'
# 640x333
coverImage: '/assets/blog/react-typescript/2-7-23-v3.jpg'
date: '2023-02-17T05:35:07.322Z'
author:
  name: Luke Logan
  picture: '/assets/blog/authors/luke.jpg'
  # 640x333
ogImage:
  url: '/assets/blog/react-typescript/2-7-23-v3.jpg'
---

*This is a continuation of part 1, which can[ be found here](https://loganwebdev.com/posts/react-and-typescript1). Both posts are notes from a course taught by [Steve Kinney](https://stevekinney.github.io/)*

# Typing Reducers.

There are some built-in ways to manage state. `useState` is just an abstraction of `useReducer`, which takes two items in, looks at the difference, and returns a singular updated value.

Use Reducer is the backbone of Redux. When can you use it? If there are several `useState` hooks being used, it will be best to use the hook, `useReducer`.

What is useReducer?

It is a Javascript function, it takes the state, a function, and it returns a new state.

How do you think of STATE in an application?
There is LOGIC for the application, and there is business-logic for the application as well.

Logic can be things like, is this form valid? Or, is this dropdown open or closed? Those things may not be necessary in the `useReducer` hook for the application. As a function, you can write tests for it too, to ensure that it always returns the right value and type for every use-case.

Here are some situations where it might be useful to implement a reducer:

- You need a first name and a last name to be entered to get a full name
- You need a username with an ID
- Values from a form get combined.
- Totals get calculated from various parts of a form.

The complete application STATE gets derived in these instances from other values of state, so UseReducer is your friend here; it can keep track of these things.

In REDUX, all actions have a TYPE property; they are usually a string. After that, there are no rules, so TYPES can be anything.

However, there can also be a PAYLOAD, which includes everything you need to know about that property. In this case, the PAYLOAD includes the new value.

```js

import { useReducer } from 'react';

type InitialState = {
  count: number;
  draftCount: string | number;
};

const initialState: InitialState = {
  count: 0,
  draftCount: 0,
};

const reducer = (state = initialState, action: any) => {
  console.log({ action });
  const { count, draftCount } = state;

  if (action.type === 'increment') {
    const newCount = count + 1;
    return { count: newCount, draftCount: newCount };
  }

  if (action.type === 'decrement') {
    const newCount = count - 1;
    return { count: newCount, draftCount: newCount };
  }

  if (action.type === 'reset') {
    return { count: 0, draftCount: 0 };
  }

  if (action.type === 'updateDraftCount') {
    console.log('updateDraftCount');
    return { count, draftCount: action.payload };
  }

  if (action.type === 'updateCountFromDraft') {
    return { count: Number(draftCount), draftCount };
  }

  return state;
};

const Counter = () => {
  const [{ count, draftCount }, dispatch] = useReducer(reducer, initialState);

  return (
```


Notice the *any* used above; it breaks everything. Autocomplete doesnt work anymore. There are many typescript errors that appear. No errors appear when the code runs, but there is no `action.type`, so the code doesnt execute.

So how can this be fixed?

Lets look at the code. It can be one of any action.type, which is a string. It might have a payload.

Here is the updated version, removing the `any` found above. By creating action types, autocomplete works, and the functionality of the counter works too, because the app knows what kinds of actions are being passed in, and what to do with them.

```js

type ActionWithPayload = {
  type: 'updateDraftCount',
  payload: Number;
}
const initialState: InitialState = {
  count: 0,
  draftCount: 0,
};

const reducer = (state = initialState, action: Action | ActionWithPayload) => {

  // Rest of the component code goes here.
```

By removing this one and only `any` being used in this app, all sorts of type safety is implemented to ensure that the proper type and payload are being used when and where they need to be used, so you don't forget to pass in an action or a payload if you don't need to, and it will remind you if you need to pass in an action or payload if you failed to do so.

Here is a fun idea for how to practice these concepts: Create a dummy form and play with these features on your own app.

Build some types, create some reducers. For example, create a form, where you add a field for first name, last name, etc. Then, display a full name (and maybe some other information) at the top of the page; Or, even better, display that information on another page, where the STATE is consistent across the app. Can you do this?

OR, to go into an area that can be a tremendous source of pain for Javascript developers, do something with TIMES and DATES. One idea that comes to mind: Pick two dates, and tell the difference between those dates.

My wife and I just met with our financial advisor to figure out what to do with the $285 dollars we have saved so that we can retire one day, and this can be used as an idea too: Create a financial planning application, where you take in some inputs like current year and retirement year, plug in the amount you have saved, and look at how compounding interest can get you where you want to be by the age of retirement.

I'll do this in the near future, and get back with my approach; of course, there are no wrong answers, so what is the best way that you can implement this kind of feature?

## Typing and refactoring.

Each iteration through a react component can surface more and more "red squiggles". Knowing where these "red squiggle" errors come from can be frustrating, but it can also be an exercise in getting more familiar with your system and the tools available.

This is especially true if you are using Redux and passing in dispatch/props.

Here are some tips to use when trying to narrow down the source of your errors:

1. Did auto complete stop working? If so, something is broken.
2. Is the type exported from the file with the definition?
3. Are you using `any` anywhere? Remember, this is like a cancer, and will spread through the application and break functionality in many different components; work diligently to remove them.
