<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventReg;
use Auth;
use DB;
use Intervention\Image\Facades\Image as Image;

class EventController extends Controller
{
    public function pbcevent()
    {
        return view('pbcEventRegView');
    }
    public function pbceventreg(Request $request)
    {
        // dd($request->all());
        $rules = [
            'teamName' => 'unique:event_regs,teamName',
            'phone' => 'required|min:8|max:12',
        ];
        $customMessages = [
            'teamName.required' => 'The :attribute is Already Taken.',
            // 'p1image.required' => 'The :attribute is Required.',
            'p1image.required' => 'The :attribute is Required.',
            'p2image.required' => 'The :attribute is Required.'
        ];
        $this->validate($request, $rules, $customMessages);

        $EventReg = new EventReg;

        $EventReg->teamName = $request->teamName;
        $EventReg->teamManagerName = $request->teamManagerName;
        $EventReg->phone = (int)$request->phone;

        $EventReg->p1name = $request->p1name;
        $EventReg->p1nid = (int)$request->p1nid;
        $EventReg->p1dob = $request->p1dob;
        $EventReg->p1city = $request->p1city;
        $EventReg->p1district = $request->p1district;
        $EventReg->p1post = $request->p1post;
        $EventReg->p1village = $request->p1village;

        $p1image = $request->file('p1image');

            $filename1 = time().'-'.$p1image->getClientOriginalName();
            $path = public_path('system_img/' . $filename1);
            Image::make($p1image->getRealPath())->resize(230, 275)->save($path);

            $EventReg->p1image =$filename1;
            

        $EventReg->p2name = $request->p2name;
        $EventReg->p2nid =  (int)$request->p2nid;
        $EventReg->p2dob = $request->p2dob;
        $EventReg->p2city = $request->p2city;
        $EventReg->p2district = $request->p2district;
        $EventReg->p2post = $request->p2post;
        $EventReg->p2village = $request->p2village;

        $p2image = $request->file('p2image');

            $filename2 = time().'-'.$p2image->getClientOriginalName();
            $path = public_path('system_img/' . $filename2);
            Image::make($p2image->getRealPath())->resize(230, 275)->save($path);

            $EventReg->p2image =$filename2;

        $EventReg->teamLocation = $request->teamLocation;
        $EventReg->category = $request->category;
        $EventReg->save();
        if ($EventReg) {
            return back()->with('message','TEAM has been successfully Registration.');
        } else {
            return back()->with('message','Registration Failed !!!!.');
        }
    }

    public function eventDataView()
    {
        
        $EventDatas = EventReg::all(['id','teamName','teamManagerName','phone','teamLocation','category']);
        // dd($EventDatas);
        if(request()->ajax())
        {
            return datatables()->of($EventDatas)

                    ->addColumn('action', function($data){
                        $button = '<div class="d-flex justify-content-center"><button type="button" onclick="viewDetails('.$data->id.')" name="edit" id="'.$data->id.'" class="edit btn btn-sm d-flex justify-content-center" data-toggle="modal" data-target="#viewDataModal" data-placement="top" title="Details View"><i class="fa fa-eye" style="color: aqua"> Details</i></button>';
                        $button .= '<button type="button" onclick="deleteModal('.$data->id.',\''.$data->teamName.'\')" name="delete" id="'.$data->id.'" class="delete btn btn-sm" data-toggle="modal" data-target="#DeleteConfirmationModal" data-placement="top" title="Delete"  style="color: red"><i class="fa fa-trash"> Delete</i></button></div>';
                        
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.eventView.eventSettings');
    }

    public function viewSingleData($id)
    {
        $team = EventReg::find($id);
        return response()->json($team);
    }
    
    public function deleteTeam($id)
    {
        
        $team = EventReg::find($id);

        $p1image=$team->p1image;

        if($p1image!=null){
            $path = public_path() . "/system_img/" . $p1image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $p2image=$team->p2image;
        if($p2image!=null){
            $path = public_path() . "/system_img/" . $p2image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        if ($team) {
            $team->delete();
            return response()->json(['success' => 'Team Delete Successfully....!!!']);
        } else {
            return response()->json(['failed' => 'Team Delete failed.']);
        }

    }
}
