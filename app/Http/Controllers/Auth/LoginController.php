<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //Socialite
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function redirectToProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        // return $user->getAvatar();
        // Find existing user.
        $existingUser = User::whereEmail($user->getEmail())->first();
        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            // Create new user.
            $newUser = User::create([
                'role_id' => Role::where('slug', 'user')->first()->id,
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'status' => true,
                'password' => 'user'
            ]);
            if ($user->getAvatar()) {
                $path = $user->getAvatar();
                $filename_from_url = parse_url($path);
                $ext = pathinfo($filename_from_url['path'], PATHINFO_EXTENSION);
                // $filename = basename($path);
                $get_imageName  =  date('mdYHis') . uniqid() . $ext;
                $directory      = 'images/users/';
                $imageUrl       = $directory . $get_imageName;
                Image::make($path)->save($imageUrl);
                $newUser->image = $imageUrl;
                $newUser->save();
            }
            Auth::login($newUser);
        }
        toastr()->success('You have successfully logged in with ' . ucfirst($provider) . '!', 'Success');
        return redirect($this->redirectPath());
    }
}
