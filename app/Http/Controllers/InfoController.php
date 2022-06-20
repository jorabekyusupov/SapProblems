<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Validator;

class InfoController extends Controller
{
    public function index()
    {
        $problems = Problem::with('user')->orderBy('id', 'desc')->paginate(15);
        return view('dashboard', compact('problems'));

    }

    public function create()
    {
        return view('Problems.create');
    }

    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'kod' => 'required|unique:problems',
            'problem' => 'required',
            'solution' => 'nullable',
            'start_date' => 'required',
            'end_date' => 'required'
        ])->validated();
        $data['user_id'] = auth()->user()->id;
        $problem = Problem::create($data);
        return redirect()->route('dashboard')->with('success', 'Problem created successfully.');
    }

    public function edit($id)
    {
        $model = Problem::findOrFail($id);
        return view('Problems.update', compact('model'));
    }
    public function update(Request $request, $id)
    {
        $data = Validator::make($request->all(), [
            'kod' => 'required|unique:problems,kod,' . $id,
            'problem' => 'required',
            'solution' => 'nullable',
            'start_date' => 'required',
            'end_date' => 'required'
        ])->validated();
        $data['user_id'] = auth()->user()->id;
        $problem = Problem::findOrFail($id);
        $problem->update($data);
        return redirect()->route('dashboard')->with('success', 'Problem updated successfully.');
    }

    public function destroy($id)
    {
        $model = Problem::findOrFail($id);
        $model->delete();
        return redirect()->route('dashboard')->with('success', 'Problem deleted successfully.');

    }
}
