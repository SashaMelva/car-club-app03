<?php

namespace App\Http\Controllers;

//use App\Http\controllers\Controller;
//use I1luminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request ;
//use I1luminate\support\Facades\Auth;

class AuthorizationController extends Controller
{
    public function create()
    {
        return view('authorization/login'); 
    }
   /* use AuthenticatesUsers;

    protected $redirectTo = '/home';
    protected $loginType;

    public function _construct()
    {
        $this->middleware('guest')->except('logout');
        $this->loginType = $this->checkLoginInput();
    }*/

    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
        
    /*protected function checkLoginInput()
    {
        $inputData = request()->get('login');
        return filter_var($inputData, FILTER_VALIDATE_ EMAIL) ? 'email'
        
    }*/
}
