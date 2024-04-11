<?php

namespace App\Http\Controllers;

use App\Http\Responses\BaseResponse;
use App\Http\Responses\SuccessResponse;
use App\Models\Film;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Получение текущего промо-фильма.
     *
     * @return BaseResponse
     */
    public function index(): BaseResponse
    {
        $promo = Promo::latest()->first();
        return new SuccessResponse($promo);
    }

    /**
     * Установка нового промо-фильма.
     *
     * @return BaseResponse
     */
    public function store(Request $request, Film $film): BaseResponse
    {
        $promo = Promo::create(['film_id' => $film->id]);
        return new SuccessResponse($promo);
    }
}
