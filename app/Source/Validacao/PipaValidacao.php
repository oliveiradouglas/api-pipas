<?php

namespace App\Source\Validacao;

use Validator;
use App\Source\Tamanho\TamanhoEnum;

class PipaValidacao {
	public static function validarPipaParaSalvar(array $inputs) {
   		$validacao = Validator::make(
			$inputs, 
			self::getRegrasValidacao()
		);

		if ($validacao->fails()) {
			return [
				'status' => false,
				'erro'   => self::formatarMensagensErro($validacao->getMessageBag()->messages())
			];
		}

		return ['status' => true];
    }

    public static function formatarMensagensErro(array $erros) {
    	$mensagensErro = '';
		
		foreach ($erros as $erro) {
			$mensagensErro .= implode('<br />', $erro) . '<br />';
		}

		return $mensagensErro;
    }

    public static function getRegrasValidacao() {
    	return [
            'cor'     => 'required|max:50',
            'tamanho' => 'required|in:' . implode(',', TamanhoEnum::getTamanhos()),
            'preco'   => 'required|numeric',
        ];
    }
}