<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\Skills;
use Exception;
use Illuminate\Http\Request;
use File;

class SkillsController extends Controller
{
    public function index(){

        $sl = !is_null(\request()->page) ? (\request()->page -1 )* 8 : 0;
        $skills=Skills::latest()->paginate(8);
        $employees=Employees::all();
        return view('backend.layouts.Skills.index',compact('skills','sl','employees'));
    }

    public function create(){
        $employees=Employees::all();
        return view('backend.layouts.Skills.create',compact('employees'));
    }


    public function view($id)
    {
        $skill = Skills::find($id);
        return view('backend.layouts.Skills.view', compact('skill'));
    }

  public function store(Request $request){

        try{
            $data = $request->all();
            Skills::create($data);
            return redirect()->route('skill_details_index');
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

    public function edit($id)
    {
        $skill = Skills::find($id);
        return view('backend.layouts.Skills.edit', compact('skill'));
    }

    public function update(Request $request, $id)
    {
        try{
            $data = $request->except('_token');
            Skills::where('id', $id)->update($data);
            return redirect()->route('skill_details_index');

        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

    public function delete($id)
    {
        $skill =Skills::find($id);
        $skill->delete();
        return redirect()->back();
    }
}
