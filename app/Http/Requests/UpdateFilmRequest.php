<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFilmRequest extends FormRequest
{
    /**
     * Определяет, авторизован ли пользователь для выполнения запроса.
     *
     * @return bool Разрешение на выполнение запроса.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Возвращает правила валидации для запроса.
     *
     * @return array Правила валидации.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'poster_image' => 'nullable|string|max:255',
            'preview_image' => 'nullable|string|max:255',
            'background_image' => 'nullable|string|max:255',
            'background_color' => 'nullable|string|max:9',
            'video_link' => 'nullable|string|max:255',
            'preview_video_link' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'director' => 'nullable|string|max:255',
            'starring' => 'nullable|array',
            'genre' => 'nullable|array',
            'run_time' => 'nullable|integer',
            'released' => 'nullable|integer',
            'imdb_id' => 'required|string|unique:films,imdb_id,' . $this->film->id . '|regex:/^tt\d{7,}$/',
            'status' => 'required|in:pending,moderate,ready',
        ];
    }
}
