<?php

namespace App\Http\Middleware;

use Closure;

class VerifyLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locales = array_keys(config('app.locales'));
        $chosen_locale = $request->language;
        
        //check if the language exists in the locales, if so set locale to this new language
        if (in_array($chosen_locale, $locales)) {
            //setlocale
            app()->setLocale($chosen_locale);
            return $next($request);
        }
        else {
            //redirect to the same page, but in our default language (nl)
            $id = $request->id;
            $next_url = str_replace("{language}" , "/nl" , $request->route()->uri());
            if($id) {
                $next_url = str_replace("{id}" , $id , $next_url);
            }
            //return redirect('/nl');
            return redirect($next_url);
        }
        //return $next($request);
    }
}
