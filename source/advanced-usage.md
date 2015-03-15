---
layout: default
---

# Advanced Use

`SimpleRegression` is a [facade](http://en.wikipedia.org/wiki/Facade_pattern)
over the `Regression` class designed to abstract away some of its raw details.
Specifically, it introduces the abstraction of having an intercept. Under the
hood, there's no actual difference between the intercept term of the regression
and the other slope coefficients. It's just always multiplied by an identity
term. By convention, this is the first column of the data.

The example below is exactly the same as the multiple regression example from
earlier. Note two differences: We use the `Regression` class instead of
`SimpleRegression` and there is one additional explanatory variable in the data,
which is always a one.

    use mcordingley\Regression\Regression;
    
    $regression = new Regression;
    
    $regression->addData(2, [1, 3, 5, 7, 2, 8, 10])
               ->addData(4, [1, 3, 2, 1, 5, 5, 9])
               ->addData(6, [1, 1, 2, 3, 4, 5, 6])
               ->addData(8, [1, 1, 3, 4, 7, 7, 12])
               ->addData(10, [1, 19, 17, 15, 14, 5, 1]);

Because this value is invariant and is the multiplicative identity, its
corresponding slope coefficient represents the added effect of nothing. That is,
it's the value that the trend line would predict if all other predictors were
zeroed out, aka the y-intercept.

Because this class lacks the abstraction of having an intercept, a few of the
other methods behave slightly differently than they do with `SimpleRegression`.
Any method that returns an array of values, such as
`getStandardErrorCoefficients`, will return values for all columns in the data,
including the column that we would regard as being the intercept. Also, the
`addData` and `predict` methods _require_ arrays, rather than being loose about
taking either arrays or scalars. And, of course, there is no `getIntercept`
method.