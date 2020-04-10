<?php

namespace RestClient\Component\Authorization;

/**
 * AbstractAuthorization
 * 
 * Abstrakcyjna z której dziedziczą metody autoryzacji dla curl
 */
class AbstractAuthorization
{
    protected $value;
    protected $index;
    
    /**
     * getValue
     *
     * zwraca wartość dla nagłówka
     * 
     * @return string
     */
    public function get() : array
    {
        return [$this->index . ': ' . $this->value];
    }
}
