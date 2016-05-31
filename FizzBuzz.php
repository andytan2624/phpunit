<?php
class FizzBuzz
{
    public function process($collection)
    {
        $filtered_collection = array_filter($collection, function($item) {
            if (is_int($item)) {
                return true;
            }

            return false;
        });

        if ($filtered_collection !== $collection) {
            throw new \Exception("Did not receive collection of integers");
        }

        $result = array_map(function($item) {
            $response = '';

            if ($item % 3 === 0 ){
                $response .= 'Fizz';
            }
            if ($item % 5 === 0) {
                $response .= 'Buzz';
            }
            if ($response === '') {
                $response = $item;
            }
            return $response;
        }, $filtered_collection );

        return $result;
    }
}