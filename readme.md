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

# How to use

Using your favourite HTTP client (in my case HTTPIE or Paw), hit the following endpoints:

Get all recipes:
```
GET http://localhost:8000/recipes
```
Get recipes by cuisine (paginated):
```
GET http://localhost:8000/recipes/italian
```
Create recipe:
 ```
POST http://localhost:8000/recipes/
```

With a JSON body along the lines of:
```
{
   "title":"yum-bo noodles",
   "box_type":"vegetarian",
   "short_title":"noodles",
   "slug":"yum-bo-noodles",
   "marketing_description":"wow noodles",
   "calories_kcal":"1230",
   "protein_grams":"50",
   "fat_grams":"12",
   "carbs_grams":"30",
   "bulletpoint1":"one",
   "bulletpoint2":"two",
   "bulletpoint3":"three",
   "recipe_diet_type_id":"atkins",
   "season":"summer",
   "base":"beans",
   "protein_source":"tofu",
   "preparation_type_mins":"120",
   "shelf_life_days":"10",
   "equipment_needed":"skives and ting",
   "origin_country":"uruguay",
   "recipe_cuisine":"indonesian",
   "in_your_box":"tomatoes",
   "gousto_reference":"12345"
}

```

To update, `PUT` data like:
```
{"title":"test","short_title":"short test"}
```
...to http://localhost:8000/recipes/10

To rate a recipe, `PUT` a `rating` parameter to to http://localhost:8000/recipes/rate/10

# Testing

I wrote a couple of tests only, for time considerations.

# Why Lumen?

I chose to use Laravel's micro-framework as I find it extremely easy to work with and achieve quick results with. It's intuitive,
beautifully documented and very, very fast. For building small APIs, I find it ideal.

# Further thoughts

As all responses are small, clean, predictable JSON, this service could drive different API consumers easily. With more 
time (and in real life), it's like that different clients would require different data; With that in mind, I'd implement 
transformers that would add/remove data as necessary.
