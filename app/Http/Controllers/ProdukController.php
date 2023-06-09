<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('produk.index', compact('kategoris'));
    }

    public function api()
    {
        $produks = Produk::join('kategoris', 'kategoris.id', '=', 'produks.kategori_id')
            ->select('produks.id', 'produks.kode_produk', 'produks.nama_produk', 'produks.merk', 'produks.harga_beli', 'produks.harga_jual', 'produks.stok', 'produks.diskon', 'kategoris.id as kategori_id', 'kategoris.nama_kategori')
            ->orderBy('produks.id', 'DESC')
            ->get();
        $datatables = datatables()->of($produks)
            ->addColumn('kode_produk', function ($produk) {
                return '<span class="badge bg-green">' . $produk->kode_produk . '</span>';
            })
            ->addColumn('checkbox', function ($produk) {
                return '<input type="checkbox" name="produk_checkbox[]" class="produk_checkbox" value=' . $produk->id . '>';
            })
            ->addIndexColumn();

        return $datatables
            ->rawColumns(['kode_produk', 'checkbox'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|min:3',
            'merk' => 'required|min:3',
            'kategori_id' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
        ]);

        $produk = Produk::selectRaw('LPAD(CONVERT(COUNT("id") + 1, char(5)) , 5,"0") as kode')->first();

        $produks = new Produk();
        $produks->kode_produk = 'P' . $produk->kode;
        $produks->nama_produk = $request->nama_produk;
        $produks->merk = $request->merk;
        $produks->kategori_id = $request->kategori_id;
        $produks->harga_beli = $request->harga_beli;
        $produks->harga_jual = $request->harga_jual;
        $produks->stok = $request->stok;

        $produks->save();

        return redirect('produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk' => 'required|min:3',
            'merk' => 'required|min:3',
            'kategori_id' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
        ]);

        $produk = DB::table('produks')
            ->where('id', $produk->id)
            ->update([
                'nama_produk' =>  $request->nama_produk,
                'merk' =>  $request->merk,
                'kategori_id' =>  $request->kategori_id,
                'harga_beli' =>  $request->harga_beli,
                'harga_jual' =>  $request->harga_jual,
                'stok' =>  $request->stok,
            ]);

        return redirect('produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect('produk');
    }

    public function select_delete(Request $request)
    {
        $id_array = $request->input('id');
        $data = Produk::whereIn('id', $id_array);
        $data->delete();
    }
}
