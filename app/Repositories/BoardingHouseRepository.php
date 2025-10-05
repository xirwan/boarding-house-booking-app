<?php

namespace App\Repositories;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Models\BoardingHouse;
use App\Models\Room;
use Illuminate\Database\Eloquent\Builder;


class BoardingHouseRepository implements BoardingHouseRepositoryInterface
{
    public function getAllBoardingHouses($search = null, $city = null, $category = null)
    {
        $query = BoardingHouse::query();

        //ketika search diisi akan berjalan fungsi dibawah ini
        if($search){
            $query->where('name', 'like', '%' . $search . '%');
        }

        //ketika city diisi akan berjalan fungsi dibawah ini
        if($city){
            $query->whereHas('city', function (Builder $query) use ($city){
                $query->where('slug', $city);
            });
        }
        //ketika category diisi akan berjalan fungsi dibawah ini
        if($category){
            $query->whereHas('category', function (Builder $query) use ($category){
                $query->where('slug', $category);
            });
        }
        return $query->get();
    }

    public function getPopularBoardingHouses($limit = 5)
    {
        return BoardingHouse::withCount('transactions')->orderBy('transactions_count', 'desc')->take($limit)->get();
    }

    public function getBoardingHouseByCitySlug($slug)
    {
        return BoardingHouse::whereHas('city', function (Builder $query) use ($slug){
            $query->where('slug', $slug);
        })->get();
    }

    public function getBoardingHouseByCategorySlug($slug)
    {
        return BoardingHouse::whereHas('category', function (Builder $query) use ($slug){
            $query->where('slug', $slug);
        })->get();
    }

    public function getBoardingHouseBySlug($slug)
    {
        return BoardingHouse::where('slug', $slug)->first();
    }

    public function getBoardingHouseRoomById($id)
    {
        return Room::find($id);
    }
}