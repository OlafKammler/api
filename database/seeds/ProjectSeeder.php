<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Project::class, 5)->create()->each(function ($project) {
            factory(App\Form::class, 5)->create()->each(function ($form) use ($project) {
                $project->forms()->save($form);
            });
        });
    }
}
