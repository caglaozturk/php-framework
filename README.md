# Router
```sh

Router::get('/home/{id}/{slug}', function($first_data, $second_data) {
    echo "Girilen id = $first_data, Slug: $second_data";
});

Router::get('/admin','Admin:index');

Router::post('/home', function() {
    echo 'Ana Sayfa\'dasın';
});

Router::get('/home', function() {
    echo 'Ana Sayfa\'dasın';
});

Router::get('/', 'Index:index');

```
