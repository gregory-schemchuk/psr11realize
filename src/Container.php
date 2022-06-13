<?php

namespace lab42\psr11realize;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;


class Container implements ContainerInterface
{

    private $container;
    private $saveState;

    private $serializator;


    public function __construct(array $dependencies = [], bool $saveState = false)
    {
        $this->saveState = $saveState;

        $this->serializator = new DependencySerializator();
        $this->container = $this->serializator->extract();

        array_push($this->container, $dependencies);
    }

    public function get(string $id)
    {
        if (!($this->has($id))) {
            throw new DependencyNotFoundException("dependency not found with id: " . $id);
        }
        return $this->container[$id];
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->container);
    }

    public function set(string $id, $entry): void {
        $this->container[$id] = $entry;
    }

    public function __destruct()
    {
        if ($this->saveState) {
            $this->serializator->store($this->container);
        }
    }

}