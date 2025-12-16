<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\TicketCategory;
use Illuminate\Http\Request;


class ConcertController extends Controller
{
    public function adminList()
{
    $concerts = Concert::all();
    return view('admin.concerts', compact('concerts'));
}

public function create()
{
    return view('admin.concert-create');
}

public function edit($id)
{
    $concert = Concert::findOrFail($id);
    return view('admin.concert-edit', compact('concert'));
}

    public function index()
    {
        return view('concerts.index', [
            'concerts' => Concert::all()
        ]);
    }

    public function show($id)
    {
        $concert = Concert::with('ticketCategories')->findOrFail($id);
        return view('concerts.show', compact('concert'));
    }

    public function categories($id)
{
    $concert = Concert::findOrFail($id);
    return view('admin.categories', compact('concert'));
}

public function storeCategory(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|integer',
        'stock' => 'required|integer|min:0',
    ]);

    TicketCategory::create([
        'concert_id' => $id,
        'name' => $request->name,
        'price' => $request->price,
        'stock' => $request->stock,
    ]);

    return back()->with('success', 'Kategori tiket berhasil ditambah!');
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'artist' => 'required',
        'date' => 'required|date',
        'location' => 'required',
        'description' => 'required',
    ]);

    Concert::create($request->all());

    return redirect()->route('admin.concerts')->with('success', 'Konser berhasil ditambah!');
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required',
        'artist' => 'required',
        'date' => 'required|date',
        'location' => 'required',
        'description' => 'required',
    ]);

    $concert = Concert::findOrFail($id);
    $concert->update($request->all());

    return redirect()->route('admin.concerts')->with('success', 'Konser berhasil diperbarui!');
}

public function destroy($id)
{
    Concert::findOrFail($id)->delete();
    return redirect()->route('admin.concerts')->with('success', 'Konser berhasil dihapus!');
}

}
