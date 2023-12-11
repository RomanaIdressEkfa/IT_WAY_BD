<?php

namespace App\Http\Controllers;

use App\Helpers\Upload;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employees;
use App\Models\Skills;
use Exception;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {

        $sl = !is_null(\request()->page) ? (\request()->page -1 )* 8 : 0;
        $employees = Employees::latest()->paginate(8);
        return view('backend.layouts.Employees.index', compact('employees','sl'));
    }


    public function create()
    {
        $skills=Skills::all();
        return view('backend.layouts.Employees.create',compact('skills'));
    }


    public function view($id)
    {
        $employee = Employees::find($id);
        return view('backend.layouts.Employees.view', compact('employee'));
    }


    public function store(StoreEmployeeRequest $request)
    {

        try {
            $data= $request->all();
            if($request->image){
                $imageName = '';
                // upload image
                $imageName = Upload::uploadImage($request->image, 'images/employees');
                $data["image"]=$imageName;
            }
            Employees::create($data);
            toastr()->success('Employee has been created successfully!', 'Congrats');
            return redirect()->route('employee_details_index');
        } catch (Exception $e) {
            toastr()->error('Something went wrong!', 'Alert');
        }
    }
    // public function store(Request $request)
    // {
    //     // dd($request->all());
    //     $validatedData = $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'phone_number' => 'nullable',
    //         'address' => 'nullable|string',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'skills' => 'nullable|array', // assuming skills are passed as an array
    //     ]);

    //     // Handle image upload if provided
    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('images', 'public');
    //         $validatedData['image'] = $imagePath;
    //     }

    //     // Create the employee
    //     $employee = Employees::create($request->all());
    //     // dd($employee);

    //     // Attach skills to the employee
    //     if ($request->filled('skills')) {
    //         $employee->skills()->attach($request->input('skills'));
    //     }

    //     return redirect()->back()->with('success', 'Employee details added successfully');
    // }


    public function edit($id)
    {
        $employee = Employees::find($id);
        return view('backend.layouts.Employees.edit', compact('employee'));
    }


    public function update(UpdateEmployeeRequest $request, $id)
    {
        try{

            $data = $request->except('_token');
            Employees::where('id', $id)->update($data);
            toastr()->success('Category has been updated successfully!', 'Congrats');
            return redirect()->route('employee_details_index');

        }catch(Exception $e){
            toastr()->error('Something went wrong!', 'Alert');
        }
    }


    public function delete($id)
    {
        $employee = Employees::find($id);
        $deleteOldImage = 'images/employees/' . $employee->image;
        File::delete($deleteOldImage);
        $employee->delete();
        return redirect()->back();
    }
}
