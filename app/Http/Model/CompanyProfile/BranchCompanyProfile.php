<?php

namespace App\Http\Model\CompanyProfile;
use Illuminate\Database\Eloquent\Model;

class BranchCompanyProfile extends Model {

    protected $fillable = [
        'branch_name',
        'branch_alias',
        'address_line1',
        'address_line2',
        'address_line3',
        'more_line1',
        'more_line2',
        'country',
        'state',
        'district',
        'pincode',
        'contact_person',
        'mobile',
        'email',
        'department',
    ];

}
