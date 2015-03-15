---
layout: default
---

# Non-Linear Regressions

It's also possible to perform non-linear regressions. The trick in these cases
is to perform some transformations to the data before and after regression, so
that the data is linear at the time of the regression. This is done by using
objects that implement the `mcordingley\Regression\Linking\LinkingInterface`
interface with the following methods:

    $regression->setDependentLinking($linking); // To transform Y values
    $regression->setIndependentLinking($linking); // To transform X values regardless of position in the data
    $regression->setIndependentLinking($linking, $index); // To transform the X values that are at $index position in the data in preference to the linking set above

Some implementations of this interface that cover common transformations come
standard in the library. 

- `mcordingley\Regression\Linking\Identity`: Passes data through untransformed. Used by default unless something else has been set.
- `mcordingley\Regression\Linking\Power`: For data that follows a geometric progression. Constructor takes the exponent as its argument. Default 2.
- `mcordingley\Regression\Linking\Exponential`: For data that follows an exponential progression. Constructor takes the base of the exponent as its argument. Default M_E.
- `mcordingley\Regression\Linking\Logarithm`: For data that follows a logarithmic progression. Constructor takes the base of the logarithm as its argument. Default M_E.

**Warning for users of the `Regression` class:** When setting your constant
terms, remember to set a value that would become `1` after transformation by the
linking object. Failure to do so could result in an exception being thrown. See
the implementation of `addData` in `SimpleRegression` for an example of how this
is handled.

## Short-Cut Factory Methods

The `Regression` and `SimpleRegression` classes each come with three static
factory methods that will set common linking patterns for you.

- `makeLogRegression` will work for data that fits the following equation:
  y = b1 * ln(x1) + b2 * ln(x2) + ... + bn * ln(xn)
- `makeExpRegression` will work for data that fits the following equation:
  y = b1^x1 * b2^x2 * ... * bn^xn
- `makePowerRegression` will work for data that fits the following equation:
  y = x1^b1 * x2^b2 * ... * xn^bn