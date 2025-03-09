<?php
global $page;
/*
$target - одномерный массив ассоциативный
$fields - обычный, содержит список строк
$t =[a=>1,b=>2,.....c=>20,d=>40]
$f = [a,c]
*/
function extractFields(array $target, array $fields): array
{
	$res = [];

	foreach ($fields as $field) {
		$res[$field] = trim($target[$field]);
	}
	return $res;
}

