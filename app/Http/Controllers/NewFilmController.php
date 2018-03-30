<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\User;
use App\Film;
use App\FilmPersonnel;
use Validator;


class NewFilmController extends Controller
{
    public function getData($id) {
        // $user = Auth::user();
        $result = Film::findOrFail($id);
        // if ($user->id != $result->user_id)
            // return false;

        // $result->fileName = $result->getFileName();
        $result->countryName = $result->countryName();
        $result->steps = unserialize($result->steps);
        $personnelTypes = ['producer', 'director', 'writer', 'dop'];
        foreach ($personnelTypes as $pType) {
            $personnel = [];
            foreach ($result->personnel($pType) as $person) {
                $person['isMe'] = $person->is_me;
                $personnel[] = $person->attributesToArray();
            }
            $result[$pType] = $personnel;
        }
        return response()->json($result);
    }

    public function getUserData() {
        // $user = Auth::user();
        // $user = $user->attributesToArray();
        $user = User::findOrFail(1)->attributesToArray();
        return response()->json($user);
    }
}
