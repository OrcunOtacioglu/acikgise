<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'is_admin',
        'role_id',
        'phone',
        'citizenship',
        'identification_number',
        'address',
        'zip_code',
        'province',
        'country',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return request()->user()->is_admin;
    }

    // @TODO ADD VALIDATION TO BOTH METHODS.
    // @TODO CHECK IF WE CAN USE NATIVE CREATE AND UPDATE METHODS ON MODELS
    public static function createNew(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->surname = $request->surname;

        $user->is_admin = $request->is_admin;
        $user->role_id = $request->role_id;

        $user->phone = $request->phone != null
                            ? $request->phone
                            : '5555555555';
        $user->citizenship = $request->citizenship;
        $user->identification_number = $request->identification_number != null
                                            ? $request->identification_number
                                            : '22222222222';

        $user->address = $request->address;
        $user->zip_code = $request->zip_code;
        $user->province = $request->province != null
                                ? $request->province
                                : 'Istanbul';
        $user->country = $request->country != null
                                ? $request->country
                                : 'Turkey';

        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->updated_at = Carbon::now();
        $user->created_at = Carbon::now();

        $user->save();

        return $user;
    }

    public static function updateEntity(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->surname = $request->surname;

        $user->is_admin = $request->is_admin;
        $user->role_id = $request->role_id;

        $user->phone = $request->phone != null
                            ? $request->phone
                            : '5555555555';
        $user->citizenship = $request->citizenship;
        $user->identification_number = $request->identification_number != null
                                            ? $request->identification_number
                                            : '22222222222';

        $user->address = $request->address;
        $user->zip_code = $request->zip_code;
        $user->province = $request->province != null
                                ? $request->province
                                : 'Istanbul';
        $user->country = $request->country != null
                                ? $request->country
                                : 'Turkey';

        $user->email = $request->email;
        $user->password = $request->password == null ? $user->password : bcrypt($request->password);

        $user->updated_at = Carbon::now();

        $user->save();

        return $user;
    }
}
