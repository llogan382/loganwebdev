---
title: "Part 1: Intro, and Command Line"
excerpt: 'Node is everywhere, and it cannot be ignored'
# 640x333
coverImage: '/assets/blog/full-stack-2/bady-abbas-hxi_yRxODNc-unsplash.jpg'
date: '2023-02-06T05:35:07.322Z'
author:
  name: Luke Logan
  picture: '/assets/blog/node/node-part1.jpg'
  # 640x333
ogImage:
  url: '/assets/blog/node/node-part1.jpg'
---




## Going deep with Node.

Node is everywhere, and it cannot be ignored. This is a series of notes about Node.js.

However, the question must be asked: Why node in 2023? Why not Go? Or Java? Or Rust?

Those are great options as well. However, while writing this, remember: most frameworks now integrate seamlessly with Node. [Next.js](nextjs.org/), for example, seamlessly integrates frontend and backend, often in the same file. Node.js is built in.

For that reason, Node.js is important. After learning some backend concepts, it may be a worthwhile exercise to implement some backend work (Im thinking API's, etc) into another language like Java or Go.

These are some notes I took away from taking a course by **Kyle Simpson**, author of the book *You don't know JS*.

## What is Node?

Let's take this moment and say, node.js is NOT just *Javascript on the server*. The question starts before that, and one must take a step backwards to look at the big picture: What is a server? And what are the requirements of a server when working with web-based frameworks?

>What is the problem node.js is trying to solve?

Web apps need to interact with the server, and in order to do that, it must come in through the request from "the internet", and interact with the binary of the CPU: namely, the form of linux that runs in/out threads in Binary. When requests come in from the internet in the form of Javascript, it must be interpreted *as quickly as possible* into the binary that the CPU can understand and process; there must be as little latency as possible.

Many languages offer many threaded approaches to processing data, but for requests from this internet, this is not as helpful as it would seem; instead, a single threaded solution, that can process the linux-kernal processes of in/out and "error", would be ideal.

This is the premis from where Node.js was created.

## Node.js and the command line.

It relies on **POSIX**, which is a C style program to interact with Linux; basically, this is 3 streams that model the *input, output, and error*.

How do we access these streams in Node?

The main way to access is through PROCESS.

`process.stdout` will give us access to the stream.

The whole point of code is to rin i/o as efficiently as possible- and every time it gets translated/converted, it slows down.

There is also `console.error`. This is a different stream.

By default, the shell interprets both of them the same.

> Tip: If you are doing errors, do `console.error` so the i/o is written to a LOG. This is so important for debugging.


## Setting up a command line script.

How set one up, and have it run like a linux/bash script?

You can put this comment at the top, and it will be interpreted as a bash script. You give it a file to use for the interpretation.

```
#!/usr/bin/env node
```

This tells the system to go find where `node` is installed, and use it.
Also, add `use strict`

Then you can change permissions on the file:

`chmod u+x indev.js`

then, the `-x` permissions is added to the file; then you can run `./ex1.js` instead of typing `node` in the front.

Put something in to give yourself notes about the file, and how it is used:


```js


printHelp();

function pringHelp(){
  console.log("this is how to use ex1")
  console.log( " ex1.js --help" );
}


```


## Command line argumants

There is a node package that can help to add arguments that are passed into the command line, a package called "minimist".

```js
#!/usr/bin/env node

"use strict";

var args = require("minimist")(process.argv.slice(2),{
	boolean: ["help","in",],
	string: ["file",],
});

console.log(args)


```

Running the command
`node ./index.js --help=nothing --file`

will give the following result:

`{ _: [], help: true, in: false, file: '' }`


## How to handle arguments

At this point, arguments are being passed in, but how can you work with the arguments passed in?

Append the following to the `args` listed above, so the complete code would look like the following:

```js
#!/usr/bin/env node

"use strict";

var args = require("minimist")(process.argv.slice(2),{
	boolean: ["help","in",],
	string: ["file",],
});


function printHelp() {
	console.log("ex1 usage:");
	console.log("");
	console.log("--help                      print this help");
	console.log("-, --in                     read file from stdin");
	console.log("--file={FILENAME}           read file from {FILENAME}");
	console.log("");
	console.log("");
}

function error(err,showHelp = false) {
	process.exitCode = 1;
	console.error(err);
	if (showHelp) {
		console.log("");
		printHelp();
	}
}
if (args.help || process.argv.length <= 2) {
	error(null,/*showHelp=*/true);
}
else if (args.file) {
	console.log(args.file)
} else {
    error("Usage incorrect.",/*showHelp=*/true);
  }
console.log(args)
```

With this, if you run the following script:
`node ./index.js --help=nothing --file="hello"`

You will get the following output:
```
index.js usage:

--help                      print this help
-, --in                     read file from stdin
--file={FILENAME}           read file from {FILENAME}


{ _: [], help: true, in: false, file: 'hello' }
```


## Reading files with Path

Node has a built-in package called `path`. It tells the current working directory for the file you are working with. And if you don't give it an

Path.resolve, if you dont give it an absolute path, it will use a relative path.

Now, if you run `node ./index.js --file=hello` passing in only 1 argument, you will get the following response in the terminal:

```
/Users/projects/node
/Users/projects/node/hello
{ _: [], help: false, in: false, file: 'hello' }
```

It only uses `__dirname` if you are using relative paths. How can you use node to access the contents of the file?

Use the built-in module called `fs`.
Add the following to your code.

```js
var fs = require("fs");

  function processFile(filepath) {
    var contents = fs.readFileSync(filepath);
    console.log(contents)
  }
```
and run the following command:

`node ./index.js --file=dummy.md`

the response will be something like this:
```
<Buffer 0a 2d 20 5b 57 68 61 74 20 69 73 20 61 6e 20 41 50 49 3f 5d 28 23 77 68 61 74 2d 69 73 2d 61 6e 2d 61 70 69 29 0a 2d 20 5b 52 65 73 74 2e 5d 28 23 72 ... 3532 more bytes>
```

If the `console.log` is changed to `process.stdout.write`, instead of a buffer being passed, the contents will be passed and the binary will be interpreted.

Key takeaway?

*console.log()* will run different steps of processing, and be marginally slower.

