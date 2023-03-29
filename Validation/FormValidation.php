<?php

Class FormValidation
{

    public function validationField(Array $forData): array
    {
        return [
            'id' => (is_int($forData['id']) || is_numeric($forData['id'])) ? true : 'id field must me numberis',
            'name' => (is_string($forData['name'])) ? true : 'name  must be string',
        ];
    }
}