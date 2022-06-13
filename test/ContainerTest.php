<?php

namespace lab42\psr11realize\Tests;

use \lab42\psr11realize\Container;
use Psr\Container\ContainerExceptionInterface;

use PHPUnit\Framework\TestCase;


class ContainerTest extends TestCase
{

    public function testFirst(): void {
        // $container = new Container([], true); // check on saving
        $container = new Container();
        $container->set('var1', 'num1');
        self::assertTrue($container->has('var1'));
        try {
            self::assertSame('num1', $container->get('var1'));
        } catch (ContainerExceptionInterface $e) {
            print "not found";
        }
    }

}