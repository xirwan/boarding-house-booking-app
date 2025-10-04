<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use App\Models\BoardingHouse;
use App\Models\Room;
use Illuminate\Http\Request;

class BoardingHouseController extends Controller
{   
    private CityRepositoryInterface $cityRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private BoardingHouseRepositoryInterface $boardingHouseRepository;

    public function __construct(
        CityRepositoryInterface $cityRepository,
        CategoryRepositoryInterface $categoryRepository,
        BoardingHouseRepositoryInterface $boardingHouseRepository,
    ) {
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->boardingHouseRepository = $boardingHouseRepository;
    }

    public function find()
    {   
        $cities = $this->cityRepository->getAllCities();
        $categories = $this->categoryRepository->getAllCategories();

        return view('pages.boarding-house.find', compact('cities', 'categories'));
    }

    public function findResults(Request $request)
    {
        $boardingHouses = $this->boardingHouseRepository->getAllBoardingHouses($request->search, $request->city, $request->category);

        return view('pages.boarding-house.index', compact('boardingHouses'));
    }

    public function show($slug)
    {
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);

        return view('pages.boarding-house.show', compact('boardingHouse'));
    }

    public function showRooms($slug)
    {
        $boardingHouseRooms = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);

        // $rooms = BoardingHouse::whereHas('rooms', function ($query) {
        //     $query->where('is_available', '1');
        // })->where('slug', $boardingHouseRooms->slug)->get();

        $rooms = Room::whereHas('boardingHouse', function ($query) use ($boardingHouseRooms){
            $query->where('slug', $boardingHouseRooms->slug);
        })->where('is_available', '1')->get();

        return view('pages.boarding-house.rooms', compact('boardingHouseRooms', 'rooms'));
    }
}
