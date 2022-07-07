<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blotter;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // ADMIN INDEX

    public function index()
    {
        //ALL MONTHLY REPORT
        $monthly = Blotter::select(Blotter::raw("(COUNT(*)) as count"),
                            Blotter::raw("DATE_FORMAT(created_at, '%M %Y') as monthname"))
                            ->whereYear('created_at', date('Y'))
                            ->groupBy('monthname')
                            ->orderBy('monthname', 'DESC')
                            ->get();
        
        //ALL YEARLY REPORT
        $yearly = Blotter::select(Blotter::raw("(COUNT(*)) as count"),Blotter::raw("YEAR(created_at) as year"))
                        ->groupBy('year')
                        ->get();

        //PROVINCIAL MONTHLY REPORT
        $provincial_monthly = Blotter::select(Blotter::raw("(COUNT(*)) as count"),
                            Blotter::raw("DATE_FORMAT(created_at, '%M %Y') as monthname"))
                            ->where('pass_to', 'provincial')
                            ->whereYear('created_at', date('Y'))
                            ->groupBy('monthname')
                            ->orderBy('monthname', 'DESC')
                            ->get();
        
        //PROVINCIAL YEARLY REPORT
        $provincial_yearly = Blotter::select(Blotter::raw("(COUNT(*)) as count"),Blotter::raw("YEAR(created_at) as year"))
                        ->where('pass_to', 'provincial')
                        ->groupBy('year')
                        ->get();
        
        //MUNICIPAL MONTHLY REPORT
        $municipal_monthly = Blotter::select(Blotter::raw("(COUNT(*)) as count"),
                            Blotter::raw("DATE_FORMAT(created_at, '%M %Y') as monthname"))
                            ->where('pass_to', 'municipal')
                            ->whereYear('created_at', date('Y'))
                            ->groupBy('monthname')
                            ->orderBy('monthname', 'DESC')
                            ->get();
        
        //MUNICIPAL YEARLY REPORT
        $municipal_yearly = Blotter::select(Blotter::raw("(COUNT(*)) as count"),Blotter::raw("YEAR(created_at) as year"))
                        ->where('pass_to', 'municipal')
                        ->groupBy('year')
                        ->get();

        //BARANGAY MONTHLY REPORT
        $brgy_monthly = Blotter::select(Blotter::raw("(COUNT(*)) as count"),
                            Blotter::raw("DATE_FORMAT(created_at, '%M %Y') as monthname"))
                            ->where('pass_to', 'brgy')
                            ->whereYear('created_at', date('Y'))
                            ->groupBy('monthname')
                            ->orderBy('monthname', 'DESC')
                            ->get();
        
        //BARANGAY YEARLY REPORT
        $brgy_yearly = Blotter::select(Blotter::raw("(COUNT(*)) as count"),Blotter::raw("YEAR(created_at) as year"))
                        ->where('pass_to', 'brgy')
                        ->groupBy('year')
                        ->get();
        // return $count;
        return view('admin.index', compact(
                                    'monthly',
                                    'yearly',
                                    'provincial_monthly',
                                    'provincial_yearly',
                                    'municipal_monthly',
                                    'municipal_yearly',
                                    'brgy_monthly',
                                    'brgy_yearly'
                                ));
    }

    // BRGY INDEX

    public function BrgyIndex()
    {
        $users = User::where('id', auth()->user()->id)->first();

        $usersPermissions = $users->getDirectPermissions()->first();

        // dd($usersPermissions->name);
        $blotters = Blotter::where('barangay', $usersPermissions->name)->paginate(5);
        
        $permissionName = $users->getDirectPermissions()->first();
        // dd($permissionName->name);

        //ALL MONTHLY REPORT
        $monthly = Blotter::select(Blotter::raw("(COUNT(*)) as count"),
                            Blotter::raw("DATE_FORMAT(created_at, '%M %Y') as monthname"))
                            ->where('barangay', $permissionName->name)
                            ->whereYear('created_at', date('Y'))
                            ->groupBy('monthname')
                            ->orderBy('monthname', 'DESC')
                            ->get();

        // dd($monthly->monthname);
        
        //ALL YEARLY REPORT
        $yearly = Blotter::select(Blotter::raw("(COUNT(*)) as count"),Blotter::raw("YEAR(created_at) as year"))
                        ->where('barangay', $permissionName->name)
                        ->groupBy('year')
                        ->get();

        
        return view('brgy.index', compact('blotters', 'monthly', 'yearly', 'permissionName'));
    }

    // MUNICIPAL INDEX

    public function MunicipalIndex()
    {
        $users = User::where('id', auth()->user()->id)->first();
        $permissionName = $users->getDirectPermissions()->first();
        // dd($permissionName->name);

        $blotters = Blotter::where('municipal', $permissionName->name)->paginate(5);

        // dd($blotters);

        //ALL MONTHLY REPORT
        $monthly = Blotter::select(Blotter::raw("(COUNT(*)) as count"),
                            Blotter::raw("DATE_FORMAT(created_at, '%M %Y') as monthname"))
                            ->where('municipal', $permissionName->name)
                            ->whereYear('created_at', date('Y'))
                            ->groupBy('monthname')
                            ->orderBy('monthname', 'DESC')
                            ->get();

        // dd($monthly->monthname);
        
        //ALL YEARLY REPORT
        $yearly = Blotter::select(Blotter::raw("(COUNT(*)) as count"),Blotter::raw("YEAR(created_at) as year"))
                        ->where('municipal', $permissionName->name)
                        ->groupBy('year')
                        ->get();

        return view('municipal.index', compact('blotters', 'monthly', 'yearly', 'permissionName'));
    }
}
