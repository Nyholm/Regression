---
layout: default
---

# Getting Started

The library ships with a `SimpleRegression` class to get you up and crunching
data in a hurry. Up near the top of your file, add a `use` statement to import
`SimpleRegression` into your current namespace:

    use mcordingley\Regression\SimpleRegression;

This keeps you from having to type out the fully qualified namespace and class
name with every use. It's also good practice for code readability. Next,
instantiate a new instance of the class:

    $regression = new SimpleRegression;

With your new object in hand, it's time to load up your data.

## Adding Data

The `addData` method adds an observation and explanatory data into the
regression. The "observation" is some measured value that you're trying to
explain or predict. In the scatter-plot example, this would be your y value. The
second argument is the data that (hopefully) explains or predicts the observation.
In the scatter-plot, this would be your x value.

    $regression->addData(6, 7.24);

Functions that don't have anything to return will always return `$this` so you
can chain methods.

    $regression->addData(3, 8)->addData(3.4, 7.95);

The explanatory data need not be limited to a single value. Instead, you can
provide an array of explanatory values for a multiple regression.
    
    $regression->addData(2, [3, 5, 7, 2, 8, 10])
               ->addData(4, [3, 2, 1, 5, 5, 9])
               ->addData(6, [1, 2, 3, 4, 5, 6])
               ->addData(8, [1, 3, 4, 7, 7, 12])
               ->addData(10, [19, 17, 15, 14, 5, 1]);

Warning: Every set of explanatory variables has to have the same length, or your
regression will fail!

## Getting Fitted

With data in place, you can query your regression object for details on the
regression. Every regression creates a trend line that's fitted to be as close
to the data points as possible. This line takes on the equation `y = a + bx`,
where `a` is your intercept, `x` is some explanatory value, and `b` is a slope
coefficient.

    $a = $regression->getIntercept();

    // Array of slope coefficients, one for each column in the explanatory data
    $coefficients = $regression->getCoefficients();

The regression can also be used to make predictions for new sets of explanatory
data.

    // A single value can be passed in directly
    $predictedY = $regression->predict(17);

    // ...but more need to be wrapped in an array
    $predictedY = $regression->predict([2, 4, 6, 8, 10, 12]);

As before, the number of these needs to match the length of the data that you
entered into the regression through `addData`.