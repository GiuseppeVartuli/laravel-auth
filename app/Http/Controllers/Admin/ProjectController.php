<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Tecnology;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(Project::orderByDesc('id')->paginate());
        
        return view('admin.projects.index', ['projects' => Project::orderByDesc('id')->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $tecnologies = Tecnology::all();
        return view('admin.projects.create', compact('types', 'tecnologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request) // per la validazione andare in storeproject e imposta true nelle autorizzazioni.
    {
        //
        $val_data = $request->validated();
        $val_data['cover_image'] = Storage::put('uploads', $request->cover_image);
        $val_data['slug'] = Str::slug($request->title, '-');
        //dd($val_data);
        $project = Project::create($val_data);
        
        if($request->has('tecnologies')) {
            $project->tecnologies()->attach($val_data['tecnologies']);
        }
        
        
        return to_route('admin.projects.index')->with('message', 'Hai creato un nuovo progetto');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {

        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //dd($request->all());

        $val_data = $request->validated();


        if ($request->has('cover_image')) {
            if ($project->cover_image) {
                Storage::delete($project->cover_image);
            }

            $image_path = Storage::put('uploads', $request->cover_image);

            $val_data['cover_image'] = $image_path;
        }

        $project->update($val_data);

        return to_route('admin.projects.index')->with('message', 'Hai modificato il progetto');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->cover_image && !Str::startsWith($project->cover_image, 'https://')) {
            Storage::delete($project->cover_image);
        }
        $project->delete();
        return to_route('admin.projects.index')->with('message', 'Hai eliminato il progetto');
    }
}
