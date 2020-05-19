<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangeLocale extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, ['locale' => 'required|in:es,en']);

        session(['locale' => $request->locale]);

        return redirect()->back();
    }
}
