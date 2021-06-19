<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use App\Http\Controllers\HelperFunctions as Helper;
use Illuminate\Support\Str;

class PublicUrlController extends Controller
{
    public function __construct()
    {
        if (!session()->has('session_temp_key')) {
            session(['session_temp_key' => Helper::generateString(30)]);
        }
    }

    public function index(Request $request)
    {
        $session_temp_key = $request->session()->get('session_temp_key');
        $links = Link::where('session_temp_key', $session_temp_key)->get();
        return view('index', compact('links'));
    }

    public function shortenLink(Request $request)
    {
        $url = $request->long_url;
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $link = new Link;
            $link->long_url = $url;
            $link->url_slug = Helper::generateUniqueRandom(5);
            $link->session_temp_key = session('session_temp_key');
            $link->save();
            return redirect()->route('home');
        } else {
            return redirect()->route('home');
        }
        
    }

    public function create(Request $request)
    {
        $url = $request->long_url;
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $link = new Link;
            $link->long_url = $url;
            $link->url_slug = Helper::generateUniqueRandom(5);
            $link->session_temp_key = session('session_temp_key');
            $link->save();
            return response()->json($link, 200);
        } else {
            return response()->json(['msg' => 'Invalid Url'], 400);
        }
    }

    public function listLinks()
    {
        // echo "hi";
    }

    public function urlRedirection($url_slug)
    {
        $link = Link::where('url_slug',$url_slug)->select('long_url', 'id')->first();
        if ($link) {
            Helper::logLinkClicks($link->id);
            return redirect($link->long_url);
        }else {
            return redirect()->route('home', '?');
        }
    }


}
