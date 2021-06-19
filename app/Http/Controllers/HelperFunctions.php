<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\LinkClick;

class HelperFunctions extends Controller
{
    public static function generateUniqueRandom($limit)
    {
        $is_not_unique = true;
        while ($is_not_unique){
            $unique_url = self::generateString($limit);
            $is_not_unique = Link::where('url_slug', $unique_url)->exists();
        }
        return $unique_url;
    }

    public static function generateString($limit)
    {
        $str = '123456789abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        if($limit > strlen($str)){
            $limit = strlen($str);
        }
        return substr(str_shuffle($str), 0, $limit);
    }

    public static function logLinkClicks($link_id)
    {
        LinkClick::create([
            'link_id' => $link_id,
            'clicked_at' => now(),
            'ip' => request()->ip()
        ]);
        self::incrementClickCount($link_id);
    }

    public static function incrementClickCount($link_id)
    {
        $link = Link::where('id', $link_id)->first();
        if ($link) {
            $link->increment('clicks_count', 1);
            // $link->update();
        }
    }

}
