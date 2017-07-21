<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Bcismariu\Commons\Descendable\Descendable;

class DescendableTest extends TestCase
{
    public function testItCanGetData()
    {
        $data = $this->buildData();

        $descendable = new Descendable($data);

        $this->assertEquals('bar', $descendable->get('foo'));
        $this->assertEquals('one', $descendable->get('elements.0'));
        $this->assertEquals('second', $descendable->get('objects.1.name'));
    }

    public function testItCanGetDefaults()
    {
        $data = $this->buildData();

        $descendable = new Descendable($data);

        $this->assertEquals('baz', $descendable->get('foo.bar', 'baz'));
        $this->assertEquals('baz', $descendable->get('foo.baz.bar', 'baz'));
        $this->assertEquals('default', $descendable->get('elements.5', 'default'));
        $this->assertEquals('default', $descendable->get('elements.key', 'default'));
        $this->assertEquals('default', $descendable->get('objects.1.value', 'default'));
        $this->assertEquals(null, $descendable->get('unavailable'));
    }


    /**
     * construct a complex data structure
     */
    protected function buildData()
    {
        return json_decode(file_get_contents(__DIR__ . '/mocks/basic-data.json'));
    }
}
