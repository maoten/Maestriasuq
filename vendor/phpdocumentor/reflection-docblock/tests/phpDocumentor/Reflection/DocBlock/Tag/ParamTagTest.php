<?php
/**
 * phpDocumentor Param tag test.
 *
 * PHP version 5.3
 *
 * @author    Mike van Riel <mike.vanriel@naenius.com>
 * @copyright 2010-2011 Mike van Riel / Naenius. (http://www.naenius.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Reflection\DocBlock\Tag;

/**
 * Test class for \phpDocumentor\Reflection\DocBlock\ParamTag
 *
 * @author    Mike van Riel <mike.vanriel@naenius.com>
 * @copyright 2010-2011 Mike van Riel / Naenius. (http://www.naenius.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
 */
class ParamTagTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test that the \phpDocumentor\Reflection\DocBlock\Tag\ParamTag can
     * understand the @param DocBlock .
     *
     * @param string $type
     * @param string $content
     * @param string $extractedType
     * @param string $extractedTypes
     * @param string $extractedVarName
     * @param string $extractedDescription
     *
     * @covers       \phpDocumentor\Reflection\DocBlock\Tag\ParamTag
     * @dataProvider provideDataForConstructor
     *
     * @return void
     */
    public function testConstructorParsesInputsIntoCorrectFields(
        $type,
        $content,
        $extractedType,
        $extractedTypes,
        $extractedVarName,
        $extractedDescription
    ) {
        $tag = new ParamTag($type, $content);

        $this->assertEquals($type, $tag->getName());
        $this->assertEquals($extractedType, $tag->getType());
        $this->assertEquals($extractedTypes, $tag->getTypes());
        $this->assertEquals($extractedVarName, $tag->getVariableName());
        $this->assertEquals($extractedDescription, $tag->getDescription());
    }


    /**
     * Data provider for testConstructorParsesInputsIntoCorrectFields()
     *
     * @return array
     */
    public function provideDataForConstructor()
    {
        return [
            [ 'param', 'int', 'int', [ 'int' ], '', '' ],
            [ 'param', '$bob', '', [ ], '$bob', '' ],
            [
                'param',
                'int Number of bobs',
                'int',
                [ 'int' ],
                '',
                'Number of bobs'
            ],
            [
                'param',
                'int $bob',
                'int',
                [ 'int' ],
                '$bob',
                ''
            ],
            [
                'param',
                'int $bob Number of bobs',
                'int',
                [ 'int' ],
                '$bob',
                'Number of bobs'
            ],
            [
                'param',
                "int Description \n on multiple lines",
                'int',
                [ 'int' ],
                '',
                "Description \n on multiple lines"
            ],
            [
                'param',
                "int \n\$bob Variable name on a new line",
                'int',
                [ 'int' ],
                '$bob',
                "Variable name on a new line"
            ],
            [
                'param',
                "\nint \$bob Type on a new line",
                'int',
                [ 'int' ],
                '$bob',
                "Type on a new line"
            ]
        ];
    }
}
