<?php

namespace App\Http\Requests;

class UpdateBukuRequest extends StoreBukuRequest
{
    public function rules(): array
    {
        $rules = [];
        foreach (parent::rules() as $field => $rule) {
            $rules[$field] = ['sometimes', ...is_array($rule) ? $rule : explode('|', $rule)];
        }

        return $rules;
    }
}