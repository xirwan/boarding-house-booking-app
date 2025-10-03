<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private BoardingHouseRepositoryInterface $boardingHouseRepository;
    private CityRepositoryInterface $cityRepository;

    public function __construct(
        BoardingHouseRepositoryInterface $boardingHouseRepository,
        CityRepositoryInterface $cityRepository,
    )
    {
        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->cityRepository = $cityRepository;
    }

    public function show($slug)
    {
        $boardingHouses = $this->boardingHouseRepository->getBoardingHouseByCitySlug($slug);
        $city = $this->cityRepository->getCityBySlug($slug);

        return view('pages.city.show', compact('boardingHouses', 'city'));
    }
}
