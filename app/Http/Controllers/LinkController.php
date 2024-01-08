<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLinkRequest;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function store(CreateLinkRequest $request)
    {
        $existingLink = Link::where('original_link', $request->original_link)->first();

        if ($existingLink) {
            $shortLink = $existingLink->short_link;
        } else {
            $link = Link::create([
                'original_link' => $request->original_link,
                'expiration_date' => $request->expiration_date ?? now()->addMonth(),
            ]);


            $link->update([
                'short_link' => $this->generateShortLink($request->original_link, $link->id),
            ]);


            if (!$link->short_link) {
                return response()->json(['message' => 'Oops, something went wrong during short link generation']);


            }
            return view('links.store', [
                'message' => 'Short link was successfully generated',
                'original_link' => $request->original_link,
                'expiration_date' => $request->expiration_date ?? $link->expiration_date,
                'short_link' => $shortLink ?? $link->short_link,
                'click_count' => $link->click_count ?? 0,
            ]);
        }

        return view('links.store', [
            'message' => 'Short link already exist',
            'original_link' => $request->original_link,
            'expiration_date' => $existingLink->expiration_date,
            'short_link' => $shortLink,
            'click_count' => $existingLink->click_count ?? 0,

        ]);
    }


    public function generateShortLink($originalLink, $linkId)
    {
        $result = $linkId . $originalLink;
        $hash = hash('sha256', $result);

        $shortLink = substr($hash, 0, 10);
        return $shortLink;

    }

    public function index(Request $request)
        //тут перепроверить все
    {
        return view('links.index');
    }

    public function shortLink()
    {
        return view('links.statistics');
    }

    public function showClicks(Request $request)
    {
        $short_link = basename($request->short_link);
        $link = Link::where('short_link', $short_link)->first();
        if ($link) {
            return view('links.store', [
                'original_link' => $link->original_link,
                'expiration_date' => $link->expiration_date,
                'short_link' => $link->short_link,
                'click_count' => $link->click_count ?? 0,
            ]);
        } else {
            return response()->json(['message' => 'Short link not found'], 404);
        }
    }


}
