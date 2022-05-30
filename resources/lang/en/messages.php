<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Messages - general and sections
    |--------------------------------------------------------------------------
    |
    | The following language lines are the default lines which match reasons
    | that are given by the password broker for a password update attempt
    | has failed, such as for an invalid token or invalid new password.
    |
    */
    'app_name' => "Simple Book App",
    'register' => [
        'signUp' => "Sign Up!",
        'enterInfo' => "Enter your information below",
        'fullName' => "Full Name",
        'yourName' => "Your Name",
        'email' => "E-Mail",
        'password' => "Password",
        'reEnterPassword' => "Re-enter Password",
        'confirm' => "Confirm",
        'register' => "Register",
        'receiveNotifications' => "Receive notifications",
        'role' => [
            'role' => "Role",
            'author' => "Author",
            'reader' => "Reader"
        ]
    ],
    'login' => [
        'login' => "Login",
        'welcomeBack' => "Welcome Back",
        'enterCredentials' => "Enter your credentials to log in",
        'email' => "E-mail",
        'password' => "Password",
        'rememberMe' => "Remember Me",
        'forgotYourPassword' => "Forgot Your Password?"
    ],
    'verify' => [
        'verifyEmailAddress' => "Verify Your Email Address",
        'verificationLink' => "A fresh verification link has been sent to your email address.",
        'checkForVerificationLink' => "Before proceeding, please check your email for a verification link.",
        'ifEmailNotReceived' => "If you did not receive the email",
        'clickForAnother' => "click here to request another"
    ],
    'reset' => [
        'resetPassword' => "Reset Password",
        'emailAddress' => "E-Mail Address",
        'password' => "Password",
        'confirmPassword' => "Confirm Password"
    ],
    'email' => [
        'ohNo' => "Oh no!",
        'enterEmailToResetPassword' => "Enter your email to reset password",
        'email' => "E-mail",
        'sendResetEmail' => "Send Reset Email"
    ],
    'vue' => [
    ],
    'imageController' => [
        'noSuchFile' => "Such file ':name' doesn't exist!",
        'readerCantUpload' => "Readers can't upload images for books!",
        'uploadFile' => "Please upload file!"
    ],
    'authorRule' => [
        'validation' => "Passed value has to be a valid Author ID. And to act as logged in User"
    ]
];
