<?php
namespace Auth;

class Controller
{
    public function login()
    {
        if (!empty($_SESSION['user'])){
            redirect(\Route::link('/'));
        }
        view("./Auth/views/form.php");
    }
    public function check($data)
    {
        // model checking data is are valid
       $user=  Auth::check($data);

       if ($user)
       {
           $_SESSION['user'] = $user;
            //redirect
           redirect(\Route::link('/'));
       }
       else
       {
            // redirect back (login form );
           redirect(\Route::link('/login'));
       }

    }
    public function logout()
    {
        unset($_SESSION['user']);
        redirect(\Route::link('/login'));
    }
}
