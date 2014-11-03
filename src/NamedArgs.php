<?php
/**
 * This file is part of the Ray.Aop package
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace BEAR\Resource;

use Ray\Aop\MethodInvocation;

class NamedArgs implements NamedArgsInterface
{
    /**
     * {@inheritdoc}
     */
    public function get(MethodInvocation $invocation)
    {
        $args = $invocation->getArguments()->getArrayCopy();
        $params = $invocation->getMethod()->getParameters();
        $namedArgs = [];
        foreach ($params as $param) {
            if (isset($namedArgs[$param->name])) {
                throw new \InvalidArgumentException($param->name);
            }
            $namedArgs[$param->name] = array_shift($args);
        }

        return $namedArgs;
    }
}
