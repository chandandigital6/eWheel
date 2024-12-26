<?php

namespace App\Http\Controllers;

use App\Http\Requests\MissionVisionRequest;
use App\Models\MissionVision;
use Illuminate\Http\Request;

class MissionVisionController extends Controller
{
    public function index(Request $request){
        $keyword = $request->input('keyword');
        $missionVision = MissionVision::query();

        if (!empty($keyword)) {
            $missionVision->where('title', 'like', "%$keyword%");
        }
        $missionVisionData = $missionVision->paginate(5);

        return view('missionvision.index',compact('missionVisionData'));
    }

    public function create(){
        return view('missionvision.create');
    }

    public function store(MissionVisionRequest $request){
//        dd($request);

        $missionVision=MissionVision::create($request->all());
        // $image = $request->file('image')->store('public/missionVision');

        // $missionVision->image = str_replace('public/', '', $image);
        // $missionVision->save();
        return redirect()->route('missionVision.index')->with('success', 'missionVision  created successfully.');
    }

    public function edit(MissionVision $missionVision){

        return view('missionvision.create',compact('missionVision'));
    }

    public function update(MissionVision $missionVision , MissionVisionRequest $request){
        $missionVisionData = $request->all();

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('public/missionVision');
        //     $missionVisionData['image'] = str_replace('public/', '', $imagePath);
        // }

        $missionVision->update($missionVisionData);

        return redirect()->route('missionVision.index')->with('success', 'missionVision item successfully updated');
    }


    public function delete(MissionVision $missionVision){
        $missionVision->delete();
        return redirect()->route('missionVision.index')->with('error','Successfully  missionVision items deleted');

    }
    public function duplicate(MissionVision $missionVision){
        $productDuplicate=$missionVision->replicate();
        $productDuplicate->save();
        return redirect()->back();
    }
}
