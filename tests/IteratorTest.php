<?php

/**
 * FontAwesome Iterator
 *
 * PHP Version 5.3
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
class IteratorTest extends \PHPUnit_Framework_TestCase
{
    protected $class;

    /**
     * Setup Each Test
     *
     * @return null
     */
    public function setUp()
    {
        $this->class = new Iterator(__DIR__.'/fontawesome.css');
    }

    /**
     * @expectedException Exception
     * @covers BCA\FontAwesomeIterator\Iterator::__construct
     */
    public function testFileNotFoundThrowsException()
    {
        new Iterator('invalid.css');
    }

    /**
     * @covers BCA\FontAwesomeIterator\Iterator::current
     * @covers BCA\FontAwesomeIterator\Iterator::next
     */
    public function testGetIcon()
    {
        $iterator = $this->class;

        while ($iterator->valid()) {
            $this->assertThat(
                $iterator->current(),
                $this->isInstanceOf('BCA\\FontAwesomeIterator\\Icon')
            );
            $iterator->next();
        }
    }

    /**
     * @covers BCA\FontAwesomeIterator\Iterator::getPrefix
     */
    public function testGetPrefix()
    {
        // Default Prefix
        $this->assertThat($this->class->getPrefix(), $this->identicalTo('fa'));

        // Special Prefix
        $iterator = new Iterator(__DIR__.'/fontawesome.css', 'foobar');
        $this->assertThat($iterator->getPrefix(), $this->identicalTo('foobar'));
    }
}
