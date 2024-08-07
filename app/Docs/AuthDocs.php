<?php

namespace App\Docs;

class AuthDocs
{

    /**
     * @OA\Post(
     *     path="/api/v1/client/register",
     *     operationId="Register",
     *     tags={"Authentication"},
     *     summary="User Register",
     *     description="User Register here",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"phone", "password", "password_confirmation", "first_name", "last_name", "type"},
     *                 @OA\Property(property="phone", type="string", example="+201234567890"),
     *                 @OA\Property(property="password", type="string"),
     *                 @OA\Property(property="password_confirmation", type="string"),
     *                 @OA\Property(property="first_name", type="string"),
     *                 @OA\Property(property="last_name", type="string"),
     *                 @OA\Property(property="type", type="string", enum={"user", "coach"}),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Register Successfully",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     * )
     */
    public function register(){}

    /**
     * @OA\Post(
     *     path="/api/v1/client/login",
     *     operationId="Login",
     *     tags={"Authentication"},
     *     summary="User Login",
     *     description="Authenticate user and provide API token",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"phone", "password"},
     *                 @OA\Property(property="phone", type="string"),
     *                 @OA\Property(property="password", type="string"),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Login Successful",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="token", type="string", description="API Token")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", description="Unauthorized")
     *         )
     *     )
     * )
     */
    public function login(){
    }

    /**
     * @OA\Post(
 *     path="/api/v1/client/logout",
 *     operationId="Logout",
 *     tags={"Authentication"},
 *     summary="User Logout",
 *     description="Revoke the user's API token to log them out",
 *     security={{ "sanctum": {} }},
 *     @OA\Response(
 *         response=200,
 *         description="Logout Successful",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="message", type="string", description="Logged out"),
 *             @OA\Property(property="data", type="object")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", description="Unauthorized")
 *         )
 *     )
 * )
     */

    public function logout(){}


    /**
     * @OA\Post(
     *     path="/api/v1/client/verify-phone",
     *     operationId="verify-phone",
     *     tags={"Authentication"},
     *     summary="Verify phone",
     *     description="Verify-phone and provide new API token",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"phone", "code"},
     *                 @OA\Property(property="phone", type="string", example="+201234567890"),
     *                 @OA\Property(property="code", type="string"),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Phone number verified successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="token", type="string", description="API Token")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", description="An error occurred, please try again. Token mismatch")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Email Not Found",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", description="Incorrect phone")
     *         )
     *     )
     * )
     */

    function verifyPhoneNumber(){}

    /**
     * @OA\Post(
     *     path="/api/v1/client/reset-verification-code",
     *     operationId="ResetVerificationCode",
     *     tags={"Authentication"},
     *     summary="Reset Verification Code",
     *     description="Reset user's verification code and send a new one via SMS",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="phone", type="string", example="+201234567890"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Verification Code Reset Successful",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", description="An error occurred, please try again. Invalid phone or verification code")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Phone Not Found",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", description="Incorrect phone")
     *         )
     *     ),
     * )
     */

    function resetVerificationCode(){}
    /**
 * @OA\Post(
 *     path="/api/v1/client/forget-password",
 *     operationId="ForgetPassword",
 *     tags={"Authentication"},
 *     summary="Request Password Reset",
 *     description="Send a password reset code to the user's email",
 *     @OA\RequestBody(
 *         @OA\JsonContent(),
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 type="object",
 *                 required={"phone"},
 *                 @OA\Property(property="phone", type="string", example="+201234567890"),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Password Reset Token Sent",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="message", type="string", description="Password reset code sent successfully"),
 *             @OA\Property(property="data", type="object")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Email Not Found",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", description="Incorrect phone")
 *         )
 *     )
 * )
 */


    function forgetPassword() {}

    /**
 * @OA\Post(
 *     path="/api/v1/client/reset-password",
 *     operationId="ResetPassword",
 *     tags={"Authentication"},
 *     summary="Reset Password",
 *     description="Reset user's password and provide new API token",
 *     @OA\RequestBody(
 *         @OA\JsonContent(),
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 type="object",
 *                 required={"phone", "code"},
 *                 @OA\Property(property="phone", type="string", example="+201234567890"),
 *                 @OA\Property(property="code", type="string"),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Password Reset Successful",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="token", type="string", description="API Token")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Bad Request",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", description="An error occurred, please try again. Token mismatch")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Email Not Found",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", description="Incorrect phone")
 *         )
 *     )
 * )
 */

    function resetPassword(){}

    /**
 * @OA\Post(
 *     path="/api/v1/client/change-password",
 *     operationId="ChangePassword",
 *     tags={"Users"},
 *     summary="Change Password",
 *     description="Change user's password",
 *     security={
 *         {"sanctum": {}}
 *     },
 *     @OA\RequestBody(
 *         @OA\JsonContent(),
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 type="object",
 *                 required={"password", "password_confirmation"},
 *                 @OA\Property(property="password", type="string"),
 *                 @OA\Property(property="password_confirmation", type="string"),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Password Changed Successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="data", type="object")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", description="Unauthorized")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Unprocessable Entity",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", description="Validation errors"),
 *             @OA\Property(property="errors", type="object")
 *         )
 *     )
 * )
 */

    public function changePassword(){}



}
