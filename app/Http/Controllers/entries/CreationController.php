<?php

namespace App\Http\Controllers\entries;

use App\Http\Controllers\Controller;
use App\Models\Label;
use Illuminate\Contracts\Encryption\EncryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CreationController extends Controller {

    public function index() {
        return view('panel.entries.create');
    }

    public function create(Request $request) {

        $request->validate(array(
           'title' => 'required|max:255',
           'body' => 'required',
           'lucidity' => 'required'
        ));

        try {
            $body = Crypt::encrypt($request->body);
            $title = Crypt::encrypt($request->title);
        } catch (EncryptException $e) {
            $body = $request->body;
            $title = $request->title;
        }

        $entry = auth()->user()->entries()->create(array(
            'title' => $title,
            'content' => $body,
            'lucidity' => $request->lucidity
        ));

        $labels = json_decode($request->labels, true);
        foreach ($labels as $label) {
            $label_fetched = auth()->user()->labels()->where('name', '=', $label['value'])->get();
            if($label_fetched->count() == 0) {
                $label = auth()->user()->labels()->create(array(
                    'name' => $label['value']
                ));
                $entry->labels()->attach($label->id);
                continue;
            }
            foreach ($label_fetched as $reallabel) {
                $entry->labels()->attach($reallabel->id);
            }
        }

        return redirect()->route('entry', ['entry' => $entry]);
    }

}
