<?php
namespace Auth;
class Auth
{
    public  static  function check($data)
    {
        $db = getConnectionDB();
        $sql = "SELECT id,name FROM user WHERE login=:login AND password=:password ;";
        $stm = $db->prepare($sql);

        $stm->bindParam(':login',$data['login']);
        $password = sha1($data['password']);
        $stm->bindParam(':password',$password);

        $stm->execute();

        $user = $stm->fetch();
//
//        if (!empty($user))
//        {
//            return $user;
//        }else
//        {
//            return false;
//        }
        return $user ?? false;
//        dd($data);
    }
}
