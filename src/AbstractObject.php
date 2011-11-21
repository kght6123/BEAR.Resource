<?php
/**
 * BEAR.Resource
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace BEAR\Resource;

/**
 * Abstract resource bbject
 *
 * @package BEAR.Resource
 * @author  Akihito Koriyama <akihito.koriyama@gmail.com>
 */
abstract class AbstractObject implements Object, \ArrayAccess, \Countable, \IteratorAggregate
{
    /**
     * Array access trait for resource body
     */
    use ArrayAccess;

    /**
     * Resource code
     *
     * @var int
     */
    public $code;

    /**
     * Resource header
     *
     * @var array
     */
    public $headers = array();

    /**
     * Resource body
     *
     * @var mixed
     */
    public $body = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->body = new \ArrayObject;
    }
}
