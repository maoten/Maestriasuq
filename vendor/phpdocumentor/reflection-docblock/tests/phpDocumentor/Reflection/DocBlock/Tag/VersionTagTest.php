<?php
/**
 * phpDocumentor Version Tag Test
 *
 * PHP version 5.3
 *
 * @author    Vasil Rangelov <boen.robot@gmail.com>
 * @copyright 2010-2011 Mike van Riel / Naenius. (http://www.naenius.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Reflection\DocBlock\Tag;

/**
 * Test class for \phpDocumentor\Reflection\DocBlock\Tag\VersionTag
 *
 * @author    Vasil Rangelov <boen.robot@gmail.com>
 * @copyright 2010-2011 Mike van Riel / Naenius. (http://www.naenius.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
 */
class VersionTagTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test that the \phpDocumentor\Reflection\DocBlock\Tag\LinkTag can create
     * a link for the @version doc block.
     *
     * @param string $type
     * @param string $content
     * @param string $exContent
     * @param string $exDescription
     * @param string $exVersion
     *
     * @covers       \phpDocumentor\Reflection\DocBlock\Tag\VersionTag
     * @dataProvider provideDataForConstuctor
     *
     * @return void
     */
    public function testConstructorParesInputsIntoCorrectFields(
        $type,
        $content,
        $exContent,
        $exDescription,
        $exVersion
    ) {
        $tag = new VersionTag($type, $content);

        $this->assertEquals($type, $tag->getName());
        $this->assertEquals($exContent, $tag->getContent());
        $this->assertEquals($exDescription, $tag->getDescription());
        $this->assertEquals($exVersion, $tag->getVersion());
    }


    /**
     * Data provider for testConstructorParesInputsIntoCorrectFields
     *
     * @return array
     */
    public function provideDataForConstuctor()
    {
        // $type, $content, $exContent, $exDescription, $exVersion
        return [
            [
                'version',
                '1.0 First release.',
                '1.0 First release.',
                'First release.',
                '1.0'
            ],
            [
                'version',
                "1.0\nFirst release.",
                "1.0\nFirst release.",
                'First release.',
                '1.0'
            ],
            [
                'version',
                "1.0\nFirst\nrelease.",
                "1.0\nFirst\nrelease.",
                "First\nrelease.",
                '1.0'
            ],
            [
                'version',
                'Unfinished release',
                'Unfinished release',
                'Unfinished release',
                ''
            ],
            [
                'version',
                '1.0',
                '1.0',
                '',
                '1.0'
            ],
            [
                'version',
                'GIT: $Id$',
                'GIT: $Id$',
                '',
                'GIT: $Id$'
            ],
            [
                'version',
                'GIT: $Id$ Dev build',
                'GIT: $Id$ Dev build',
                'Dev build',
                'GIT: $Id$'
            ]
        ];
    }
}
