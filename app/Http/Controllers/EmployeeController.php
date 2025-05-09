<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('employee.index')
      ->with('employees', User::with('role')->get());
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('employee.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'nip' => ['required', 'string', 'max:7', Rule::unique('users', 'nip')],
      'name' => ['required', 'string', 'max:100'],
      'email' => ['required', 'email', 'max:100', Rule::unique('users', 'email')],
      'password' => ['required', 'string', 'confirmed'],
    ]);
    $user = new User($validatedData);
    $user->role_id = 2;
    $user->save();
    return redirect(route('admin.employee.index'))->with('status', 'Employee added successfully');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $nip)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $nip)
  {
    $employee = User::where('nip', $nip)->first();
    if ($employee == null) {
      return back()->withErrors(['err_msg' => 'Employee not found']);
    }
    return view('employee.edit')->with('employee', $employee);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $nip)
  {
    $employee = User::where('nip', $nip)->first();
    if ($employee == null) {
      return back()->withErrors(['err_msg' => 'Employee not found']);
    }
    $validatedData = $request->validate([
      'nip' => ['required', 'string', 'max:7', Rule::unique('users', 'nip')->ignore($nip, 'nip')],
      'name' => ['required', 'string', 'max:100'],
      'email' => ['required', 'email', 'max:100', Rule::unique('users', 'email')->ignore($nip, 'nip')],
    ]);
    $employee->name = $validatedData['name'];
    $employee->email = $validatedData['email'];
    $employee->save();
    return redirect(route('admin.employee.index'))->with('status', 'Employee updated successfully');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $nip)
  {
      $employee = User::where('nip', $nip)->first();
  
      if (!$employee) {
          return back()->withErrors(['err_msg' => 'Employee not found']);
      }
  
      if ($employee->role->name === 'admin') {
          return back()->withErrors(['err_msg' => 'Cannot delete admin']);
      }
  
      $employee->delete();
  
      return redirect()->route('admin.employee.index')->with('status', 'Employee deleted successfully');
  }  
}
