---
layout: default
---

# About

From [Wikipedia](http://en.wikipedia.org/wiki/Regression_analysis):

> In statistics, regression analysis is a statistical process for estimating the
> relationships among variables. It includes many techniques for modeling and
> analyzing several variables, when the focus is on the relationship between a
> dependent variable and one or more independent variables. More specifically,
> regression analysis helps one understand how the typical value of the dependent
> variable (or 'criterion variable') changes when any one of the independent
> variables is varied, while the other independent variables are held fixed.

In plain English, a regression takes a series of data points and tries to
draw a line through them that's as close to all of them as possible. You can use
that line to then make predictions about values not in your data-set. That line
may describe the data very well or it may describe it poorly, so there are also
facilities included to tell you just how well the line explains the data and
what kind of spread you can expect around that trend line.

## Installation

This library assumes that you're using Composer to resolve and install your PHP
packages. If you aren't using it yet, go
[read up on it now](https://getcomposer.org/)! It'll make your life much easier.

From your command-line interface, just run `php composer.phar require mcordingley/regression`
to have Composer add it to your `composer.json` and pull down the latest version.

If CLI isn't your thing, you could add the following line to the `require`
section of your `composer.json` and then have Composer update your required
dependencies:

    "mcordingley/regression": "~0.9.5"

Don't forget to include `vendor/autoload.php` somewhere in your code, if you
aren't using a framework that does this for you. With that, you're good to
get started on running regressions!