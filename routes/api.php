<?php

use App\Http\Controllers\PatientRegistryController;
use Illuminate\Support\Facades\Route;

// Patient CRUD Routes
Route::apiResource('patients', PatientRegistryController::class);
