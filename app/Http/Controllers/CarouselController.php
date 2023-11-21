<?php
// CarouselController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CarouselController extends Controller
{
    public function getCarouselData()
    {
        try {
            // Fetch all courses for the carousel
            $carouselData = Course::all();

            return response()->json(['data' => $carouselData], 200);
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
