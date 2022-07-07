<?php

namespace App\Http\Controllers\Municipal;

use App\Http\Controllers\Controller;
use App\Models\Blotter;
use App\Models\User;
use Illuminate\Http\Request;

class BrgyBlotterController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::where('id', auth()->user()->id)->first();

        $usersPermissions = $users->getDirectPermissions()->first();
        $search = $request->input('search');
        
        // dd($usersPermissions->name);
        $blotters = Blotter::where('approval', 'passed')
                            ->where('municipal', $usersPermissions->name)
                            ->where(function($query) use ($search){
                                if(!empty($search)){
                                    $query->where('complainant_firstname', 'like', '%'.$search.'%');
                                    $query->orWhere('complainant_lastname', 'like', '%'.$search.'%');
                                }
                            })->latest()->paginate(5);
                            
        return view('municipal.brgyblotter.index', compact('blotters'));
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
        $users = User::where('id', auth()->user()->id)->with('permissions')->first();
        foreach ($users->permissions as $user) {
            $userPermissionName = $user->name;
        }
        
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
            if($userPermissionName === $blotMunicipal && $blotApproval === 'passed'){
                $blotters = Blotter::where('id', $id)->get();
    
                return view('municipal.brgyblotter.show', compact('blotters'));
            }
            return abort(404);
        }else{
            return abort(404);
        }
    }

    //PASS BLOTTER TO MUNICIPAL
    public function pass(Request $request, $id)
    {
        // // GET BLOTTER ID
        $blotter = Blotter::where('id', $id)->first();
        // //GET SPECIFIC MUNICIPAL WITH SAME PERMISSION WITH BRGY
        // $admin = User::role('admin')->permission($blotter->pass_to)->first();
        // // GET admin WITH PERMISSION
        // $users = User::where('id', $admin->id)->with('roles')->first();

        // foreach($users->roles as $role){
        //     $adminRoleName = $role->name;
        // }

        // dd($adminRoleName);

        $blotter['approval'] = 'passed_to_provincial';
        $blotter['pass_to'] = 'provincial';
        $blotter->update();
        
        return to_route('municipal.brgyblotter.index')->with('message', 'Blotter pass to provincial successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return to_route('municipal.brgyblotter.index')->with('error', "Blotter Can't edit");
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

        return to_route('municipal.brgyblotter.index')->with('message', 'Blotter Updated successfully.');
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
