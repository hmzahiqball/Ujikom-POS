<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminDataPromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $promoResponse = Http::withAuth()->get(config('api.base_url') . 'promo/');
            $taxResponse = Http::withAuth()->get(config('api.base_url') . 'promo/setting/');

            if ($promoResponse['status'] === 200) {
                return view('admin.datapromo', [
                    'promos' => $promoResponse['data'],
                    'tax' => $taxResponse['data']
                ]);
            }
        } catch (\Exception $e) {
            return view('admin.datapromo', [
                'promos' => [],
                'error' => 'Gagal mengambil data promo'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'namaPromo_addpromo' => 'required|string|max:255',
                'kodePromo_addpromo' => 'required|string|max:100',
                'tipePromo_addpromo' => 'required|in:persen,nominal',
                'totalPromo_addpromo' => 'required|numeric',
                'kuotaPromo_addpromo' => 'required|numeric',
                'tanggalMulai_addpromo' => 'required|date',
                'tanggalAkhir_addpromo' => 'required|date|after_or_equal:tanggalMulai_addpromo',
                'minBelanja_addpromo' => 'required|numeric',
                'statusPromo_addpromo' => 'required|in:aktif,nonaktif',
            ]);

            $url = config('api.base_url') . 'promo';

            $data = [
                'p_namaPromo' => $request->namaPromo_addpromo,
                'p_kodePromo' => $request->kodePromo_addpromo,
                'p_tipePromo' => $request->tipePromo_addpromo,
                'p_totalPromo' => $request->totalPromo_addpromo,
                'p_kuotaPromo' => $request->kuotaPromo_addpromo,
                'p_tanggalMulai' => $request->tanggalMulai_addpromo,
                'p_tanggalAkhir' => $request->tanggalAkhir_addpromo,
                'p_minBelanja' => $request->minBelanja_addpromo,
                'p_statusPromo' => $request->statusPromo_addpromo,
            ];

            $response = Http::withAuth()->post($url, $data);

            if ($response->successful()) {
                return redirect('admin/datapromo')->with('success', 'Promo berhasil ditambahkan.');
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => $response->json()['message'] ?? 'Gagal menambahkan promo.'
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Server error: ' . $e->getMessage()], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'id_editpromo' => 'required',
                'namaPromo_updatepromo' => 'required|string|max:255',
                'kodePromo_updatepromo' => 'required|string|max:100',
                'tipePromo_updatepromo' => 'required|in:persen,nominal',
                'totalPromo_updatepromo' => 'required|numeric',
                'kuotaPromo_updatepromo' => 'required|numeric',
                'tanggalMulai_updatepromo' => 'required|date',
                'tanggalAkhir_updatepromo' => 'required|date|after_or_equal:tanggalMulai_updatepromo',
                'minBelanja_updatepromo' => 'required|numeric',
                'statusPromo_updatepromo' => 'required|in:aktif,nonaktif',
            ]);

            $id = $request->id_editpromo;
            $url = config('api.base_url') . "promo/{$id}";

            // Siapin payload buat API backend
            $data = [
                'p_idPromo' => $id,
                'p_namaPromo' => $request->namaPromo_updatepromo,
                'p_kodePromo' => $request->kodePromo_updatepromo,
                'p_tipePromo' => $request->tipePromo_updatepromo,
                'p_totalPromo' => $request->totalPromo_updatepromo,
                'p_kuotaPromo' => $request->kuotaPromo_updatepromo,
                'p_tanggalMulai' => $request->tanggalMulai_updatepromo,
                'p_tanggalAkhir' => $request->tanggalAkhir_updatepromo,
                'p_minBelanja' => $request->minBelanja_updatepromo,
                'p_statusPromo' => $request->statusPromo_updatepromo,
            ];

            $response = Http::withAuth()->put($url, $data);

            if ($response['status'] === 200) {
                return redirect('admin/datapromo')->with('success', 'Promo berhasil diperbarui.');
            }

            return redirect()->back()->with('error', 'Gagal memperbarui promo: ' . $response->json()['message'] ?? 'Unknown error');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui promo: ' . $e->getMessage());
        }
    }

    public function setpajak(Request $request)
    {
        try {
            $request->validate([
                'pajak' => 'required|numeric',
            ]);

            $id = $request->idsetting ?? 999; // pake 0 kalau belum ada idsetting
            $url = config('api.base_url') . "promo/setting/{$id}";

            // dd($url, $request->all());

            $data = [
                'p_value' => $request->pajak,
            ];

            $response = Http::withAuth()->put($url, $data);

            if ($response['status'] === 200) {
                return redirect('admin/datapromo')->with('success', 'Data berhasil diperbarui.');
            }

            return redirect()->back()->with('error', 'Gagal memperbarui Data: ' . $response->json()['message'] ?? 'Unknown error');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui Data: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $token = session('jwt_token');
        $request->validate([
            'id_deletepromo' => 'required|numeric',
        ]);

        $idpromo = $request->id_deletepromo;

        try {
            $response = Http::withHeaders([
                'authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->delete(config('api.base_url') . "promo/{$idpromo}");

            if ($response['status'] === 200) {
                return redirect('admin/datapromo')->with('success', 'Promo berhasil dihapus.');
            }

            return redirect()->back()->with('error', 'Gagal menghapus jadwal: ' . $response->json()['message']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus jadwal: ' . $e->getMessage());
        }
    }
}
