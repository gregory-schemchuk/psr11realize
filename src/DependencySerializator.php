<?php

namespace schemgr\psr11realize;


class DependencySerializator
{

    private $DEPENDENCIES_LIST_PATH = "list";


    public function store(array $container): void {
        // serialise list of keys
        $keys = array_keys($container);
        $serializedKeys = serialize($keys);
        file_put_contents($this->DEPENDENCIES_LIST_PATH, $serializedKeys);

        // serialize all values
        foreach ($keys as $key) {
            $val = $container[$key];
            $serialized = serialize($val);
            file_put_contents($key, $serialized);
        }
    }

    public function extract(): array {
        $container = [];

        // if array already stored
        if (file_exists($this->DEPENDENCIES_LIST_PATH)) {
            $keysArraySer = file_get_contents($this->DEPENDENCIES_LIST_PATH);
            $keysArray = unserialize($keysArraySer);

            // extract all values in array
            foreach ($keysArray as $key) {
                $valueSer = file_get_contents($key);
                $val = unserialize($valueSer);
                $container[$key] = $val;
            }
        }

        return $container;
    }

}