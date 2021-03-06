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
            $user = factory(App\User::class)->create();
            $project->memberships()->attach($user->id, ['role' => 'Owner']);

            factory(App\Playlist::class, 5)->create()->each(function ($playlist) use ($project) {
                $project->playlists()->save($playlist);
            });
            factory(App\Scenario::class, 5)->create()->each(function ($scenario) use ($project) {
                $project->scenarios()->save($scenario);
            });
            factory(App\Form::class, 5)->create()->each(function ($form) use ($project) {
                $project->forms()->save($form);
            });
            factory(App\Checkpoint::class, 5)->create()->each(function ($checkpoint) use ($project) {
                $project->checkpoints()->save($checkpoint);
            });
            factory(App\ModelContext::class, 5)->create()->each(function ($contextModel) use ($project) {
                $project->modelContexts()->save($contextModel);
            });
            factory(App\ModelArchitecture::class, 5)->create()->each(function ($contextModel) use ($project) {
                $project->modelArchitectures()->save($contextModel);
            });
            factory(App\ModelScenery::class, 5)->create()->each(function ($contextModel) use ($project) {
                $project->modelSceneries()->save($contextModel);
            });
        });
    }
}
