<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $shortLinks = ShortLink::latest()->get();
        return view('shortenLink', compact('shortLinks'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
        ]);

        $short_links = ShortLink::create([
            'code'  => Str::random(6),
            'link'  => $request->link,
            'click' => 0,
            'type'  => null,
        ]);

        return redirect('')->with('success', 'Shorten Link Generated Successfully!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function shortenLink($code)
    {
        $find = ShortLink::where('code', $code)->first();
        $short_links = $find->update([
            'click' => $find->click+1,
        ]);
        return redirect($find->link);
    }
}
