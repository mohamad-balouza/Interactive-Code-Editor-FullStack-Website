<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use App\Models\Code;
use App\Models\Favorite;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function getCodes($id){
        $code=Code::where('id',$id)->get();
        return response()->json([
            'code'=> $code
        ]);
    }

    public function insertCode(Request $request) {
        $name = $request->name;
        $content = $request->content;
        $user_id = $request->user_id;
    
        $snippet = Code::where('user_id', $user_id)->where('name', $name);
    
        if ($snippet->count()>0) {
            $snippet->content = $content;
            $snippet->save();
    
            return response()->json([
                'status' => 'Snippet Updated'
            ]);
        } else {
            $newSnippet = Code::create([
                'name' => $name,
                'content' => $content,
                'user_id' => $user_id,
            ]);
    
            return response()->json([
                'status' => 'Snippet Created'
            ]);
        }
    }
    

    public function saveCode(Request $request){
        $code_id=$request->code_id;
        $user_id=$request->user_id;

        $save=Favorite::create([
            'code_id'=>$code_id,
            'user_id'=>$user_id,
        ]);
        
        return response()->json([
            'status'=>'Saved'
        ]);
    }

    public function getSavedCodes($id){
        $favorites = Favorite::join("codes", "favorites.code_id", "=", "codes.id")
                            ->join("users", "codes.user_id", "=", "users.id")
                            ->select("favorites.*", "codes.name", "codes.content", "users.username", "users.profile_picture")
                            ->where("favorites.user_id",$id)
                            ->get();
        return response()->json([
            'favorites'=> $favorites
        ]);
    }
    
}
