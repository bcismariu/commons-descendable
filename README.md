# Dot notation descendable

[![Build Status](https://travis-ci.org/bcismariu/commons-descendable.svg?branch=master)](https://travis-ci.org/bcismariu/commons-descendable)
[![Latest Stable Version](https://poser.pugx.org/bcismariu/commons-descendable/v/stable)](https://packagist.org/packages/bcismariu/commons-descendable)
[![License](https://poser.pugx.org/bcismariu/commons-descendable/license)](https://packagist.org/packages/bcismariu/commons-descendable)
[![Total Downloads](https://poser.pugx.org/bcismariu/commons-descendable/downloads)](https://packagist.org/packages/bcismariu/commons-descendable)

A generic dot notation accessor, able to handle a mix of arrays and objects

## Installation

`composer require bcismariu/commons-descendable:^0.1`

## Usage

```php
<?php

use Bcismariu\Commons\Descendable\Descendable;

$array = [
    'eyes'  => 'blue',
    'age'   => '27',
    'parents' => [
        'mother'    => 'Jane',
        'father'    => 'Jack'
    ]
];

$descendable = new Descendable($array);

$descendable->get('parents.father', 'John');    // returns 'Jack'
$descendable->get('sister', 'Kate');            // returns 'Kate'
```


## Testing
```bash
php vendor/bin/phpunit
```
