<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class Projectcontroller extends Controller
{
    public function index(){
        return response()->json(
            [
                'success' => true,
                'results' => Project::with(['type', 'tecnologies'])->orderByDesc('id')->paginate(),
            ]
            );
    }



    public function show($id) {
    
        $project = Project::with(['type', 'tecnologies'])->where('id', $id)->first();
        //dd($project);
        if($project) {
            return response()->json([
                'success' => true,
                'results' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => '404 Not found'
            ]);
        }
    }
}
