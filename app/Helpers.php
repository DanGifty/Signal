<?php

namespace App;

trait Helpers
{
    public function convertEmptyStringToNullValues($fields)
    {
        if (is_array($fields)) {
            // Iterate through the array and replace empty strings with null
            array_walk_recursive($fields, function (&$value) {
                if ($value === '') {
                    $value = null;
                }
            });
        }
        return $fields;
    }
}
