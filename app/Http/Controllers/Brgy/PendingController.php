<?php

namespace App\Http\Controllers\Brgy;

use App\Http\Controllers\Controller;
use App\Models\Blotter;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::where('id', auth()->user()->id)->first();

        $usersPermissions = $users->getPermissionNames()->first();

        $search = $request->input('search');
        // dd($usersPermissions);
        
        $blotters = Blotter::where('barangay', $usersPermissions)
                            ->where('approval', 'pending')
                            ->where(function($query) use ($search){
                                if(!empty($search)){
                                    $query->where('complainant_firstname', 'like', '%'.$search.'%');
                                    $query->orWhere('complainant_lastname', 'like', '%'.$search.'%');
                                }
                            })->latest()->paginate(5);

        // dd($blotters);
        return view('brgy.pending.index', compact('blotters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        // dd($usersPermissions->first());
        
        //Blotter individual brgy
        $blotter = Blotter::where('barangay', $usersPermissions)
                            ->where('id', $id)->first();
        // dd($blotter->approval);

        // dd($blotBrgy);
        if(!empty($blotter)){
            $blotBrgy = $blotter->barangay;
            $blotApproval = $blotter->approval;
            if($usersPermissions->first() === $blotBrgy && $blotApproval === 'pending'){
                $blotters = Blotter::where('id', $id)->get();
    
                return view('brgy.pending.show', compact('blotters'));
            }
            return abort(404);
        }else{
            return abort(404);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return to_route('brgy.pending.index')->with('error', "Blotter Can't edit.");
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

    //APPROVE BLOTTER
    public function approve(Request $request, $id)
    {
        $blotter = Blotter::where('id', $id)->first();
        $code = $this->generateCaseNumber();
        $blotter['case_number'] = $code;
        $blotter['approval'] = 'approved';
        $blotter->update();
        
        return to_route('brgy.pending.index')->with('message', 'Blotter approved successfully.');
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

        return to_route('brgy.pending.index')->with('message', 'Blotter Updated successfully.');
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
