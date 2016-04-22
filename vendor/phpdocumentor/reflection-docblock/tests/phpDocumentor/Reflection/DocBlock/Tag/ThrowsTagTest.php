<?php
/**
 * phpDocumentor Throws tag test.
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
 * Test class for \phpDocumentor\Reflection\DocBlock\ThrowsTag
 *
 * @author    Mike van Riel <mike.vanriel@naenius.com>
 * @copyright 2010-2011 Mike van Riel / Naenius. (http://www.naenius.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
 */
class ThrowsTagTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test that the \phpDocumentor\Reflection\DocBlock\Tag\ThrowsTag can
     * understand the @throws DocBlock.
     *
     * @param string $type
     * @param string $content
     * @param string $extractedType
     * @param string $extractedTypes
     * @param string $extractedDescription
     *
     * @covers       \phpDocumentor\Reflection\DocBlock\Tag\ThrowsTag
     * @dataProvider provideDataForConstructor
     *
     * @return void
     */
    public function testConstructorParsesInputsIntoCorrectFields(
        $type,
        $content,
        $extractedType,
        $extractedTypes,
        $extractedDescription
    ) {
        $tag = new ThrowsTag($type, $content);

        $this->assertEquals($type, $tag->getName());
        $this->assertEquals($extractedType, $tag->getType());
        $this->assertEquals($extractedTypes, $tag->getTypes());
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
            [ 'throws', '', '', [ ], '' ],
            [ 'throws', 'int', 'int', [ 'int' ], '' ],
            [
                'throws',
                'int Number of Bobs',
                'int',
                [ 'int' ],
                'Number of Bobs'
            ],
            [
                'throws',
                'int|double Number of Bobs',
                'int|double',
                [ 'int', 'double' ],
                'Number of Bobs'
            ],
            [
                'throws',
                "int Number of \n Bobs",
                'int',
                [ 'int' ],
                "Number of \n Bobs"
            ],
            [
                'throws',
                " int Number of Bobs",
                'int',
                [ 'int' ],
                "Number of Bobs"
            ],
            [
                'throws',
                "int\nNumber of Bobs",
                'int',
                [ 'int' ],
                "Number of Bobs"
            ]
        ];
    }
}
