<?php

namespace App\Http\Controllers\API\User;

use App\Models\User;
use App\Models\national_id;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UpdateUserInfo extends Controller
{

    /**
     * function for update user information [name , adderss and National ID informtion ]
     * return data and errors if only user send ID Without files
     */
    public function updateUser(Request $request)
    {

        // get the user that update information
        $user = $request->user();
        $data = [];
        if($user)
        {
            //get all data from user
            $name = $request->name;
            $address = $request->address;
            $national_id = $request->National_Number;
            $front_image_Natioanl = $request->file('front_National_ID');
            $back_image_Natioanl = $request->file('back_National_ID');

            // if National_ID found
            if($national_id){

                // vaildate Natioanl_ID
                $validator = Validator::make($request->all(),[
                    'front_National_ID' => 'required|file|mimes:jpeg,png,jpg',
                    'back_National_ID' => 'required|file|mimes:jpeg,png,jpg',
                ]);
                if($validator->fails())
                {
                    $response = ['status' => 0, 'message' => 'validation errors', 'errors' => $validator->errors()];
                    return response()->json($response);
                }


                // update filename of image
                $imagename1 = rand(100000, 999999).time(). '.'. $front_image_Natioanl->getClientOriginalExtension();
                $imagename2 = rand(100000, 999999).time(). '.'.$back_image_Natioanl->getClientOriginalExtension();

                // get data of Natioanl_id if existed in database
                $national = national_id::where('user_id', $user->id)->first();
                // delete photo from storage
                if($national)
                {
                    // delete data from user storage
                    Storage::disk('WEVR')->delete($national->front_national);
                    Storage::disk('WEVR')->delete($national->back_national);

                    // update new one
                    $path1 = $front_image_Natioanl->storeAs('National_id', $imagename1, 'WEVR');
                    $path2 = $back_image_Natioanl->storeAs('National_id', $imagename2, 'WEVR');
                    if($path1 || $path2)
                    {
                        $national->id_national = $national_id;
                        $national->front_national = $path1;
                        $national->back_national = $path2;

                        if($national->save())
                        {
                            $data['NationalPhoto'] = 'NationalPhotos updated successfuly';
                        }
                    }
                }else{
                    // store for the frist time
                    $path1 = $front_image_Natioanl->storeAs('National_id', $imagename1, 'WEVR');
                    $path2 = $back_image_Natioanl->storeAs('National_id', $imagename2, 'WEVR');
                    if($path1 || $path2)
                    {
                        $NationalPhotoUser = new national_id();
                        $NationalPhotoUser->user_id = $user->id;
                        $NationalPhotoUser->id_national = $national_id;
                        $NationalPhotoUser->front_national = $path1;
                        $NationalPhotoUser->back_national = $path2;
                        if($NationalPhotoUser->save())
                        {
                            $data['NationalPhoto'] = 'NationalPhotos updated successfuly';
                        }
                    }
                }


            }


            if($name)
            {
                $user->name = $name;
                if($user->save())
                {
                    $data['name'] = 'name updated successfuly';
                }
            }
            if($address)
            {
                $user->adderss = $address;
                if($user->save())
                {
                    $data['address'] = 'address updated successfuly';
                }
            }

            $response = ['status' => 1,'message' => $data];
            return response()->json($response);
        }
    }


    public function checkpassword(Request $request)
    {

        /**
            *another method to merge hased password of request
            *$request->merge(['password' => bcrypt($request->password)]);
        */
        $user = $request->user();
        if (Hash::check($request->password,$user->password))
        {
            $response = ['status' => 1,'message' => 'correct password', true];
            return response()->json($response);
        }else{
            $response = ['status' => 0,'message' => 'password worng', false];
            return response()->json($response);
        }
    }


    public function changePassword(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(),
        ['password' => 'required|string|confirmed']
        );

        if($validator->fails())
        {
            return response()->json($validator->errors());
        }
        $request->merge(['password' => bcrypt($request->password)]);

        $user->password = $request->password;
        $user->save();

        $response = ['status' => 1,'message' => 'password updated successfully'];
            return response()->json($response);
    }

    public function changePhone(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(),
        ['phone' =>  'required']
        );

        if($validator->fails())
        {
            return response()->json($validator->errors());
        }
        $user->phone = $request->phone;
        if($user->save()){
            $response = ['status' => 1,'message' => 'phone updated successfully'];
                return response()->json($response);
        }
    }
}

