---
title: "Part 2: Async and Streams"
excerpt: 'Node powers the internet because it is asyncronous'
# 640x333
coverImage: '/assets/blog/node/2-7-23.jpg'
date: '2023-02-06T05:35:07.322Z'
author:
  name: Luke Logan
  picture: '/assets/blog/node/node-part1.jpg'
  # 640x333
ogImage:
  url: '/assets/blog/node/2-7-23.jpg'
---


## asyncronous

Node is designed to be asyncronous. This is not true - everything not part of the startup should be syncrouns- but command line scripts are all parts of the startup.

So lets convert it to SYNCROUNOUS:

```js
function processFile(text) {
  fs.readFile(filePath, function onContents(err,contents){
    if(err){
      err(err.toString());
    } else {

      process.stdout.write(contents)
    }
  })
}
```

## Processing File Contents

`Contents` is a buffer; but we need to change it to a string to run any methods on it:

`contents = contents.toString().toUppercase()`

In this case, we are pulling in the data, pulling it as a buffer, then turning it into a string, then capitalizing everything; so you have a very inefficient usage of processing. This will be addressed in the future.

## Standard In

Use the built-in node library, *get-stdin*:
`var getStdin = require("get-stdin");`

Now if you run the following command in your terminal:

` node ./index.js --file=file.txt `

You will get an upper case version of all of the text in that file.


## Environment Variables.

Environmental variables are like global variables.

You can set it in the terminal, but it will only be remembered for a singular command.

But that would not be very useful, so let's make sure it is accessible to the environment.

```js
const BASEPATH =
	path.resolve(process.env.BASEPATH || __dirname);
  ```

> `path.resolve()` is a method to resolve a sequence of path-segments to an absolute path. It works by processing the sequence of paths from right to left, prepending each of the paths until the absolute path is created.


`Path.join` is better, because it is platform agnostic; if your OS requires a backslash, it will be used; if it requires a forward slash, that will be used.
## Final result.

Your final code should look like this:

```js
#!/usr/bin/env node

"use strict";

var path = require("path");
var fs = require("fs");

var getStdin = require("get-stdin");

var args = require("minimist")(process.argv.slice(2),{
	boolean: ["help","in",],
	string: ["file",],
});

const BASEPATH =
	path.resolve(process.env.BASEPATH || __dirname);


if (args.help || process.argv.length <= 2) {
	error(null,/*showHelp=*/true);
}
else if (args._.includes("-") || args.in) { //Node cannot process ` hyphen, so it must be proccessed as a string this way
	getStdin().then(processFile).catch(error); // this will resolve all promises; all errors will be processed as an error.
}
else if (args.file) {
	let filePath = path.join(BASEPATH,args.file);
	fs.readFile(filePath,function(err,contents){
		if (err) error(err.toString());
		else processFile(contents.toString());
	});
}
else {
	error("Usage incorrect.",/*showHelp=*/true);
}




// ************************************

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

function processFile(text) {
  fs.readFile(filePath, function onContents(err,contents){
    if(err){
      err(err.toString());
    } else {
      process.stdout.write(contents)
    }
  })
}

```


## Streams

Let's talk about streams. Streams have a mode to READ from, called a *read* stream, and a mode where they are writable, called a *WRITE* stream.

Let's say we want to connect a *READ* stream with a *WRITE* stream, to take the contents from the READ and send the data to the WRITE stream:

```js
var stream1; //read
var stream2; //write

stream1.pipe(stream2); //.pipe only works on readable streams
```

The data is being read from the READ stream, and processed into the writable stream;

`pipe` is only available on a readable stream; but if you wanted to read the results?

```js
var stream1; //read
var stream2; //write

stream1.pipe(stream2); //.pipe only works on readable streams

vat stream3 = stream1.pipe(stream2) //this is readable
```

This is the bulk of the concepts with streams: moving from **readable** to **writeable**.

What if we wanted to stream- and process things chunk by chunk in a stream, instead of syncronously?


```js
let stream = fs.createReadStream()
processFile(stream)
```

Now, the function will take a readableStream.

At the end, we have an output stream that gets returned; this output stream will be piped to the target:

```js

function processFile(inStream){
  var outStream = inStream;
  var targetStream = process.stdout;
  outstream.pipe(targetStream);
}

```


