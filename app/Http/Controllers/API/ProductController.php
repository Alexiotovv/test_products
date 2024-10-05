<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    //
    public function get(){
        try { 
            $data = Product::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function create(Request $request){
        
        
        try {

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255', 
                'price' => 'required|numeric',
                'stock' => 'required|integer|between:1,100000', 
            ]);

            $res = Product::create($validated);
            return response()->json( $res, 200);
        } catch (ValidationException $e) {
            return response()->json(['status' => 'error', 'message' => 'Error de validación', 'errors' => $e->errors()], 422);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function getById($id){
        try { 
            $data = Product::find($id);
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function update(Request $request,$id){
        try { 

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255', 
                'price' => 'required|numeric',
                'stock' => 'required|integer|between:1,100000', 
            ]);

            Product::find($id)->update($validated);
            $res = Product::find($id);
            return response()->json( $res , 200);
        } catch (ValidationException $e) {
            return response()->json(['status' => 'error', 'message' => 'Error de validación', 'errors' => $e->errors()], 422);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function delete($id){
        try {       
            $res = Product::find($id)->delete(); 
            return response()->json([ "deleted" => $res ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
}
