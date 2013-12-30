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
 * FontAwesome Icon
 *
 * Iterate through the icons in FontAwesome or get them as an array.
 *
 * @category  Library
 * @package   bca/fontawesomeiterator
 * @author    Brodkin CyberArts <support@brodkinca.com>
 * @copyright 2013 Brodkin CyberArts.
 * @license   MIT http://opensource.org/licenses/MIT
 * @version   GIT: $Id$
 * @link      https://github.com/brodkinca/BCA-PHP-FontAwesomeIterator
 */
class Icon
{
    /**
     * Associative Array of Icon Data
     *
     * @var array
     */
    private $_data = array();

    /**
     * Iterator
     *
     * @var Iterator
     */
    private $_iterator;

    /**
     * Constructor
     *
     * @param string $class   Icon css class
     * @param string $unicode Unicode character reference
     */
    public function __construct(Iterator $iterator, $class, $unicode)
    {
        $this->_iterator = $iterator;

        // Set Basic Data
        $this->_data['class'] = $class;
        $this->_data['unicode'] = $unicode;
    }

    public function __get($key)
    {
        if (strtolower($key) === 'name') {
            return $this->_getName($this->__get('class'));
        }

        return @$this->_data[$key];
    }

    private function _getName($class)
    {
        // Remove Prefix
        $name = substr($class, strlen($this->_iterator->getPrefix()) + 1);

        // Convert Hyphens to Spaces
        $name = str_replace('-', ' ', $name);

        // Capitalize Words
        $name = ucwords($name);

        // Show Directional Variants in Parenthesis
        $directions = array('/up$/i', '/down$/i', '/left$/i', '/right$/i');
        $directionsFormat = array('(Up)', '(Down)', '(Left)', '(Right)');
        $name = preg_replace($directions, $directionsFormat, $name);

        // Use Word "Outlined" in Place of "O"
        $outlinedVariants = array('/\so$/i', '/\so\s/i');
        $name = preg_replace($outlinedVariants, ' Outlined ', $name);

        // Remove Trailing Characters
        $name = trim($name);

        return $name;
    }
}
