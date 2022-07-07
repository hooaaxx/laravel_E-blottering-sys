<?php

namespace App\Http\Controllers\Brgy;

use App\Http\Controllers\Controller;
use App\Models\Blotter;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class ApprovedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::where('id', auth()->user()->id)->first();

        $usersPermissions = $users->getPermissionNames();
        $search = $request->input('search');

        $blotters = Blotter::where('barangay', $usersPermissions)
                            ->where('approval', 'approved')
                            ->where(function($query) use ($search){
                                if(!empty($search)){
                                    $query->where('complainant_firstname', 'like', '%'.$search.'%');
                                    $query->orWhere('complainant_lastname', 'like', '%'.$search.'%');
                                }
                            })->latest()->paginate(5);
        return view('brgy.approved.index', compact('blotters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brgy.approved.create');
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
        $municipalRole = User::role('municipal')->permission($usersPermissions->name)->first();

        $municipalName = $municipalRole->getDirectPermissions()->first()->name;
        // dd($municipalName);

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
        $validated['pass_to'] = 'brgy';
        $validated['approval'] = 'approved';
        $validated['municipal'] = $municipalName;
        $validated['barangay'] = $usersPermissions->name;

        Blotter::create($validated);

        return to_route('brgy.approved.index')->with('message', 'Blotter Created successfully.');
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
        $users = User::where('id', auth()->user()->id)->first();
        $usersPermissions = $users->getPermissionNames();
        
        //Blotter individual brgy
        $blotter = Blotter::where('barangay', $usersPermissions)
                            ->where('id', $id)->first();

        // dd($blotters->user_id);
        // dd($blotBrgy);
        if(!empty($blotter)){
            $blotBrgy = $blotter->barangay;
            $blotApproval = $blotter->approval;
            if($usersPermissions->first() === $blotBrgy && $blotApproval === 'approved'){
                $blotters = Blotter::where('id', $id)->get();
    
                return view('brgy.approved.show', compact('blotters'));
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
        
        $blotter['approval'] = 'passed';
        $blotter['pass_to'] = 'municipal';
        $blotter->update();
        
        return to_route('brgy.approved.index')->with('message', 'Blotter pass to municipal successfully.');
    }

    //CLOSE BLOTTER
    public function close(Request $request, $id)
    {
        $blotter = Blotter::where('id', $id)->first();

        // dd($blotter);
        $blotter['approval'] = 'closed';
        $blotter->update();
        
        return to_route('brgy.approved.index')->with('message', 'Blotter closed successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Auth User Permission
        $users = User::where('id', auth()->user()->id)->first();
        $usersPermissions = $users->getPermissionNames();
        
        //Blotter individual brgy
        $blotter = Blotter::where('barangay', $usersPermissions)
                            ->where('id', $id)->first();

        // dd($blotters->user_id);

        if(!empty($blotter)){
            $blotBrgy = $blotter->barangay;
            $blotApproval = $blotter->approval;
            if($usersPermissions->first() === $blotBrgy && $blotApproval === 'approved'){
                $blotter = Blotter::where('id', $id)->first();

                return view('brgy.approved.edit', compact('blotter'));
            }

            return abort(404);

        }else{
            return abort(404);
        }
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

        return to_route('brgy.approved.index')->with('message', 'Blotter Updated successfully.');
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
