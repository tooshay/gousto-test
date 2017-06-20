<?php

use App\Recipe;
use Carbon\Carbon;
use Keboola\Csv\CsvFile;
use Illuminate\Database\Seeder;

class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->delete();

        $csv = new CsvFile(base_path().'/database/seeds/recipe-data.csv');

        foreach ($csv as $k => $row) {
            if ($k === 0) continue;

            $created = Carbon::createFromFormat('d/m/Y H:i:s', $row[1]);
            $updated = Carbon::createFromFormat('d/m/Y H:i:s', $row[2]);

            Recipe::create([
                'created_at' => $created,
                'updated_at' => $updated,
                'box_type' => $row[3],
                'title' => $row[4],
                'slug' => $row[5],
                'short_title' => $row[6],
                'marketing_description' => $row[7],
                'calories_kcal' => $row[8],
                'protein_grams' => $row[9],
                'fat_grams' => $row[10],
                'carbs_grams' => $row[11],
                'bulletpoint1' => $row[12],
                'bulletpoint2' => $row[13],
                'bulletpoint3' => $row[14],
                'recipe_diet_type_id' => $row[15],
                'season' => $row[16],
                'base' => $row[17],
                'protein_source' => $row[18],
                'preparation_type_mins' => $row[19],
                'shelf_life_days' => $row[20],
                'equipment_needed' => $row[21],
                'origin_country' => $row[22],
                'recipe_cuisine' => $row[23],
                'in_your_box' => $row[24],
                'gousto_reference' => $row[25]
            ]);
        }
    }
}
