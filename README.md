# FontAwesome Iterator

Iterate through the icons in FontAwesome or get them as an array.

[![Build Status](https://secure.travis-ci.org/brodkinca/BCA-PHP-FontAwesomeIterator.png)](http://travis-ci.org/brodkinca/BCA-PHP-FontAwesomeIterator)

## Wait. So what is this?

Simply put, this class was created to let you iterate over FontAwesome's icons 
for the purpose of building user interfaces in which one must be able to choose
their own icons. That said, if you have another creative use for this, go for it!

This class extends PHP's built-in [ArrayIterator](http://php.net/ArrayIterator) 
class, returning an `Icon` class for each icon in your local copy of FontAwesome.

## Requirements

1. PHP 5.2+
2. FontAwesome (Defaults created for 4.0+, but can be configured for any version.)

## Installation

### Via Composer

Just add the following to the require section your composer.json file:

```
"bca/fontawesomeiterator": "1.*"
```

Then execute `composer install` to pull down the latest release.

Package details can be found at https://packagist.org/packages/bca/fontawesomeiterator.

### Via Github

You may download a specific version from 
https://github.com/brodkinca/BCA-PHP-FontAwesomeIterator/releases or visit the main 
repository at https://github.com/brodkinca/BCA-PHP-FontAwesomeIterator to download 
unreleased code or pull down a copy via git.

## Basic Usage

### 1. Create an Instance of the Iterator
```php
use BCA\FontAwesomeIterator\Iterator as FontAwesomeIterator;

$icons = new FontAwesomeIterator('path/to/fontawesome.css');
```

### 2. Do Something Useful
#### foreach loop
```php
foreach ($icons as $icon) {
    echo $icon->class; // Do Something Here
}
```
#### while loop
```php
while ($icons->valid()) {
    $icon = $icons->current();
    echo $icon->class; // Do Something Here
    $icons->next();
}
```

## Advanced Usage

If you are using an older version of FontAwesome that still uses the `icon-` css
prefix or a custom build of FontAweosme with a non-standard prefix it is necessary 
to define the prefix when instantiating the class.

### Old Skool `icon` Prefix
**Reqired for FontAwesome v3 and under.**
```php
$icons = new FontAwesomeIterator('path/to/fontawesome.css', 'icon');
```

### Custom Prefix
```php
$icons = new FontAwesomeIterator('path/to/fontawesome.css', 'my-custom-prefix');
```

**NOTE:** The prefix should be defined without any additional hyphenation. 
(i.e. `prefix`) NOT `prefix-`.

## Example Implementation

### Create a Select List of Icons by Name
```php
<select>
<?php
    foreach ($icons as $icon) {
        echo '<option value="'.$icon->class.'">'.$icon->name.'</option>';
    }
?>
</select>
```
With the correct CSS it would also be possible to display the FontAwesome icon
in the select list.

## Icon Class

Each value returned by `Iterator` will be an instance of the `Icon` class.

Each `Icon` will have the current properties available:

* `class` CSS class of icon
* `name` Formatted name of icon (i.e. Angle (Right) )
* `unicode` Unicode representation of icon

Properties may be accessed by calling them directly upon the Icon class 
(i.e. `$icon->name`).



## Versioning

This library will be maintained under the Semantic Versioning guidelines.

Releases will be numbered with the following format:

```
<major>.<minor>.<patch>
```

And constructed with the following guidelines:

* Breaking backward compatibility bumps the major (and resets the minor and patch)
* New additions without breaking backward compatibility bumps the minor (and resets the patch)
* Bug fixes and misc changes bump the patch

Composer users who would like more granular control over upgrades should restrict 
their installation to patch updates only using this require key:

```
"bca/fontawesomeiterator": "1.0.*"
```

For more information on SemVer, please visit http://semver.org/.


