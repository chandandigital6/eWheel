<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request){
        $keyword = $request->input('keyword');
        $team = Team::query();

        if (!empty($keyword)) {
            $team->where('title', 'like', "%$keyword%");
        }
        $teamData = $team->paginate(5);

        return view('team.index',compact('teamData'));
    }

    public function create(){
        return view('team.create');
    }

    public function store(TeamRequest $request){
//        dd($request);
        $team=Team::create($request->all());
        $image = $request->file('image')->store('public/team');

        $team->image = str_replace('public/', '', $image);
        $team->save();
        return redirect()->route('team.index')->with('success', 'Team  created successfully.');
    }

    public function edit(Team $team){

        return view('team.edit',compact('team'));
    }

    public function update(Team $team , TeamRequest $request){
        $teamData = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/team');
            $teamData['image'] = str_replace('public/', '', $imagePath);
        }

        $team->update($teamData);

        return redirect()->route('team.index')->with('success', 'team item successfully updated');
    }


    public function delete(Team $team){
        $team->delete();
        return redirect()->route('team.index')->with('error','Successfully  team items deleted');

    }
    public function duplicate(Team $team){
        $productDuplicate=$team->replicate();
        $productDuplicate->save();
        return redirect()->back();
    }
}
