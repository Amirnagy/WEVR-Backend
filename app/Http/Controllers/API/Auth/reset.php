<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Mail\resetMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
class reset extends Controller
{
    private function apiResponse($status,$massage,$data)
    {
        $response = [
            'status' => $status,
            'massage' =>$massage,
            'data' => $data
        ];
        return response()->json(
            $response
        );
    }
    public function sendingEmail(Request $request)
    {

        $vaildator = Validator::make($request->all(),
        [
            'email' => 'required|email',
        ]);
        if(!$vaildator)
        {
            $this->apiResponse(0,'email required',[$vaildator->errors()]);
        }
        $user = User::where('email',$request->email)->first();

        if($user)
        {
            $pin_code = random_int(1000,9999);
            $updated_code = $user->update(['pin_code' =>$pin_code]);

            if($updated_code)
            {
                Mail::to($user->email)->send(new resetMail($pin_code));
                // email should send again with confirmed code
                return $this->apiResponse(1,
                'please check your email',
                [
                    'email'=>$user->email,
                    'OTP'=> $pin_code
                ]);
            }
        }else
        {
            return $this->apiResponse(0,'email not register ',[]);
        }
    }



    // should send email for me ...
    public function checkOPT(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if($request->pin_code == $user->pin_code)
        {
            return $this->apiResponse(1,'OTP correct',true);
            $user->pinTry = 0;
            $user->pin_code = 0;
            $user->save();
        }else{
            $user->pinTry = $user->pinTry+1;
            $user->save();
            if($user->pinTry < 5 ){
                return $this->apiResponse(0,"you have exceeded the $user->pinTry of attempts",true);
            }else{
                $user->pin_code = 0;
                $user->pinTry = 0;
                $user->save();
                return $this->apiResponse(0,'you have exceeded the number of attempts',false);

            }
        }


    }
    public function newPassword(Request $request)
    {

            $user = User::where('email',$request->email)->first();
            $vaildator = Validator::make($request->all(),['password' => 'required|confirmed']);
            if(!$vaildator)
            {
                return $this->apiResponse(0,'error in reset',[$vaildator->erros()]);
            }else
            {
                $request->merge(['password' => bcrypt($request->password)]);
                $user->update($request->all());
                return $this->apiResponse(1,'password update successfully',[]);
            }

    }


}
