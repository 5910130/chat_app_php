<?php

namespace App\Http\Controllers\CompanyProfile;

use App\Http\Controllers\Controller;
use App\Http\Model\CompanyProfile\BranchCompanyProfile;
use Illuminate\Http\Request;
use Session;
use View;
use Redirect;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class BranchCompanyProfileController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $branchcompanyprofiles = BranchCompanyProfile::all();
        return view('companyprofile.branch.index', compact('branchcompanyprofiles'));
    }

    public function create() {
        
    }

   public function store(Request $request) {
        $branchcompanyprofile = new BranchCompanyProfile([
            'branch_name' => $request->get('name'),
            'branch_alias' => $request->get('alias'),
            'address_line1' => $request->get('address_line1'),
            'address_line2' => $request->get('address_line2'),
            'address_line3' => $request->get('address_line3'),
            'more_line1' => $request->get('more_line1'),
            'more_line2' => $request->get('more_line2'),
            'country' => $request->get('country'),
            'state' => $request->get('state'),
            'district' => $request->get('district'),
            'pincode' => $request->get('pincode'),
            'contact_person' => $request->get('contact_person'),
            'mobile' => $request->get('mobile'),
            'email' => $request->get('email'),
            'department' => $request->get('department')
        ]);
        $branchcompanyprofile->save();
        return redirect('/branchcompanyprofiles')->with('success', 'Successfully inserted !');
    }

    public function destroy($id) {
        $branchcompany = BranchCompanyProfile::destroy($id);
        return redirect('/branchcompanyprofiles')->with('success', 'Successfully Deleted !');
    }

    public function edit($id) {
        $branchcompanyprofile = BranchCompanyProfile::find($id);
        return $branchcompanyprofile;
    }

    function update($id) {
        $branchcompanyprofile = BranchCompanyProfile::find($id);
        $branchcompanyprofile->branch_name = request('name');
        $branchcompanyprofile->branch_alias = request('alias');
        $branchcompanyprofile->address_line1 = request('address_line1');
        $branchcompanyprofile->address_line2 = request('address_line2');
        $branchcompanyprofile->address_line3 = request('address_line3');
        $branchcompanyprofile->more_line1 = request('more_line1');
        $branchcompanyprofile->more_line2 = request('more_line2');
        $branchcompanyprofile->country = request('country');
        $branchcompanyprofile->state = request('state');
        $branchcompanyprofile->district = request('district');
        $branchcompanyprofile->pincode = request('pincode');
        $branchcompanyprofile->contact_person = request('contact_person');
        $branchcompanyprofile->mobile = request('mobile');
        $branchcompanyprofile->email = request('email');
        $branchcompanyprofile->department = request('department');

        $branchcompanyprofile->update();
        return redirect('/branchcompanyprofiles')->with('success', 'Successfully Updated !');
    }
}
