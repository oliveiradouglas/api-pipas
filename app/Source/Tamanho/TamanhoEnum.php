<?php

namespace App\Source\Tamanho;

class TamanhoEnum {
	const PEQUENO = 'pequeno';
	const MEDIO   = 'médio';
	const GRANDE  = 'grande';

	public static function getTamanhos() {
		$oClass = new \ReflectionClass(__CLASS__);
        return $oClass->getConstants();
	}
}