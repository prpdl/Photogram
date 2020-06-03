<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use DemeterChain\A;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\Factory as View;
use Illuminate\Http\Request;

class AlbumController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @param View $view
     * @return \Illuminate\Contracts\View\View
     */
    public function index(View $view)
    {
        $albums = Album::all();

        return $view->make('Album.album-view')->with('albums', $albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('Album.album-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {

        $album = new Album();
        $album->title = $request->title;
        $album->year = $request->year;
        $album->gerne = $request->gerne;
        $album->licence = $request->license;
        $album->save();

        $artist = Artist::whereName($request->artist)->first();
        if (!$artist) {
            $artist = new Artist();
            $artist->name = $request->artist;
            $artist->save();
        }
        $album->artist()->associate($artist);
        $album->save();

        return redirect('album');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $album = Album::whereId($id)->first();
        return \view('Album.album-edit')->with('album', $album);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {

        if (!(Artist::whereName($request->artist)->first())) {
            Artist::create([
                'name' => $request->artist,
            ])->save();
        }
        $artist = Artist::whereName($request->artist)->first();


        $oldAlbum = Album::find($id);
        $oldAlbum->title = $request->title;
        $oldAlbum->gerne = $request->gerne;
        $oldAlbum->year = $request->year;
        $oldAlbum->artist()->dissociate($artist->id);
        $oldAlbum->save();

        $oldAlbum->artist()->associate($artist->id);
        $oldAlbum->save();


        return redirect()->route('album.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        $album->artist()->dissociate();
        $album->listeners()->detach();
        $album->delete();
        session()->flash('deleted', $album->title . ' has been deleted');
        return redirect('album');

    }
}
