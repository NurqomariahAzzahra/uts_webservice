<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hanime;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class ApianimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anime = Hanime::paginate(5);
        return response()->json($anime);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate ([
            'judul_anime' => 'required',
            'jumlah_episode' => 'required',
            'season' => 'required',
            'id_autor' => 'required',
            'nama_autor' => 'required',
            'studio' => 'required',
        ]);
        try {
            Hanime::create($validator);
            return response()->json(['status' => 'data berhasil di tambah'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'data' => $e->getMessage()], 200);
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
        $validator = $request->validate ([
            'judul_anime' => 'required',
            'jumlah_episode' => 'required',
            'season' => 'required',
            'id_autor' => 'required',
            'nama_autor' => 'required',
            'studio' => 'required',
        ]);
        try{
            $response = Hanime::find($id);
            $response->update($validator);
            return response()->json([
                'success' => true,
                'message' => 'data berhasil di update',
                'data' => $response
            ]);
        } catch(\Exception $e){
            return response()->json([
                'message' => 'Error',
                'errors' => $e->getMessage()
            ],422);
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
        try{
            $response = Hanime::find($id);
            $response->delete();
            return response()->json([
                'success' => true,
                'message' => 'data berhasil dihapus',
                'data' => $response
            ]);
        } catch(\Exception $e){
            return response()->json([
                'message' => 'Error',
                'errors' => $e->getMessage()
            ],422);
        }
          
    
    }
    public function login(Request $request){
        
        $user = User::where('email',$request->email)->first();
        if (! $user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'message'=>'Unauthorized',
            ],401);
        }
        $token=$user->createToken('token-name')->plainTextToken;
        return response()->json([
            
            'message'=>'success',
            'user'=>$user,
            'token'=>$token
        ],200);
    }
}
