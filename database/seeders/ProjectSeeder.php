<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = config('projects.projects');

        foreach ($projects as $project){
            $project = new Project();
            $project->title = $project['title'];
            $project->cover_image = $project['cover_image'];
            $project->content = $project['content'];
            $project->slug = Str::of($project->title)->slug('-');
            $project->save();




        }
        
    }
}
