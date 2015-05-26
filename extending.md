---
---

# Extending the Library

This code is built to be extended. No methods or properties are declared as
`private`. Anything marked as `public` is part of the published interface and
will not change without deprecation notices first being added to them for a time.
Anything marked `protected` is not considered part of the published interface
and could change in a new version, but the only likely changes to those would be
to take them public as needed.

In addition to being friendly to inheritance, there are two specific points
set up for extension through object composition.

First, any object that implements
`mcordingley\Regression\Linking\LinkingInterface` can be used as a linking
object if your data transformation needs are more exotic than is handled by the
existing implementations of that interface. Transformations for logistic or
probit regressions would be possible custom implementations of this interface.
For how to use classes that implement this interface, see the section on
performing non-linear regressions.

Second, the logic for performing the regression is off-loaded to an instance of
`mcordingley\Regression\RegressionAlgorithm\RegressionAlgorithmInterface`. The
`Regression` class's primary concerns are more in aggregating the data for the
regression and in the calculation of statistics after the regression has been
run. This `RegressionAlgorithmInterface` instance is a
[strategy object](http://en.wikipedia.org/wiki/Strategy_pattern) that can be
swapped out if your regression needs to be performed in a different way.

The library ships with an implementation of the linear least squares approach to
regressions, which is the sane and performant option for general use. The
`Regression` and `SimpleRegression` classes take a single argument to their
constructors: a `RegressionAlgorithmInterface` object. If one is not provided,
they create and use an instance of
`mcordingley\Regression\RegressionAlgorithm\LinearLeastSquares`. A likely
alternate implementation of this interface would be an object that performs
maximum-likelihood estimation. 

## Contributing

This library could benefit from greater test coverage of its existing
functionality and from the contribution of code and tests necessary to perform
a logistic regression. This would likely include the maximum-likelihood
estimation algorithm and a linking for the probit function.

The other main way that this library can be improved upon is to get it out into
the wild and in use. Nothing compares to real-world use for finding ways that
break it or to extend it that are undreamt of in either the documentation or
tests.
