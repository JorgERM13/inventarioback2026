<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //SQL
        // $roles=DB::select("select * from roles");
        // return response()->json($roles);
      
        // Query Builder
        // $roles=DB::table("roles")->get();
        // return response()->json($roles);

        // Eloquent ORM

        $roles=Role::get();
        return response()->json($roles);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombre"=> "required"
        ]);

        DB::table("roles")->insert([
            "nombre"=>$request->nombre,
            "detalle"=>$request->detalle,
        ]);
        return response()->json(["mensaje"=>"Role registrado"],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role=DB::table("roles")->where("id",$id)->first();
        return response()->json($role,200); 
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table("roles")->where("id",$id)->update([
            "nombre"=>$request->nombre,
            "detalle"=>$request->detalle,
        ]);
        return response()->json(["mensaje"=>"Role Actualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
