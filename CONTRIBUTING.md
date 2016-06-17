# Contributing

Contributions are **welcome** and will be fully **credited**.

We accept contributions via Pull Requests on [Github](https://github.com/laravel-backpack/base).


## Bug Fixing & Enhancements

We use the Github issue tracker for that. Here's the procedure we've settled upon so 2 people don't work on the same thing:
- you find something that needs doing (say: unit tests for a certain package);
- you check if there is already an issue for it (if there isn't, add one);
- in that issue:
   - say you're working on it and it will be done in x hours or y days; 
   - in that issue, assign the "working on it" label
   - assign yourself to the issue;
- then comment/reference the issue in your pull request;


## Pull Requests

- **[PSR-2 Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)** - The easiest way to apply the conventions is to install [PHP Code Sniffer](http://pear.php.net/package/PHP_CodeSniffer). It's ok to push non-PSR-2 code, but know that [StyleCI](https://styleci.io/) will convert it after the merge. 

- **Document any change in behaviour** - Make sure the `README.md` is still up-to-date with your modifs.

- **Consider our release cycle** - We try to follow [SemVer v2.0.0](http://semver.org/). Randomly breaking public APIs is not an option.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

- **Send coherent history** - Make sure each individual commit in your pull request is meaningful. If you had to make multiple intermediate commits while developing, please [squash them](http://www.git-scm.com/book/en/v2/Git-Tools-Rewriting-History#Changing-Multiple-Commit-Messages) before submitting.




## Running Tests

The project does NOT have working tests right now, but it really should. If you want to help out, that's one of the most important things you can help with. 

``` bash
$ composer test
```


**Happy coding**!
