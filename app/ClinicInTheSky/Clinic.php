<?php
/**
 * Created by PhpStorm.
 * User: VijayDaniel
 * Date: 9/14/14
 * Time: 7:43 AM
 */

namespace ClinicInTheSky;


use LaravelBook\Ardent\Ardent;

class Clinic extends Ardent implements Addressable {

    protected $table = 'clinics';

    protected $guarded = ['id', 'addressable_id', 'addressable_type'];

    public static $rules = [
        'name' => 'required|between:2,256'
    ];

    public static $relationsData = [
        'address' => [self::MORPH_ONE, 'ClinicInTheSky\Address', 'name' => 'addressable']
    ];

    public function address() {
        // TODO: Implement address() method.
    }
}