<?php

define('FIRST_ARGUMENT', '0');
define('SECOND_ARGUMENT', '1');
class FruitBasket
{
    public $fruits = [];
    public $owner = '';
    function __construct($fruits, $owner = '')
    {
        $arguments = func_get_args();
        $this->fruits = $arguments[SECOND_ARGUMENT];
        if (!empty($arguments[FIRST_ARGUMENT])) {
            $this->owner = $arguments[FIRST_ARGUMENT];
        }
            $this->owner = '';
    }
    public $index = 0;
    function current()
    {
        return $this->fruits[$this->index];
    }
    function next()
    {
        ++$this->index;
    }
    function key()
    {
        return $this->index;
    }
    function rewind()
    {
        $this->index = 0;
    }
    function offsetExists($offset)
    {
        return is_null($this['fruits'][$offset]);
    }
    function offsetGet($offset)
    {
        return $this->fruits[$offset];
    }
    function offsetSet($offset, $value)
    {
        $this[$offset] = $value;
    }
    function offsetUnset($offset)
    {
        $self = $this;
        unset($self[$offset]);
    }
    function getOwner()
    {
        return $this->owner;
    }
    function __get($variable)
    {
        $property = strtolower($variable);
        return $this->$property;
    }
}