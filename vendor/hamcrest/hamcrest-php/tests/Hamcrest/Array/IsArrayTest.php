<?php
namespace Hamcrest\Arrays;

use Hamcrest\AbstractMatcherTest;

class IsArrayTest extends AbstractMatcherTest
{

    protected function createMatcher()
    {
        return IsArray::anArray([ equalTo('irrelevant') ]);
    }


    public function testMatchesAnArrayThatMatchesAllTheElementMatchers()
    {
        $this->assertMatches(anArray([ equalTo('a'), equalTo('b'), equalTo('c') ]), [ 'a', 'b', 'c' ],
            'should match array with matching elements');
    }


    public function testDoesNotMatchAnArrayWhenElementsDoNotMatch()
    {
        $this->assertDoesNotMatch(anArray([ equalTo('a'), equalTo('b') ]), [ 'b', 'c' ],
            'should not match array with different elements');
    }


    public function testDoesNotMatchAnArrayOfDifferentSize()
    {
        $this->assertDoesNotMatch(anArray([ equalTo('a'), equalTo('b') ]), [ 'a', 'b', 'c' ],
            'should not match larger array');
        $this->assertDoesNotMatch(anArray([ equalTo('a'), equalTo('b') ]), [ 'a' ], 'should not match smaller array');
    }


    public function testDoesNotMatchNull()
    {
        $this->assertDoesNotMatch(anArray([ equalTo('a') ]), null, 'should not match null');
    }


    public function testHasAReadableDescription()
    {
        $this->assertDescription('["a", "b"]', anArray([ equalTo('a'), equalTo('b') ]));
    }


    public function testHasAReadableMismatchDescriptionWhenKeysDontMatch()
    {
        $this->assertMismatchDescription('array keys were [<1>, <2>]', anArray([ equalTo('a'), equalTo('b') ]),
            [ 1 => 'a', 2 => 'b' ]);
    }


    public function testSupportsMatchesAssociativeArrays()
    {
        $this->assertMatches(anArray([ 'x' => equalTo('a'), 'y' => equalTo('b'), 'z' => equalTo('c') ]),
            [ 'x' => 'a', 'y' => 'b', 'z' => 'c' ], 'should match associative array with matching elements');
    }


    public function testDoesNotMatchAnAssociativeArrayWhenKeysDoNotMatch()
    {
        $this->assertDoesNotMatch(anArray([ 'x' => equalTo('a'), 'y' => equalTo('b') ]), [ 'x' => 'b', 'z' => 'c' ],
            'should not match array with different keys');
    }
}
