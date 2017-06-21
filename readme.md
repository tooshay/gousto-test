# Gousto's Development Test

This is a simple (mostly) RESTful API used to manage (create, update, rate, retrieve) recipes. All responses are in JSON.

# How to run

Get the code and cd in:

```
git clone https://github.com/tooshay/gousto-test.git
cd gousto-test
```

If you haven't got Composer installed, go ahead and install it:

```
$ curl -Ss http://getcomposer.org/installer | php
```

...And fetch all dependencies:

```
$ php composer.phar install
```

Unleash supplied .env file:

```
$ mv .env.example .env
```

Build SQLite DB and seed data:

```
$ php artisan migrate && php artisan db:seed
```

Serve!

```
$ php -S localhost:8000 -t public
```

# Unit Tests
