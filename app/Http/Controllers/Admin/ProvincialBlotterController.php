<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blotter;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProvincialBlotterController extends Controller
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

        $userRole = $userPermission->getRoleNames()->first();
        $search = $request->input('search');

        // dd($userRole);
        $blotters = Blotter::where('pass_to', 'provincial')
                            ->where('approval', 'passed_to_provincial')
                            ->where(function($query) use ($search){
                                if(!empty($search)){
                                    $query->where('complainant_firstname', 'like', '%'.$search.'%');
                                    $query->orWhere('complainant_lastname', 'like', '%'.$search.'%');
                                }
                            })->latest()->paginate(5);
                            
        return view('admin.provincial.index', compact('blotters'));
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
        $userRole = $users->getRoleNames()->first();

        // dd($userRole);
        //Blotter individual brgy
        $blotter = Blotter::where('pass_to', 'provincial')
                            ->where('id', $id)->get();

        // dd($blotters->user_id);
        foreach($blotter as $blot){
            $blotMunicipal = $blot->pass_to;
            $blotApproval = $blot->approval;
        }
        // dd($blotMunicipal);
        if(!empty($blotMunicipal)){
            if($blotMunicipal === 'provincial' && $blotApproval === 'passed_to_provincial'){
                $blotters = Blotter::where('id', $id)->get();
    
                return view('admin.provincial.show', compact('blotters'));
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
        //
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
        //
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
