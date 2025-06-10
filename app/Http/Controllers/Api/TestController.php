<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
   
    public function testApi()
    {
        return response()->json([
            'sukses' => true,
            'pesan' => 'API berfungsi dengan baik',
            'data' => [
                'versi' => '1.0',
                'waktu' => now()->toDateTimeString(),
                'status' => 'aktif',
                'info' => 'Endpoint ini digunakan untuk verifikasi bahwa API berjalan dengan baik'
            ]
        ]);
    }

    /**
     * Endpoint untuk testing autentikasi
     */
    public function testAuth(Request $request)
    {
        $user = $request->user();
        
        return response()->json([
            'sukses' => true,
            'pesan' => 'Autentikasi berhasil',
            'data' => [
                'user' => $user->only(['id', 'name', 'email']),
                'hak_akses' => 'Anda memiliki akses terautentikasi',
                'waktu' => now()->toDateTimeString()
            ]
        ]);
    }
}