<?php

namespace lab42\psr11realize;

use Exception;
use Psr\Container\NotFoundExceptionInterface;
use Throwable;


class DependencyNotFoundException extends Exception implements NotFoundExceptionInterface
{

    public function __construct($message, $code = 0, Throwable $previous = null) {
        // некоторый код

        // убедитесь, что все передаваемые параметры верны
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return ": [{$this->code}]: {$this->message}";
    }

}