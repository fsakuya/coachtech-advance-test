<?php
namespace App\Providers;

use Faker\Provider\Base;

class Custome extends Base
{
  protected static $formats = [
    '{{fullAddress}}',
];


    public function fullAddress()
    {
        $prefecture = $this->generator->prefecture();
        $city = $this->generator->city;
        $full_address = $prefecture . ' ' . $city;

        return $full_address;
    }
}
