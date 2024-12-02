<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('service', compact('services'));
    }
    public function create()
    {
        return view('service.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'fone_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', //Проверка изображения
        ]);

        $imagePath = null;
        if ($request->hasFile('fone_img')) {
            $imagePath = $request->file('fone_img')->store('service_images', 'public');
            // 'public' указывает на диск, определённый в config/filesystems.php
        }

        Service::create([
            'title' => $request->title,
            'price' => $request->price,
            'fone_img' => $imagePath,
        ]);

        return redirect()->route('services.index')->with('success', 'Услуга добавлена!');
    }
    public function edit(Service $service)
    {
        return view('service.edit', compact('service'));
    }
    
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'fone_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Проверка изображения
        ]);
    
        $imagePath = $service->fone_img;
        if ($request->hasFile('fone_img')) {
            $imagePath = $request->file('fone_img')->store('service_images', 'public');
        }
    
        $service->update([
            'title' => $request->title,
            'price' => $request->price,
            'fone_img' => $imagePath,
        ]);
    
        return redirect()->route('services.index')->with('success', 'Услуга обновлена!');
    }
    
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Услуга удалена!');
    }
}
