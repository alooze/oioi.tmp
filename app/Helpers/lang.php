<?php
/**
 * Функции для работы на мультиязычном проекте
 */
if (!function_exists('langs')) {
    /**
     * Возвращаем массив ссылок на языковые версии страницы
     * @return array массив ссылок
     */
    function langs()
    {
        $ret = [];
        foreach (config('qwertcms.locales') as $locKey => $locName) {
            $ret[$locName] = lurl($locKey);
        }
        return $ret;
    }
}

if (!function_exists('llinks')) {
    /**
     * Возвращаем HTML код переключателя языков
     * @return string HTML код переключателя языков
     */
    function llinks()
    {
        $ret = '';
        $ret.= '<ul>';
        foreach (langs() as $locName => $locUrl) {
            if ($locName == config('qwertcms.locales')[config('app.locale')]) {
                $ret.= '<li class="active"><span>' . $locName . '</span></li>';
            } else {
                $ret.= '<li><a href="' . $locUrl . '">' . $locName . '</a></li>';
            }
        }
        $ret.= '</ul>';
        return $ret;
    }
}

if (!function_exists('lurl')) {
    /**
     * Возвращаем ссылку на текущий ресурс в другом языке
     * @param  string  $newLang ключ языка
     * @param  bool  $full нужно ли добавлять домен к ссылке
     * @return string         ссылка
     */
    function lurl($newLang, $full=false)
    {
        $url = request()->server('REQUEST_URI');
        $qStr = request()->server('QUERY_STRING');
        $url = str_replace('?' . $qStr, '', $url);
        $segments = explode('/', trim($url, '/'));

        $curLocale = locale();

        if ($newLang == config('app.fallback_locale')) {
            $newLocale = null;
        } else {
            $newLocale = $newLang;
        }

        if (!$newLocale && !$curLocale) {
            // nothing
        } else if (!$newLocale) {
            unset($segments[0]);
        } else if (!$curLocale) {
            array_unshift($segments, $newLocale);
        } else {
            $segments[0] = $newLocale;
        }

        $url = '/' . implode('/', $segments);
        if ($qStr != '') {
            $url.= '?' . $qStr;
        }

        if ($full) {
            return config('app.url') . $url;
        }
        
        return $url;
    }
}

if (!function_exists('locale')) {
    /**
     * Получаем префикс текущей локали
     * Отличие от App::getLocale() - для языка по умолчанию возвращаем null 
     * если в настройках задано always_in_url=false
     * @return string префикс локали
     */
    function locale()
    {
        if (!config('qwertcms.use_multilang')) {
            return null;
        } 

        // $locale = App::getLocale(); // в этом месте еще не отработал middleware для перезаписи 
        $locale = config('app.fallback_locale');
        $url = request()->getPathInfo();
        $segments = explode('/', trim($url, '/'));
        // dd($segments);

        if ($segments[0] == $locale) {
            return null;
        }

        if (in_array($segments[0], array_keys(config('qwertcms.locales')))) {
            return $segments[0];
        }
        
        return null;
    }
}