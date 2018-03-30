<?php
/**
 * Функции, связанные с SEO и выводом счетчиков
 * ВАЖНО!
 * Следует внимательно следить за экранированием в шаблонах blade!
 * Пример вызова: {!! seo('main_page', 'og_title') !!}
 */

/**
 * Вывод SEO строки по ключу расположения и ключу названия
 * @param  string $seoKey   ключ названия
 * @param  string $placeKey ключ расположения
 * @param  string $default   значение  по умолчанию
 * @return string           SEO значение
 */
function seo($seoKey, $placeKey, $default='')
{
    // $data = App\SeoData::where('place_key', $placeKey)->first();
    // if (!$data) return $default;
    // if (!isset($data->$seoKey)) return $default;
    // if (trim($data->$seoKey) == '') return $default;
    // return $data->$seoKey;
    return '';
}

/**
 * Вывод полного текста счетчиков/доп.кода по ключу расположения
 * @param  strins $placeKey ключ расположения
 * @param  string $default   значение  по умолчанию
 * @return string           код для вывода
 */
function counters($placeKey, $default='')
{
    // $data = App\CountersData::where('place_key', $placeKey)->first();
    // if (!$data) return $default;
    // return $data->code;
    return '';
}