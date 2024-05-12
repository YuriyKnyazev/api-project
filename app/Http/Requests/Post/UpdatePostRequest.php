<?php

namespace App\Http\Requests\Post;

use App\Http\Requests\Common\BaseRequest;

class UpdatePostRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|int|exists:App\Models\Post,id',
            'title' => 'required|string|max:150',
            'description' => 'required|string|max:2000',
        ];
    }
    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->post,
        ]);
    }
}
