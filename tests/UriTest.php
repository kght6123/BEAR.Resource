<?php declare(strict_types=1);
/**
 * This file is part of the BEAR.Resource package.
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace BEAR\Resource;

use PHPUnit\Framework\TestCase;

class UriTest extends TestCase
{
    public function testUri()
    {
        $uri = new Uri('app://self/?id=1');
        $this->assertSame('app', $uri->scheme);
        $this->assertSame('self', $uri->host);
        $this->assertSame('/', $uri->path);
        $this->assertSame('app', $uri->scheme);
        $this->assertNull($uri->method);
    }

    public function testUriWithQuery()
    {
        $uri = new Uri('app://self/', ['id' => 1]);
        $expect = 'app://self/?id=1';
        $this->assertSame($expect, (string) $uri);
        $this->assertSame(['id' => 1], $uri->query);
    }

    public function testUriWithMoreQuery()
    {
        $uri = new Uri('app://self/{?id}', ['id' => 1, 'name' => 'sunday']);
        $expect = 'app://self/?id=1&name=sunday';
        $this->assertSame($expect, (string) $uri);
        $this->assertSame(['id' => 1, 'name' => 'sunday'], $uri->query);
    }
}
