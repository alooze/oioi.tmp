<?php

namespace App\Http\Middleware;

use Closure;
use App;

class Language
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
        if ($request->is('admin*') || $request->is('login') || $request->is('register') || $request->is('password/reset')) {
            return $next($request);
        }

        /**
         * В этом блоке реализована логика работы, когда язык по умолчанию
         * не указывается в URL, а все остальные - указываются
         */
        if (config('qwertcms.use_multilang')) {
            $locale = $request->segment(1);

            if (!$locale) {
                App::setLocale(config('app.fallback_locale'));
                return $next($request);
            }

            if (!array_key_exists($locale, config('qwertcms.locales'))) {
                App::setLocale(config('app.locale'));
                return $next($request);
            }

            if ($locale == config('app.fallback_locale')) {
                $segments = $request->segments();
                unset($segments[0]);
                if ($request->server('QUERY_STRING') != '') {
                    $qStr = '?' . $request->server('QUERY_STRING');
                } else {
                    $qStr = '';
                }
                return redirect(implode('/', $segments) . $qStr);
            }

            App::setLocale($locale);
        }

        /**
         * В этом блоке реализована логика работы, когда все языки сайта 
         * всегда указываются принудительно в URL
         */
        /*if (config('qwertcms.use_multilang')) {
            $locale = $request->segment(1);
            if (!$locale) {
                return redirect('/' . config('app.locale'));
            }

            if (!array_key_exists($locale, config('qwertcms.locales'))) {
                $segments = $request->segments();
                array_unshift($segments, config('app.locale'));

                return redirect(implode('/', $segments));
            }

            App::setLocale($locale);
        }*/

        return $next($request);
    }
}
