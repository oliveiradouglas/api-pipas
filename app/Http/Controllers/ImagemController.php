<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;

class ImagemController extends Controller {
    public function upload(Request $request) {
    	$validacao = Validator::make(
			$request->all(), 
			['foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']
		);

		if ($validacao->fails()) {
			return response()->json([
				'status' => false,
				'erro'   => implode('<br />', $validacao->getMessageBag()->messages()['foto'])
			]);
		}

        $nomeImagem = time().'.'.$request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('img'), $nomeImagem);

        return response()->json(['status' => true, 'foto' => $nomeImagem]);
    }
}
