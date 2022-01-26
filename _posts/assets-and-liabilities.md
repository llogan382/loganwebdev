---
title: 'Full Stack: from a front-end perspective.'
excerpt: 'The past month I spent time working with AWS amplify to get some basic foundations of a website going. There were many, many issues, but the first place to start was the holes in my own understanding.'
coverImage: '/assets/blog/assets-and-liabilities/tree_wall.jpg'
date: '2022-01-26T05:35:07.322Z'
author:
  name: Luke Logan
  picture: '/assets/blog/authors/luke.jpg'
ogImage:
  url: '/assets/blog/assets-and-liabilities/tree_wall.jpg'
---
# Full Stack: from a front-end perspective.


> Special note: In this article, I make a few comments about how the documentation for AWS Amplify are not accurate. This is a known issue. Even during the past few weeks, the official docs for many services listed below have been updated. I look forward to a much smoother developer experience in the months to come.

My name is Luke. I am a front end engineer, and I have a confession to make: I don't know much about API's. *gasp* I know, I know- APIs are easy-peasy, and why the heck don't you know anything about them? And the answer to that is two-fold:
1. I have **some knowledge** about APIs, especially as they pertain to the front end of a website. But I do not know much about **building APIs**, and the other related magic that happens on the backend.
2. I haven't really *needed* to know APIs deeply. Most projects I have worked on have either
   1. Used a service that takes care of APIs, or:
   2. Already had the API's and associated HTTP requests configured on the project by the other Engineers.

> The real roadblock I was facing with AWS amplify was not related to the features, but had more to do with my own conceptual understanding.

## What is an API doing under the hood?

My goal was simple: Start by building an API to store dummy data, like a list of customers for our mock pizza restaurant.

However, AWS Amplify kept handing me errors when trying to build an API. I found that there were differences between the documentation on what the **amplify CLI** was saying in the terminal. When running commands like `amplify add api` on the latest version of amplify, many, many questions would come up that, if I could be honest with you, I had no idea how to answer. Here is a quick screenshot as an example:

![Screenshot of Amplify API](/assets/blog/assets-and-liabilities/add_api_prompts.png "Amplify add api prompts")

So, instead of building an API directly through the amplify feature, I tried (and learned) a lot about the other services working behind the scenes to make the amplify magic possible, but I had to start with my own understanding of these concepts to know what was happening.

Things that are **KNOWN**:
1. How to make a frontend API Call
2. The 4 major operations CRUD: Create, read, update, delete
3. GraphQL and Rest
4. Changing the schema and how that affects the backend
5. HTTP requests and Authentication: How to debug them

Things that are **UNKNOWN**:

1. What happens to that data after it leaves the client
2. Databases: relational and non-relational
3. Serverless functions and the role they play in the API request lifecycle.
4. DynamoDB: what service helps build and store data here
5. Authentication: What kinds are there, and how are they implemented?

## What is really happening here?

The goal: Build a frontend that can allow clients to store data in the database through an API call. Whether the API call was REST or GraphQL became irrelevant at first: I wanted to build an OPEN API that was exposed to the public to prove functionality, and THEN come back and add security.

On the backend, this would require:

1. An API endpoint.
2. A service to process the API and connect it to the database.
3. A database, built connected to the API, with all the data and relationships between data defined in the frontend/Amplify Studio.

Options: I could either build the data in the Amplify Studio UI and create all data and relationships there, or build the data in the code(for GQL). The easiest route was to build in the UI, so I did.

The first problem: Setting permissions. AWS offers exposure to an API through an API Key, a cognito user pool, or a federated identity, but what if I wanted NO identity to be associated with my API? Also, what AWS service was enforcing these permissions? Whatever content I added through the Amplify Studio, I could not get to render locally *without signing in*.

The second problem: Datastore. This is a solution that Amplify has to show real-time data in the frontend, even as it changes in the database. Think web sockets. This is an awesome idea, BUT it did not work successfully when running the build locally. It would work on occasion, but I could not use it reliably in a react application using NEXT JS.

The solution: Build the API with GraphQL on the frontend after running the command: `amplify add api`. Then, when it asks if you want to update the API, say "Yes".

When the CLI asks if you want to build all possible types and configurations, say "yes". If it does not, run `amplify codegen`, and it will generate all possible types. For our mock-pizza restaurant, and the "customer" type, this means: `createCustomer, updateCustomer, deleteCustomer` are generated on the frontend for you.

In the CLI, run `amplify push`, and what happens is pretty cool:

- The API gets updated. So, all "crud" actions the the HTTP api OR the REST/GraphQL request, it updated.
- The permissions get updated. So, if the permissions were changed from cognito identity pool to an API key, or federated identity, this gets updated. This is enforced by the LAMBDA function.
- The DynamoDB, which can only be accessed by the permissions set in the GRAPHQL code, and enforced by the LAMBDA function, is also updated. So, if your `customer` type needs to be changed to include a few more fields, just update the type, and DynamoDB will have room for those new types as well.

### What was built, and next steps

The final code that was created was this tiny snippet: A way to show data to the user if they were signed in:

```
function AddCustomer(){
  const todoDetails = {
  firstName: "John",
  lastName: "Doe",
  email: "test@testlcom",
};

const addCustomer = () => {
  API.graphql(graphqlOperation(createCustomer, { input: todoDetails }))
    .then((response) => console.log(response))
    .catch((err) => console.log(err));
};

const showTHis = <button onClick={addCustomer}>Add Customer</button>;

return (
  <div>
    {Auth.user?.username ? (
      <h2>You should only see this if you are logged in.</h2>
    ) : (
      showTHis
    )}
  </div>
);};

export default AddCustomer;
```

This did take some work to troubleshoot, and a big setback was my own lack of experience working with backends. However, now that the most primitive use of an API is built, I think the next parts of this app will come together quickly.








