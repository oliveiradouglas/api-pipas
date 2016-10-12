<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests,
	App\Models\Pipa,
	App\Source\Validacao\PipaValidacao;

class PipaController extends Controller {
    
    public function carregarTodas() {
    	try {
	    	return response()->json([
	    		'status' => true,
	    		'pipas'  => Pipa::all()
	    	]);
    	} catch (\Exception $e) {
    		return response()->json([
    			'status' => false, 
    			'erro'   => 'Erro ao carregar as pipas!'
    		], 500);
    	}
    }

    public function carregar($id) {
    	try {
    		$pipa = Pipa::where('id', $id)->first();
    		if (empty($pipa)) {
    			return response()->json([
	    			'status' => true,
	    			'erro'   => 'Pipa não encontrada!'
	    		], 404);
    		}

    		return response()->json([
    			'status' => true,
    			'pipa'   => $pipa
    		]);
    	} catch (\Exception $e) {
    		return response()->json([
    			'status' => false, 
    			'erro'   => 'Erro ao carregar a pipa!'
    		], 500);
    	}
    }

    public function cadastrar(Request $request) {
    	try {
    		$validacao = PipaValidacao::validarPipaParaSalvar($request->all());
    		if (!$validacao['status']) {
    			return response()->json($validacao);
    		}

    		$pipa = new Pipa($request->all());
            $pipa->save();

            return response()->json([
            	'status' => true,
            	'pipa'   => $pipa
            ], 201);
    	} catch (\Exception $e) {
    		return response()->json([
    			'status' => false,
    			'erro'   => 'Erro ao cadastrar a pipa!'
    		], 500);
    	}
    }

    public function atualizar(Request $request, $id) {
    	try {
    		$validacao = PipaValidacao::validarPipaParaSalvar($request->all());
    		if (!$validacao['status']) {
    			return response()->json($validacao);
    		}

    		$pipa = Pipa::find($id);
    		if (empty($pipa)) {
    			throw new \DomainException('Pipa não encontrada!');
    		}

            $pipa->update($request->all());
            return response()->json([
            	'status' => true,
            	'pipa'   => $pipa
            ]);
    	} catch (\DomainException $ex) {
    		return response()->json([
    			'status' => false,
    			'erro'   => $ex->getMessage()
    		], 404);
    	} catch (\Exception $e) {
    		return response()->json([
    			'status' => false,
    			'erro'   => 'Erro ao atualizar a pipa!'
    		], 500);
    	}	
    }

    public function excluir($id) {
        try {
            Pipa::where('id', $id)->delete();
            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            return response()->json([
            	'status' => true, 
            	'erro'   => 'Erro ao excluir a pipa!'
            ], 500);
        }
    }
}
