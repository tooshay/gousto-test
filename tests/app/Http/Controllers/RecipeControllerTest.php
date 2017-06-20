<?php

use Laravel\Lumen\Testing\DatabaseMigrations;

class RecipeControllerTest extends TestCase
{
    use DatabaseMigrations;

    /** @test **/
    public function get_recipes_status_should_return_200()
    {
        factory('App\Recipe', 3)->create();

        $this->get('/recipes')->seeStatusCode(200);
    }

    /** @test **/
    public function get_recipes_should_return_some_recipes()
    {
        $recipes = factory('App\Recipe', 3)->create();
        $this->get('/recipes');

        $content = json_decode($this->response->getContent(), true);

        $this->assertArrayHasKey('data', $content);

        foreach ($recipes as $recipe) {
            $this->seeJson(['title' => $recipe->title]);
        }
    }

    /** @test **/
    public function show_should_return_recipe()
    {
        $this->get('/recipes/1')
            ->seeStatusCode(200);
    }
}
