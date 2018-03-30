<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\FilmRelation;
use App\Country;

class Film extends Model
{
    protected $table = 'films';
    protected $fillable = [
        'user_id', 'step', 'steps', 'title', 'based_on', 'country', 'project_status', 'genre', 'pitch_link', 'pitch_pass', 'pitch_file',
        'total_budget', 'fin_secured', 'fin_required',
        'logline', 'synopsis', 'additional', 'thumbnail', 'artwork', 'script', 'fin_plan', 'detailed_budget', 'terms',
    ];
    protected static $stepsIndex = [
        'general',
        'producer', 'director', 'writer', 'dop',
        'budget', 'detailed'
    ];
    protected $stepsAssoc = [
        'general' => ['title' => 'General Info'],
        'producer' => ['title' => 'Producer'],
        'director' => ['title' => 'Director'],
        'writer' => ['title' => 'Writer'],
        'dop' => ['title' => 'DOP'],
        'budget' => ['title' => 'Budget'],
        'detailed' => ['title' => 'Detailed Info'],
    ];
    protected static $stepsRules = [
        'general' => [
            'title' => 'required',
            'based_on' => 'required',
            'country' => 'required',
            'project_status' => 'required',
            'genre' => 'required',
            // 'pitch_pass' => 'required_with:pitch_link|required_without:pitch_file_input',
            // 'pitch_file_input' => 'required_without:pitch_pass'
        ],
        'budget' => [
            'total_budget' => 'required',
            'fin_secured' => 'required',
            'fin_required' => 'required',
        ],
        'detailed' => [
            'logline' => 'required',
            'synopsis' => 'required',
            'additional' => 'required',
            // 'thumbnail_input' => 'max:10240|mimes:image/jpeg,image/png',
            // 'artwork_input' => 'max:10240',
            // 'script_input' => 'max:10240',
            // 'fin_plan_input' => 'max:10240',
            // 'detailed_budget_input' => 'max:10240',
            // 'terms' => 'accepted',
        ],
    ];

    protected static $files = [
        'pitch_file', 'thumbnail', 'artwork', 'script', 'fin_plan', 'detailed_budget'
    ];

    public function producer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function stepIsFirst() {
       return ($this->steps == null);
    }

    public static function getFiles() {
        return self::$files;
    }

    public static function getRules($step) {
        return self::$stepsRules[$step];
    }

    public static function getStepsFirst($step = false, $firstVal = 0) {
        $result = [];
        foreach (self::$stepsIndex as $key)
            $result[$key] = 0;
        if ($step != false)
            $result[$step] = $firstVal;
        return $result;
    }

    public static function getFirstStep() {
        return self::$stepsIndex[0];
    }

    // public function personnel($role) {
    //     return $this->hasMany('App\FilmPersonnel')->where('role', $role)->get();
    // }
    public function pers() {
        return $this->hasMany(FilmPersonnel::class);
    }

    public function personnel($role='all') {
        if ($role == 'all') {
          return $this->pers()->get();
        } else {
          return $this->pers()
                      ->where('role', $role)
                      ->get();
        }
    }

    public function hasMeAs($role)
    {
        $me = auth()->user();
        return (boolean) $this->pers()
                        ->where('role', $role)
                        ->where('external', $me->id)
                        ->first();
    }

    public function stepTitle($link) {
        return $this->stepsAssoc[$link]['title'];
    }

    public function getStepList($currentStep) {
        $result = $this->stepsAssoc;
        $firstTime = ($this->steps == null);
        $stepsDB = ($firstTime) ? self::getStepsFirst() : unserialize($this->steps);
        foreach ($stepsDB as $step => $done) {
            $result[$step]['class'] = ($done) ? 'completed' : '';
            $result[$step]['href'] = ($firstTime) ? route('f.films.add', $step) : route('f.films.edit', ['id' => $this->id, 'step' => $step]);
        }
        $result[$currentStep]['class'] .= ' active';
        return $result;
    }

    public function stepCheck($step, $value = 1) {
        $stepsDB = unserialize($this->steps);
        $stepsDB[$step] = $value;
        $this->steps = serialize($stepsDB);
    }

    public function stepsDone() {
        foreach (unserialize($this->steps) as $step => $done)
            if (!$done)
                return false;
        return true;
    }

    public function nextStep($link) {
        $pos = array_search($link, self::$stepsIndex);
        return self::$stepsAssoc[$pos + 1];
    }

    public function nextStepLink($link) {
        $pos = array_search($link, self::$stepsIndex);
        return self::$stepsIndex[$pos + 1];
    }

    public function nextStepHref($link) {
        $nextLink = $this->nextStepLink($link);
        return route('f.films.edit', ['id' => $this->id, 'step' => $nextLink]);
    }

    public function isSubmitted() {
        return ($this->submit);
    }

    public function timeAttribute($value) {
        return (new Carbon($value))->format('h:i');
    }

    public function dateAttribute($value) {
        return (new Carbon($value))->format('d/m/Y');
    }

    public function getRequiredPercentAttribute($value) {
        $divider = ($this->total_budget) ? : (($this->fin_required) ? : 1);
        return $this->fin_required / $divider * 100;
    }

    public function getSecuredPercentAttribute($value) {
        $divider = ($this->total_budget) ? : (($this->fin_secured) ? $this->fin_required : 1);
        return $this->fin_secured / $divider * 100;
    }
    public function getTotalBeautyAttribute() {
        return number_format($this->total_budget, 0, ',', ' ');
    }
    public function getRequiredBeautyAttribute() {
        return number_format($this->fin_required, 0, ',', ' ');
    }
    public function getSecuredBeautyAttribute() {
        return number_format($this->fin_secured, 0, ',', ' ');
    }
    public function setTotalBudgetAttribute($value) {
      $filtered = str_replace(' ', '', $value);
      $filtered = str_replace(',', '.', $filtered);
      $this->attributes['total_budget'] = ( $filtered ) ?: null;
    }
    public function setFinRequiredAttribute($value) {
      $filtered = str_replace(' ', '', $value);
      $filtered = str_replace(',', '.', $filtered);
      $this->attributes['fin_required'] = ( $filtered ) ?: null;
    }
    public function setFinSecuredAttribute($value) {
      $filtered = str_replace(' ', '', $value);
      $filtered = str_replace(',', '.', $filtered);
      $this->attributes['fin_secured'] = ( $filtered ) ?: null;
    }

    public function getVars($key, $defaults) {
      $myVars = Film::where('user_id', $this->user_id)
                   ->groupBy($key)
                   ->pluck($key, $key)
                   ->toArray();

      foreach ($myVars as $key => $val) {
        if (isset($defaults[$key])) {
          unset($myVars[$key]);
        }
      }
      return array_merge($defaults, $myVars);
    }

    public function getFileName($name) {
        $parts = explode('/', $this->$name);
        $last = count($parts) - 1;
        return $parts[$last];
    }

    public function countryName() {
        if ( $this->country == '' || $this->country == null || $this->country == '0' ) {
          return '-';
        } else {
          $result = Country::where('ISO', $this->country)->first();
          if (!$result) {
            return $this->country;
          } else {
            return $result->Country;
          }
        }
    }
}
