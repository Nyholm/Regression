<?php

use mcordingley\Regression\Regression;
use mcordingley\Regression\SimpleRegression;
use mcordingley\Regression\RegressionAlgorithm\LinearLeastSquares;

class RegressionSameResultTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Regression
     */
    protected $regression;

    /**
     * @var SimpleRegression
     */
    protected $simple;

    public function setup()
    {
        $data = array(
            [1,2],
            [2,4],
            [3,5],
            [4,7],
            [5,8],
        );

        $this->regression = new Regression(new LinearLeastSquares);
        $this->simple = new SimpleRegression(new LinearLeastSquares);

        foreach ($data as $point) {
            $this->regression->addData($point[0], [$point[1]]);
            $this->simple->addData($point[0], [$point[1]]);
        }
    }
    
    public function testCoefficients()
    {
        $regressionCo = $this->regression->getCoefficients();
        $simpleCo = $this->simple->getCoefficients();

        $this->assertEquals(round($simpleCo[0], 9), round($regressionCo[0], 9));
        $this->assertEquals(round($simpleCo[1], 9), round($regressionCo[1], 9));
    }
    
    public function testPredict()
    {
        $this->assertEquals(
            $this->simple->predict([2]),
            $this->regression->predict([2]),
            'Output should be same for both SimpleRegression and Regression',
            0.001
        );
    }

}