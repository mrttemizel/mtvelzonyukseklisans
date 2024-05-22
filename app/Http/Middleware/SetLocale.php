<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{

    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);

        if (! in_array($locale, config('app.available_locales'))) {
            return redirect()->route('student.index', ['locale' => config('app.locale')]);
        }

        session()->put('locale', $locale);
        app()->setLocale($locale);

        return $next($request);
    }
}
