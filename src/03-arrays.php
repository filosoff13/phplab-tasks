<?php
/**
 * The $input variable contains an array of digits
 * Return an array which will contain the same digits but repetitive by its value
 * without changing the order.
 * Example: [1,3,2] => [1,3,3,3,2,2]
 *
 * @param  array  $input
 * @return array
 */
function repeatArrayValues(array $input)
{
    $count = count($input);
    $arr = [];
    for ($i = 0; $i < $count; $i++){
       switch ($input[$i]){
           case 1:
               array_push($arr, 1);
               break;
           case 2:
               array_push($arr, 2, 2);
               break;
           case 3:
               array_push($arr, 3, 3, 3);
               break;
           case 4:
               array_push($arr, 4, 4, 4, 4);
               break;
           case 5:
               array_push($arr, 5,5,5,5,5);
               break;
           case 6:
               array_push($arr, 6,6,6,6,6,6);
               break;
           case 7:
               array_push($arr, 7,7,7,7,7,7,7);
               break;
           case 8:
               array_push($arr, 8,8,8,8,8,8,8,8);
               break;
           case 9:
               array_push($arr, 9,9,9,9,9,9,9,9,9);
               break;
       }
    }
    return $arr;
}

/**
 * The $input variable contains an array of digits
 * Return the lowest unique value or 0 if there is no unique values or array is empty.
 * Example: [1, 2, 3, 2, 1, 5, 6] => 3
 *
 * @param  array  $input
 * @return int
 */
function getUniqueValue(array $input)
{
    if (empty($input)){
        return 0;
    }
    $count = count($input);
    $arr = [];
    for ($i = 0; $i < $count; $i++){
        if (array_count_values($input)[$input[$i]] === 1){
            $arr[] = $input[$i];
        }
    }
    if (empty($arr)){
        return 0;
    }
    return min($arr);
}

/**
 * The $input variable contains an array of arrays
 * Each sub array has keys: name (contains strings), tags (contains array of strings)
 * Return the list of names grouped by tags
 * !!! The 'names' in returned array must be sorted ascending.
 *
 * Example:
 * [
 *  ['name' => 'potato', 'tags' => ['vegetable', 'yellow']],
 *  ['name' => 'apple', 'tags' => ['fruit', 'green']],
 *  ['name' => 'orange', 'tags' => ['fruit', 'yellow']],
 * ]
 *
 * Should be transformed into:
 * [
 *  'fruit' => ['apple', 'orange'],
 *  'green' => ['apple'],
 *  'vegetable' => ['potato'],
 *  'yellow' => ['orange', 'potato'],
 * ]
 *
 * @param  array  $input
 * @return array
 */
function groupByTag(array $input)
{
    $arr = [];
    foreach ($input as $value) {
        foreach ($value['tags'] as $tag)
            $arr[$tag][] = $value['name'];
    }
    ksort($arr);
    foreach ($arr as &$value) {
        sort($value);
    }
    return $arr;
}