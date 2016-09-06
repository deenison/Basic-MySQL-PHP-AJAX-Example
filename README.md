# Basic MySQL-PHP-AJAX Example
A brother of mine whom was giving his first steps into (HTML, JS, MySQL, PHP coding in general at the time) was having a hard time to understand what's AJAX about and how it could solve a couple of issues he was having. So he asked me for a hand and I've made him a basic example wrapping all together, from MySQL to AJAX.

So I'm putting everything here on GitHub in hopes that it might help anyone in the future.

ps: one may say "hey this can be achieved by doing this or that". Of course... there's a lot of ways of doing a thing and achieving the same result.
I found this one to be simple enough to explain very basically via example a couple of web-dev concepts to him.

Happy coding :)

## Le problematic
There's a simple form with a couple of nested `<select>`'s. So everytime the main element has its selected option changed, a couple of other elements have their options changed as well on the fly. One of these children is special because each of its options have their own image to be displayed alongside a short description.
Long story short then, the `<option>`s from one of these `<select>`-children should be dinamically created based on a specific DB (in MySQL) query using as one of the query arguments the parent-selected value.

## Proposed solution
1) Those images should be named in a way that it matches a column in the database;

2) [client] Once the value (let's call it `$value`) of the main `<select>` is changed, it triggers an AJAX request to a server having that `$value`;

3) [server] receives the incoming request, grab whatever the user selected and validates/sanitizes it;

4) [server] tries to match `$value` against a database table via `SELECT ... FROM ... WHERE ...`;

5) [server] send back the results of the query as a response to the AJAX request;

6) [client] analyses that response and act according to it. If everything worked out and the server delivered some data, creates `<option>` based on those values with an `<img/>` inside (assuming it already exists elsewhere) and put them into the HTML. If nothing was found, let the user know.

## What this example do
So we do have a form but only with a search input. Once the search button is clicked, we should list all Brazil States whose names matches the searched term without redirecting the page or anything alike.

And yes, it differs a little bit from the proposed solution, but I think ilustrates well how a bridge between client-sever can be built so it solves the problematic.

## Requirements
- `Apache` or `Nginx`
- `PHP`: `^5.6`
- `MySQL`: `^5.4`

## Contributing
Feel free to contribute in any way by [creating an issue](https://github.com/deenison/Basic-MySQL-PHP-AJAX-Example/issues/new), cloning the project, creating your own branches and sending pull requests or even [saying hello](https://github.com/deenison).

## License
[MIT License](https://github.com/deenison/Basic-MySQL-PHP-AJAX-Example/blob/master/LICENSE.md)
Copyright (c) 2016, [Denison Martins](http://denison.me/en).
