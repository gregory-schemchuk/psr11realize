# psr11realize

Simple PSR-11 container with interesting feature - it can store dependencies localy, so you can continue executing your application after stopping it at any time


Little usage example: 
```php
$container = new Container([
  'test_key' => 'test_value'
]);

$value = $container->get('test_key');
```
