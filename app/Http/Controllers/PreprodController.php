<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;

class PreprodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.preprod', [
            'title' => 'Preprod',
            //'users' => User::all(),
        ]);
    }
    public function fetchstudent()
    {
        $students = User::all();
        return response()->json([
            'users'=>$students,
        ]);
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
        $validator = Validator::make($request->all(), [
            'name'=> 'required|max:191',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            //'created_at'=>'required|max:191',
            'email'=>'required|email|max:191',
            'password' => 'required|min:5|max:255',
            //'token'=>'required|max:200',
            //'ct'=>'required|max:19',
           // 'roles'=>'required|max:10',

        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $student = new User;
            $student->name = $request->input('name');
            $student->username = $request->input('username');
            $student->email = $request->input('email');
            $student->password = $request->input('password');
            //$student->created_at = $request->input('created_at');
           // $student->token = $request->input('token');
           // $student->ct = $request->input('ct');
           // $student->roles = $request->input('roles');
            $student->save();
            return response()->json([
                'status'=>200,
                'message'=>'Student Added Successfully.'
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 public function edit($id)
    {
        $student = User::find($id);
        if($student)
        {
            return response()->json([
                'status'=>200,
                'users'=> $student,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Student Found.'
            ]);
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
        $validator = Validator::make($request->all(), [
            'name'=> 'required|max:191',
            'created_at'=>'required|max:191',
            'email'=>'required|email|max:191',
            'token'=>'required|max:200|min:""',
            'ct'=>'required|max:19|min:0',
            'roles'=>'required|max:10|min:',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $student = User::find($id);
            if($student)
            {
                $student->name = $request->input('name');
                $student->email = $request->input('email');
                $student->created_at = $request->input('created_at');
                $student->token = $request->input('token');
                $student->ct = $request->input('ct');
                $student->roles = $request->input('roles');
                $student->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Student Updated Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Student Found.'
                ]);
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = User::find($id);
        if($student)
        {
            $student->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Order Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Order Found.'
            ]);
        }
    }
}
