# php-framework
Half-baked MVC style php framework with ability to define routes with http method, path and handler function/name of view to render. Views can also define layouts that they get injected into.


### Example of defining routes
```php
$app = new Application();

$app->router->get('/', function() {
    echo "Hello world!";
});

$app->router->get('/about', 'about');

$app->run();
```

### Example of layout
index.php
```html
layout: main
index
```

main.php
```html
<html>
  <body>
    {{ content }}
  </body>
</html>
```
