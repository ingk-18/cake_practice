<?php

namespace App\Lib;

class Messages{
	static protected $MESSAGES = [
		1 => '理想のライフスタイルをかいてみましょう。',
		2 => '仕事の目標をかいてみましょう。',
		3 => '趣味の目標をかいてみましょう。',
		4 => '人間関係の目標をかいてみましょう。',
	];

	static public function get( $id, $params = [] ){
		return vsprintf( static::$MESSAGES[$id] ?? '', (array)$params);
	}
}