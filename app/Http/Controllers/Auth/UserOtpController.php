<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserOtp;

class UserOtpController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function login()
    {
        return view('auth.otpLogin');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function generate(Request $request)
    {
        /* Validate Data */
        $request->validate([
            'phone' => 'required'
        ]);
        /* Generate An OTP */
        $userOTP = $this->registerOTP($request->phone);
        $otpResponse = $this->sendOTP($request->phone, $userOTP['otp']);

        // return response as API
        return response()->json($otpResponse);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function registerOTP($phone)
    {
        $user = User::where('phone', $phone)->first();
        if ($user) {
            return [
                'status' => 'error',
                'message' => 'Phone number already exists',
                'data' => []
            ];
        }

        /* User Does not Have Any Existing OTP */
        $userOTP = UserOtp::where('user_phone', $phone)->latest()->first();
        $now = now();

        if ($userOTP && $now->isBefore($userOTP->expire_at)) {
            return $userOTP;
        }

        $now = now();
        /* Create a New OTP */
        return UserOtp::create([
            'user_phone' => $phone,
            'otp' => rand(1000, 9999),
            'expire_at' => $now->addMinutes(10)
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function loginOTP(Request $request)
    {
        /* Validation */
        $request->validate([
            'phone' => 'required',
        ]);

        $phone = $request->phone;
        $user = User::where('phone', $phone)->first();
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Mobile number not registered',
                'data' => []
            ]);
        }
        /* User Does not Have Any Existing OTP */
        $userOTP = UserOtp::where('user_id', $user->id)->latest()->first();
        $now = now();

        if ($userOTP && $now->isBefore($userOTP->expire_at)) {
            $otpResponse = $this->sendOTP($phone, $userOTP->otp);
            return response()->json($otpResponse);
        }

        /* Create a New OTP */
        $userOTP =  UserOtp::create([
            'user_id' => $user->id,
            'otp' => rand(1000, 9999),
            'expire_at' => $now->addMinutes(10)
        ]);

        if ($userOTP) {
            $otpResponse = $this->sendOTP($phone, $userOTP->otp);
            return response()->json($otpResponse);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to generate OTP',
                'data' => []
            ]);
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function verifyOTP(Request $request)
    {
        /* Validation */
        $request->validate([
            'phone' => 'required',
            'otp' => 'required'
        ]);

        /* Validation Logic */
        $userOTP = UserOtp::where('user_phone', $request->phone)->where('otp', $request->otp)->first();

        $now = now();
        if (!$userOTP) {
            return response()->json([
                'status' => 'error',
                'message' => 'Your OTP is not correct',
                'data' => []
            ]);
        } else if ($userOTP && $now->isAfter($userOTP->expire_at)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Your OTP has been expired',
                'data' => []
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Your OTP is correct',
            'data' => []
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function loginWithOtp(Request $request)
    {
        /* Validation */
        $request->validate([
            'phone' => 'required',
            'otp' => 'required'
        ]);

        $user = User::where('phone', $request->phone)->first();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Mobile number not registered',
                'data' => []
            ]);
        }

        /* Validation Logic */
        $userOTP   = UserOtp::where('user_id', $user->id)->where('otp', $request->otp)->first();
        $now = now();
        if (!$userOTP) {
            return response()->json([
                'status' => 'error',
                'message' => 'Your OTP is not correct',
                'data' => []
            ]);
        } else if ($userOTP && $now->isAfter($userOTP->expire_at)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Your OTP has been expired',
                'data' => []
            ]);
        }

        if ($user) {
            $userOTP->update([
                'expire_at' => now()
            ]);
            Auth::login($user);
            return response()->json([
                'status' => 'success',
                'message' => 'User logged in successfully',
                'data' => [
                    'user' => $user
                ]
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Failed to login user',
            'data' => []
        ]);
    }



    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendOTP($mobile, $otp)
    {
        try {
            // OTP template name (optional)
            $otpTemplateName = 'OTPFIN'; // Replace with your OTP template name if you have one

            // Your 2Factor.in API key
            $apiKey = env("2FA_SECRET"); // Replace with your actual API key
            $endpoint = "https://2factor.in/API/V1/$apiKey/SMS/:phone_number/:otp/:otp_template_name";

            // Replace placeholders in the endpoint with actual values
            $endpoint = str_replace(':phone_number', $mobile, $endpoint);
            $endpoint = str_replace(':otp', $otp, $endpoint);
            $endpoint = str_replace(':otp_template_name', $otpTemplateName, $endpoint);

            // Send OTP via SMS using cURL
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $endpoint,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
            ));
            $response = curl_exec($curl);
            $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);

            // Check if OTP sending was successful
            if ($response && $http_status == 200) {
                return [
                    'status' => 'success',
                    'message' => 'OTP sent successfully',
                    'data' => [
                        'mobile' => $mobile,
                    ]
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Failed to send OTP',
                    'data' => $response,
                ];
            }
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Failed to send OTP',
                'data' => $e->getMessage(),
            ];
        }
    }

    public function registerWithOTP(Request $request)
    {
        /* Validation */
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'permanent_state' => ['string', 'max:255'],
            'permanent_city' => ['string', 'max:255'],
            'field' => ['required', 'string', 'max:200'],
            'otp' => ['required', 'string', 'max:6'],
        ]);

        $user = User::where('phone', $request->phone)->orWhere('email', $request->email)->first();
        if ($user) {
            response()->json([
                'status' => 'error',
                'message' => 'Phone number or email already exists',
                'data' => []
            ]);
        }

        /* check if the OTP is correct */
        $userOTP = UserOtp::where('user_phone', $request->phone)->where('otp', $request->otp)->first();
        $now = now();

        if (!$userOTP) {
            return response()->json([
                'status' => 'error',
                'message' => 'Your OTP is not correct',
                'data' => []
            ]);
        } else if ($userOTP && $now->isAfter($userOTP->expire_at)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Your OTP has been expired',
                'data' => []
            ]);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        $application = Application::create([
            'user_id' => $user->id,
            'app_no' => time(),
            'permanent_state' => $request->permanent_state,
            'permanent_city' => $request->permanent_city,
            'field' => $request->field,
        ]);

        if ($user && $application) {
            Auth::login($user);
            return response()->json([
                'status' => 'success',
                'message' => 'User registered successfully',
                'data' => [
                    'user' => $user,
                    'application' => $application
                ]
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to register user',
                'data' => []
            ]);
        }
    }
}