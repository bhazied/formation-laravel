<?php
/**
 * Created by PhpStorm.
 * User: dev03
 * Date: 20/05/17
 * Time: 17:20
 */

namespace App;


class Test implements TestInterface
{

    public function getValue()
    {
        return "this is a good value";
    }
}