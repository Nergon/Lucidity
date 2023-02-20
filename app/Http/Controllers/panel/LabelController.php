<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function index() {
        $labels = auth()->user()->labels()->orderBy('name', 'asc')->get();
        return view('panel.labels', ['labels' => $labels]);
    }

    public function create(Request $request) {
        $request->validate(array(
            'name' => 'required|max:255'
        ));

        auth()->user()->labels()->create(array(
            'name' => $request->name
        ));

        return redirect()->route('labels')->with('success', 'You successfully created a label');
    }

    public function delete(Label $label) {
        $this->authorize('delete', $label);
        $label->delete();

        return redirect()->route('labels')->with('success', 'This label was deleted');
    }

}
