---
---

# Descriptive Statistics

So you have the components for the trend line and a way to predict values, but
just how accurate is this? Every regression comes with a set of descriptive
statistics to tell you just that.

Interpreting these values can be tricky business. The descriptions here come
with just enough to get you dangerous with the statistics, but cannot replace
reading up on them and understanding them.

## F

First up, the F statistic tells you whether the regression as a whole is
meaningful or not. A lower F means that the model --as a whole-- is more
statistically significant than a model with a higher F value.

    $F = $regression->getFStatistic();

To get a specific comparison value, you'd need to consult
the F distribution. Unfortunately, this is outside of the scope of this library.
From [looking at a table of F values](http://www.socr.ucla.edu/applets.dir/f_table.html),
you're definitely good if the value is less than or equal to one, at the most
conservative of estimates.

For a specific F distribution, you'll need to know the degrees of freedom for
the model and for the error, in that order.

    // F($dfm, $dfe)
    $dfm = $regression->getDegreesOfFreedomModel();
    $dfe = $regression->getDegreesOfFreedomError();

## r-squared

Also known as the "Coefficient of Determination", the r-squared value is a close
cousin to the correlation, albeit the r-squared value has been ...squared.
It measures how strongly observations are explained by their explanatory values.

    $rSquared = $regression->getRSquared();

## t Statistics

While the F statistic tells you how statistically significant the model is as a
whole, the t statistics tell you how statistically significant each column of
your data is. Like the F statistic, you'll have to compare values with the
appropriate probability distribution. In this case, it'll be the Student's t
Distribution with `$dfe` degrees of freedom.

    $tStatistics = $regression->getTStatistics();

## Standard Error

The model will also tell you the spread of observed values around the trend
line. Like the r-squared, this has a close and famililar cousin: the standard
deviation. In other terms, it's the average distance of the observed values from
the trend line.

    $S = $regression->getStandardError();

## Standard Error Coefficients

Just the the model as a whole, each column of explanatory data gets its own
standard error.

    $seCoefficients = $regression->getStandardErrorCoefficients();
