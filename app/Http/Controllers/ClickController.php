<?php

namespace App\Http\Controllers;

use App\Models\Click;
use App\Models\Link;
use Illuminate\Http\Request;

class ClickController extends Controller
{
    public function redirectToOriginal($shortLink)
    {
        $link = Link::where('short_link', $shortLink)->first();

        if ($link) {
            $link->increment('click_count');

            Click::create(['link_id' => $link->id]);

            return redirect($link->original_link);
        }
        else
        {
            return response()->json(['message' => 'Short link not found or original link is not correct'], 404);
        }
}
}
