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
            $newProject = new Project();
            $newProject->title = $project['title'];
            $newProject->cover_image = $project['cover_image'];
            $newProject->content = $project['content'];
            $newProject->slug = Str::of($project->title)->slug('-');
            $newProject->save();




        }
        
    }
}
