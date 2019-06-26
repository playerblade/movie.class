<?php
namespace Person;
class Gender
{
    public static function getAll()
    {
        $genders = [
            [
                'code' => "M",
                'name' => "Man"
            ],
            [
                'code' => "F",
                'name' => "Woman"
            ]
        ];
        return $genders;
    }

    public static function getAllForRadio($code="")
    {
        $genders = self::getAll();

        foreach ($genders as &$gender)
        {
            $gender['checked'] = $gender['code']== $code ? "checked": "";
        }
         return $genders;
    }

    public static function getName($code)
    {
        $genders = self::getAll();
        foreach ($genders as $gender)
        {
            if ($gender['code']==$code)
                return $gender['name'];
        }
    }
}