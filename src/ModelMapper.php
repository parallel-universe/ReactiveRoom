<?php
namespace ReactiveRoom;

class ModelMapper
{
    public function map($model, $fields)
    {
        foreach ($fields as $key => $value) {
            $method = 'set' . $key;
            if (method_exists($model, $method)) {
                $model->$method($value);
            }
        }
    }
}
