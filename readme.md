# Lumen Tutorial

This is a sample project for a tutorial session that I give. Feel free to have a look around but note that there are some blanks
you need to fill.

## Coming from Laravel

If you're coming from Laravel, here are some differences you'll notice:

- In order to use a `.env` file to load env vars, you will need to uncomment the `Dotenv::load()` method in `bootstrap/app.php`.
- `php artisan` has a limited command set, and you'll need to generate your own key as there's no key:generate.
- Enable Eloquent by uncommenting `$app->withEloquent()` in `bootstrap/app.php`.
- The router used is different from that of Laravel.

### License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
