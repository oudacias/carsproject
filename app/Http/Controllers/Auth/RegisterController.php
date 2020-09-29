<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Userimage;

use App\Notificationadmin;
use Pusher\Pusher;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telephone' => ['required', 'string', 'max:255'],
            'role' => ['required','string','max:255'],
            'objectif' => ['required','string','max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
            $user = User::where('email','=',$data['email'])->exists();
            if(!$user){
            $user = User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'telephone' => '212' .$data['telephone'],
            'role' => $data['role'],
            'objectif' => $data['objectif'],
            'password' => Hash::make($data['password']),
        ]);
        
            $image = new Userimage();
            $image->user_id = $user->id;
            $image->image_path = "/project_images/carCartoon.png";
            $image->save();


            if($data['objectif'] == 'fournisseur' or $data['objectif'] == 'particulier'){
                $notification_service = new Notificationadmin();
                $admin_id = User::where('role','=','administrateur')->first();
                $notification_service->admin_id = $admin_id->id;
                $notification_service->type_notification = $data['objectif'];
                $notification_service->save();

                $options = array(
                    'cluster' => 'mt1',
                    'encrypted' => true
                );
                $pusher = new Pusher(
                    'e22834bea53871f1ab35',
                    'e76dc5f68506f1cfe69e',
                    '1075023',
                    $options
                );
                $pusher->trigger('notifyadmin', 'notify-event', $notification_service);
            }
            return $user;
            }
            


            

    }
}
