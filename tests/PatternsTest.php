<?php

/*
 * This file is part of HtmlCompress.
 *
 ** (c) 2014 Cees-Jan Kiewiet
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace WyriHaximus\HtmlCompress\Tests;

use WyriHaximus\HtmlCompress\Patterns;

/**
 * Class PatternsTest
 *
 * @package WyriHaximus\HtmlCompress\Tests
 */
class PatternsTest extends \PHPUnit_Framework_TestCase {

    public function testPreProvider() {
        return array(
            array(
                Patterns::MATCH_PRE,
                '<pre>awkef8227h9r8r23</pre>',
                array(
                    '',
                    '',
                ),
                array(
                    array(
                        '<pre>awkef8227h9r8r23</pre>',
                    ),
                    array(
                        '<pre>',
                    ),
                    array(
                        'awkef8227h9r8r23',
                    ),
                    array(
                        '</pre>',
                    ),
                ),
            ),
            array(
                Patterns::MATCH_PRE,
                'o <pre>awkef8227h9r8r23</pre> 0',
                array(
                    'o ',
                    ' 0',
                ),
                array(
                    array(
                        '<pre>awkef8227h9r8r23</pre>',
                    ),
                    array(
                        '<pre>',
                    ),
                    array(
                        'awkef8227h9r8r23',
                    ),
                    array(
                        '</pre>',
                    ),
                ),
            ),
            array(
                Patterns::MATCH_PRE,
                'o <pre attribute="bar">awkef8227h9r8r23</pre> 0',
                array(
                    'o ',
                    ' 0',
                ),
                array(
                    array(
                        '<pre attribute="bar">awkef8227h9r8r23</pre>',
                    ),
                    array(
                        '<pre attribute="bar">',
                    ),
                    array(
                        'awkef8227h9r8r23',
                    ),
                    array(
                        '</pre>',
                    ),
                ),
            ),
            array(
                Patterns::MATCH_TEXTAREA,
                '<textarea>awkef8227h9r8r23</textarea>',
                array(
                    '',
                    '',
                ),
                array(
                    array(
                        '<textarea>awkef8227h9r8r23</textarea>',
                    ),
                    array(
                        '<textarea>',
                    ),
                    array(
                        'awkef8227h9r8r23',
                    ),
                    array(
                        '</textarea>',
                    ),
                ),
            ),
            array(
                Patterns::MATCH_TEXTAREA,
                'o <textarea>awkef8227h9r8r23</textarea> 0',
                array(
                    'o ',
                    ' 0',
                ),
                array(
                    array(
                        '<textarea>awkef8227h9r8r23</textarea>',
                    ),
                    array(
                        '<textarea>',
                    ),
                    array(
                        'awkef8227h9r8r23',
                    ),
                    array(
                        '</textarea>',
                    ),
                ),
            ),
            array(
                Patterns::MATCH_TEXTAREA,
                'o <textarea attribute="bar">awkef8227h9r8r23</textarea> 0',
                array(
                    'o ',
                    ' 0',
                ),
                array(
                    array(
                        '<textarea attribute="bar">awkef8227h9r8r23</textarea>',
                    ),
                    array(
                        '<textarea attribute="bar">',
                    ),
                    array(
                        'awkef8227h9r8r23',
                    ),
                    array(
                        '</textarea>',
                    ),
                ),
            ),
            array(
                Patterns::MATCH_STYLE,
                '<style>awkef8227h9r8r23</style>',
                array(
                    '',
                    '',
                ),
                array(
                    array(
                        '<style>awkef8227h9r8r23</style>',
                    ),
                    array(
                        '<style>',
                    ),
                    array(
                        'awkef8227h9r8r23',
                    ),
                    array(
                        '</style>',
                    ),
                ),
            ),
            array(
                Patterns::MATCH_STYLE,
                'o <style>awkef8227h9r8r23</style> 0',
                array(
                    'o ',
                    ' 0',
                ),
                array(
                    array(
                        '<style>awkef8227h9r8r23</style>',
                    ),
                    array(
                        '<style>',
                    ),
                    array(
                        'awkef8227h9r8r23',
                    ),
                    array(
                        '</style>',
                    ),
                ),
            ),
            array(
                Patterns::MATCH_STYLE,
                'o <style attribute="bar">awkef8227h9r8r23</style> 0',
                array(
                    'o ',
                    ' 0',
                ),
                array(
                    array(
                        '<style attribute="bar">awkef8227h9r8r23</style>',
                    ),
                    array(
                        '<style attribute="bar">',
                    ),
                    array(
                        'awkef8227h9r8r23',
                    ),
                    array(
                        '</style>',
                    ),
                ),
            ),
        );
    }

    /**
     * @dataProvider testPreProvider
     */
    public function testPattern($pattern, $input, $expectedHtml, $expectedBits) {
        $html = preg_split($pattern, $input);
        preg_match_all($pattern, $input, $bits);
        $this->assertSame($expectedHtml, $html);
        $this->assertSame($expectedBits, $bits);
    }

}