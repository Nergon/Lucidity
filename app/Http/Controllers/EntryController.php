<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Contracts\Encryption\EncryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $entries = auth()->user()->entries()->latest()->paginate(30);
        return response()->json($entries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Entry $entry)
    {
        $this->authorize('view', $entry);

        return response()->json($entry);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Entry $entry)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function destroy(Entry $entry)
    {
        $this->authorize('delete', $entry);
        $entry->delete();
        return response()->json(["success" => true]);
    }
}
