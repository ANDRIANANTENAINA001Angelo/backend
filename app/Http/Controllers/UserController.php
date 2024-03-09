<?php

namespace App\Http\Controllers;

use App\ApiResponse;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(private ApiResponse $response) {
        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->response->success(
            User::all(),"La liste de tous les utilisateur a été bien retourné"
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(UserRequest $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        /** @var User $userCreated description */
        $userCreted = User::create($request->validated());
        // $token= $userCreated->createToken("token");

        return $this->response->success(
            $userCreted,"Utilisateur créé avec succèss!",201
        );        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $this->response->success($user,"L'utilisateur a été bien retourné!");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserRequest $request, User $user)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        return $this->response->success($user,"Mise à jour utilisateur succèss!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Revoke all tokens...
        $user->tokens()->delete();
        
        $user->delete();
        return $this->response->success($user,"Utilisateur est supprimer avec succèss!");
    }



    public function niveauFilter(){
        $user= Auth::getUser();
        return $user;
        // dd($niveau);
        // dd($result= User::where("niveau","=",$niveau));
        // // return response()->json(["data"=> User::where("niveau","=",$niveau)->get() ]);
        // return $niveau;
        // return $result;
    }
    
    public function getNiveau(){
        $user= Auth::user();
        return $user->niveau;
    }
}
