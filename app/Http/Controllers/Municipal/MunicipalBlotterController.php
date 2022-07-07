<?php

namespace App\Http\Controllers\Municipal;

use App\Http\Controllers\Controller;
use App\Models\Blotter;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class MunicipalBlotterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // USER PERMISSION
        $userPermission = User::where('id', auth()->user()->id)->first();

        $usersPermissions = $userPermission->getDirectPermissions()->first();
        $search = $request->input('search');

        // dd($usersPermissions->name);
        $blotters = Blotter::where('municipal', $usersPermissions->name)
                            ->where('approval', 'created_by_municipal')
                            ->where(function($query) use ($search){
                                if(!empty($search)){
                                    $query->where('complainant_firstname', 'like', '%'.$search.'%');
                                    $query->orWhere('complainant_lastname', 'like', '%'.$search.'%');
                                }
                            })->latest()->paginate(5);
                            
        return view('municipal.municipalblotter.index', compact('blotters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // USER PERMISSION
        $brgy = User::where('id', auth()->user()->id)->first();
        $municipalPermission = $brgy->permissions->first();
        // dd($municipalPermission->name);
        $getRole = Role::where('name', $municipalPermission->name)->first();
        $rolePermission = $getRole->permissions;
        // dd($rolePermission->permissions);

        return view('municipal.municipalblotter.create', compact('rolePermission'));
    }

    public function generateCaseNumber() {
        $number = mt_rand(1000000000, 9999999999); // better than rand()
    
        // call the same function if the barcode exists already
        if ($this->caseNumberExists($number)) {
            return generateCaseNumber();
        }
    
        // otherwise, it's valid and can be used
        return $number;
    }
    
    public function caseNumberExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Blotter::where('case_number', $number)->exists();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $usersPermissions = $user->getDirectPermissions()->first();

        // dd($usersPermissions->name);

        $validated = $request->validate([
            'barangay' => ['required'],
            'complainant_firstname' => ['required'],
            'complainant_lastname' => ['required'],
            'complainant_number' => ['required', 'min:11'],
            'complainant_address' => ['required'],
            'respondent_firstname' => ['required'],
            'respondent_lastname' => ['required'],
            'respondent_number' => ['required', 'min:11'],
            'respondent_address' => ['required'],
            'when' => ['required'],
            'where' => ['required'],
            'what' => ['required']
        ]);

        // COMPLAINANT IMG
        if($request->hasFile('complainant_img')){
            $fileName = time().$request->file('complainant_img')->getClientOriginalName();
            $path = $request->file('complainant_img')->storeAs('complainant_images', $fileName, 'public');
            $validated["complainant_img"] = '/storage/'.$path;
        }else{
            $validated["complainant_img"] = '/storage/complainant_images/complainantDefault.jpg';
        }

        // RESPONDENT IMG
        if($request->hasFile('respondent_img')){
            $fileName1 = time().$request->file('respondent_img')->getClientOriginalName();
            $path1 = $request->file('respondent_img')->storeAs('respondent_images', $fileName1, 'public');
            $validated["respondent_img"] = '/storage/'.$path1;
        }else{
            $validated["respondent_img"] = '/storage/respondent_images/respondentDefault.png';
        }
        
        $code = $this->generateCaseNumber();
        $validated['user_id'] = auth()->user()->id;
        $validated['case_number'] = $code;
        $validated['pass_to'] = 'municipal';
        $validated['approval'] = 'created_by_municipal';
        $validated['municipal'] = $usersPermissions->name;

        Blotter::create($validated);

        return to_route('municipal.municipalblotter.index')->with('message', 'Blotter Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Auth User Permission
        $users = User::where('id', auth()->user()->id)->with('permissions')->first();
        foreach ($users->permissions as $user) {
            $userPermissionName = $user->name;
        }
        // dd($userPermissionName);
        //Blotter individual brgy
        $blotter = Blotter::where('municipal', $userPermissionName)
                            ->where('id', $id)->get();

        // dd($blotters->user_id);
        foreach($blotter as $blot){
            $blotMunicipal = $blot->municipal;
            $blotApproval = $blot->approval;
        }
        // dd($blotMunicipal);
        if(!empty($blotMunicipal)){
            if($userPermissionName === $blotMunicipal && $blotApproval === 'created_by_municipal'){
                $blotters = Blotter::where('id', $id)->get();
    
                return view('municipal.municipalblotter.show', compact('blotters'));
            }
            return abort(404);
        }else{
            return abort(404);
        }
    }

    //PASS BLOTTER TO MUNICIPAL
    public function pass(Request $request, $id)
    {
        // GET BLOTTER ID
        $blotter = Blotter::where('id', $id)->first();
        // //GET SPECIFIC MUNICIPAL WITH SAME PERMISSION WITH BRGY
        // $admin = User::role('admin')->permission($blotter->pass_to)->first();

        // // dd($admin->name);
        // // GET admin WITH PERMISSION
        // $users = User::where('id', $admin->id)->with('roles')->first();

        // foreach($users->roles as $role){
        //     $adminRoleName = $role->name;
        // }

        // dd($adminRoleName);

        $blotter['approval'] = 'passed_to_provincial';
        $blotter['pass_to'] = 'provincial';
        $blotter->update();
        
        return to_route('municipal.municipalblotter.index')->with('message', 'Blotter pass to provincial successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return to_route('municipal.municipalblotter.index')->with('error', "Blotter Can't edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blotter = Blotter::where('id', $id)->first();

        $validated = $request->validate([
            'complainant_firstname' => ['required'],
            'complainant_lastname' => ['required'],
            'complainant_number' => ['required', 'min:11'],
            'complainant_address' => ['required'],
            'respondent_firstname' => ['required'],
            'respondent_lastname' => ['required'],
            'respondent_number' => ['required', 'min:11'],
            'respondent_address' => ['required'],
            'when' => ['required'],
            'where' => ['required'],
            'what' => ['required']
        ]);

        $blotter->update($validated);

        return to_route('municipal.municipalblotter.index')->with('message', 'Blotter Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
