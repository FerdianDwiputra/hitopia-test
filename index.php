<?php

use Illuminate\Support\Facades\Route;

// Route untuk menampilkan form input
Route::get('/input-form', function () {
    return view('input-form');
});

// Route untuk memproses input
use Illuminate\Http\Request;
use App\Services\Logic;

Route::post('/process', function (Request $request) {
    $s = $request->input('s', '');
    $k = $request->input('k', 0);
    $queries = explode(',', $request->input('queries', ''));
    $queries = array_map('intval', $queries);
    $type = $request->input('type', '');

    // Validasi Input Dasar
    if (empty($s) || !is_string($s) || !in_array($type, ['weightedStrings', 'balancedBrackets', 'highestPalindrome'])) {
        return response()->json(['error' => 'Invalid input'], 400);
    }

    try {
        if ($type === 'weightedStrings') {
            $result = Logic::weightedStrings($s, $queries);
        } elseif ($type === 'balancedBrackets') {
            $result = Logic::balancedBrackets($s);
        } elseif ($type === 'highestPalindrome') {
            $result = Logic::highestPalindrome($s, $k);
        } else {
            return response()->json(['error' => 'Invalid type'], 400);
        }

        return response()->json(['result' => $result]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});


// Input form Blade view
Route::view('input-form', 'input-form');
