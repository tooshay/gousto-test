<?php
/**
 * Created by PhpStorm.
 * User: royshay
 * Date: 14/06/2017
 * Time: 17:23
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Recipe
 * @package App
 */
class Recipe extends Model
{
    protected $fillable = [
        'box_type', 'short_title', 'title','slug', 'marketing_description', 'calories_kcal','protein_grams', 'fat_grams',
        'carbs_grams','bulletpoint1', 'bulletpoint2', 'bulletpoint3','recipe_diet_type_id', 'season', 'base',
        'protein_source', 'preparation_type_mins', 'shelf_life_days', 'equipment_needed', 'origin_country',
        'recipe_cuisine', 'in_your_box', 'gousto_reference', 'rating'
    ];

    private static $rules = array(
        'rating' => 'numeric|min:0|max:5'
    );

    /**
     * @param int $rating
     * @return bool
     * @throws \Exception
     */
    public function rate(int $rating)
    {
        if ($this->validate(['rating' => $rating])) {
            $this->rating = $rating;
            $this->save();

            return true;
        } else {
            throw new \Exception('Rating must be numeric and between 0 and 5');
        }
    }

    public function validate($data)
    {
        $v = \Validator::make($data, self::$rules);

        return $v->passes();
    }
}