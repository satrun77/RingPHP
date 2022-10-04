<?php
namespace GuzzleHttp\Ring\Future;

use ArrayIterator;

/**
 * Represents a future array value that when dereferenced returns an array.
 */
class FutureArray implements FutureArrayInterface
{
    use MagicFutureTrait;

    public function offsetExists($offset): bool
    {
        return isset($this->_value[$offset]);
    }

    public function offsetGet($offset): mixed
    {
        return $this->_value[$offset];
    }

    public function offsetSet($offset, $value): void
    {
        $this->_value[$offset] = $value;
    }

    public function offsetUnset($offset): void
    {
        unset($this->_value[$offset]);
    }

    public function count(): int
    {
        return count($this->_value);
    }

    public function getIterator(): ArrayIterator
    {
        return new \ArrayIterator($this->_value);
    }
}
