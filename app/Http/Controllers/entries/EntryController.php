<?php

namespace App\Http\Controllers\entries;

use App\Http\Controllers\Controller;
use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\EncryptException;
use Illuminate\Support\Facades\Crypt;

class EntryController extends Controller {

    public function show(Entry $entry) {
        $this->authorize('view', $entry);

        return view('panel.entries.entry', ['entry' => $entry]);
    }

    public function editIndex(Entry $entry) {
        $this->authorize('update', $entry);

        return view('panel.entries.edit', ['entry' => $entry]);
    }

    public function update(Request $request, Entry $entry) {
        $this->authorize('update', $entry);
        $request->validate(array(
           'body' => 'required',
           'title' => 'required|max:255'
        ));

        try {
            $body = Crypt::encrypt($request->body);
            $title = Crypt::encrypt($request->title);
        } catch (EncryptException $e) {
            $body = $request->body;
            $title = $request->title;
        }

        $entry->content = $body;
        $entry->title = $title;
        $entry->lucidity = $request->lucidity;

        $entry->save();

        return redirect()->route('entry', $entry);
    }

    public function delete(Entry $entry) {
        $this->authorize('delete', $entry);
        $entry->delete();
        return redirect()->route('index');
    }
}
