<?php

namespace BEAR\Resource;

/**
 * Test class for PHP.Skelton.
 */
class ObjectTest extends \PHPUnit_Framework_TestCase
{
    protected $skelton;

    protected function setUp()
    {
        parent::setUp();
        $this->resource = new Mock\Entry();
        $this->resource[0] = 'entry1';
        $this->resource[1] = 'entry2';
        $this->resource[2] = 'entry3';
    }

    public function test_offsetGet()
    {
        $actual = $this->resource[0];
        $this->assertSame('entry1', $actual);
    }

    public function test_offsetExists()
    {
        $this->assertTrue(isset($this->resource[0]));
    }

    public function test_offsetUnsert()
    {
        unset($this->resource[0]);
        $this->assertFalse(isset($this->resource[0]));
    }

    public function test_offsetExistsFalse()
    {
        $this->assertFalse(isset($this->resource[10]));
    }

    public function test_count()
    {
        $this->assertSame(3, count($this->resource));
    }

    public function test_ksort()
    {
        $this->resource = new Mock\Entry();
        $this->resource['d'] = 'lemon';
        $this->resource['a'] = 'orange';
        $this->resource['b'] = 'banana';
        $this->resource->ksort();
        $expected = array('a' => 'orange', 'b' => 'banana', 'd' => 'lemon');
        $this->assertSame($expected, (array)$this->resource->body);
    }

    public function test_asort()
    {
        $this->resource = new Mock\Entry();
        $this->resource['d'] = 'lemon';
        $this->resource['a'] = 'orange';
        $this->resource['b'] = 'banana';
        $this->resource->asort();
        $expected = array('b' => 'banana', 'd' => 'lemon', 'a' => 'orange');
        $this->assertSame($expected, (array)$this->resource->body);
    }

    public function test_append()
    {
        $this->resource[] = 'entry_append';
        $this->assertSame(4, count($this->resource->body));
    }

    public function test_getItelator()
    {
        $iterator = $this->resource->getIterator();
        $actual = '';
        while($iterator->valid()) {
            $actual .=  $iterator->key() . '=>' . $iterator->current() . ",";
            $iterator->next();
        }
        $expected = '0=>entry1,1=>entry2,2=>entry3,';
        $this->assertSame($expected, $actual);
    }

    public function test_getEmptyItelator()
    {
        $iterator = $this->resource->body = 'string';
        $iterator = $this->resource->getIterator();
        $actual = '';
        while($iterator->valid()) {
            $actual .=  $iterator->key() . '=>' . $iterator->current() . ",";
            $iterator->next();
        }
        $expected = '';
        $this->assertSame($expected, $actual);
    }

    public function test_Code()
    {
        $this->assertSame(CODE::OK, 200);
        $this->assertSame(CODE::BAD_REQUEST, 400);
        $this->assertSame(CODE::ERROR, 500);
    }
}

