<?php

/**
 * FontAwesome Iterator
 *
 * PHP Version 5.4
 *
 * @category  Library
 * @package   bca/fontawesomeiterator
 * @author    Brodkin CyberArts <support@brodkinca.com>
 * @copyright 2013 Brodkin CyberArts.
 * @license   MIT http://opensource.org/licenses/MIT
 * @version   GIT: $Id$
 * @link      https://github.com/brodkinca/BCA-PHP-FontAwesomeIterator
 */

namespace BCA\FontAwesomeIterator;

/**
 * FontAwesomeIterator Icon Class Tests
 *
 * @category  Test
 * @author    Brodkin CyberArts <support@brodkinca.com>
 * @copyright 2013 Brodkin CyberArts.
 * @license   MIT http://opensource.org/licenses/MIT
 * @version   GIT: $Id$
 * @link      https://github.com/brodkinca/BCA-PHP-FontAwesomeIterator
 */
class IconTest extends \PHPUnit_Framework_TestCase
{
    protected $class;
    protected $iterator;

    public function __construct()
    {
        parent::__construct();

        $this->iterator = new Iterator(__DIR__.'/fontawesome.css');
    }

    /**
     * Setup Each Test
     *
     * @return null
     */
    public function setUp()
    {
        $this->class = new Icon($this->iterator, 'foo', 'bar');
    }

    /**
     * @covers BCA\FontAwesomeIterator\Icon::__get
     */
    public function testMagicGet()
    {
        $icon = $this->class;

        $this->assertThat($icon->class, $this->identicalTo('foo'));
        $this->assertThat($icon->unicode, $this->identicalTo('bar'));
        $this->assertThat($icon->name, $this->isType('string'));
    }

    /**
     * @covers BCA\FontAwesomeIterator\Icon::_getName
     */
    public function testName()
    {
        $icon = new Icon($this->iterator, 'fa-name-o-left', 'unicode');
        $this->assertThat(
            $icon->name,
            $this->identicalTo('Name Outlined (Left)')
        );

        $icon = new Icon($this->iterator, 'fa-name-o', 'unicode');
        $this->assertThat(
            $icon->name,
            $this->identicalTo('Name Outlined')
        );
    }
}
