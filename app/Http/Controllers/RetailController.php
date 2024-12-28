<?php

namespace App\Http\Controllers;

use App\Http\Requests\RetailRequest;
use App\Models\Retail;
use Illuminate\Http\Request;

class RetailController extends Controller
{
    public function index(Request $request){
        $keyword = $request->input('keyword');
        $retails = Retail::query();

        if (!empty($keyword)) {
            $retails->where('title', 'like', "%$keyword%");
        }
        $retailsData = $retails->paginate(5);

        return view('retails.index',compact('retailsData'));
    }

    public function create(){
        return view('retails.create');
    }

    public function store(RetailRequest $request){
//        dd($request);

        $retails=Retail::create($request->all());
        // $image = $request->file('image')->store('public/retails');

        // $retails->image = str_replace('public/', '', $image);
        // $retails->save();
        return redirect()->route('retails.index')->with('success', 'retails  created successfully.');
    }

    public function edit(Retail $retails){

        return view('retails.create',compact('retails'));
    }

    public function update(Retail $retails , RetailRequest $request){
        $retailsData = $request->all();

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('public/retails');
        //     $retailsData['image'] = str_replace('public/', '', $imagePath);
        // }

        $retails->update($retailsData);

        return redirect()->route('retails.index')->with('success', 'retails item successfully updated');
    }


    public function delete(Retail $retails){
        $retails->delete();
        return redirect()->route('retails.index')->with('error','Successfully  retails items deleted');

    }
    public function duplicate(Retail $retails){
        $productDuplicate=$retails->replicate();
        $productDuplicate->save();
        return redirect()->back();
    }
}
