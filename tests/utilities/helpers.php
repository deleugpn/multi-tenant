<?php

/**
 * @param $class
 * @param array $attributes
 * @param int $times
 * @return mixed
 */
function create($class, $attributes = [], $times = 1)
{
    $data = factory($class)->times($times)->create($attributes);
    if ($times > 1) {
        return $data;
    }

    return $data->first();
}

/**
 * @param $class
 * @param array $attributes
 * @param int $times
 * @return mixed
 */
function make($class, $attributes = [], $times = 1)
{
    $data = factory($class)->times($times)->make($attributes);
    if ($times > 1) {
        return $data;
    }

    return $data->first();
}