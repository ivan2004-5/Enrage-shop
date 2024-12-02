<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all()->unique('id');
        return view('service', compact('services'));
    }
    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'fone_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Проверьте max размер
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imagePath = null;
        if ($request->hasFile('fone_img')) {
            $imageName = time() . '_' . $request->file('fone_img')->getClientOriginalName(); //Создаём уникальное имя файла
            $request->file('fone_img')->move(public_path('image/service'), $imageName); //Перемещаем файл в нужную директорию
            $imagePath = $imageName;  //Сохраняем только имя файла в базу данных
        }
        
        Service::create([
            'title' => $request->title,
            'price' => $request->price,
            'fone_img' => $imagePath,
            'desc' => $request->description
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Услуга добавлена!');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
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
            $imageName = time() . '_' . $request->file('fone_img')->getClientOriginalName(); //Создаём уникальное имя файла
            $request->file('fone_img')->move(public_path('image/service'), $imageName); //Перемещаем файл в нужную директорию
            $imagePath = $imageName;  //Сохраняем только имя файла в базу данных
        }

        $service->update([
            'title' => $request->title,
            'price' => $request->price,
            'fone_img' => $imagePath,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Услуга обновлена!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Услуга удалена!');
    }

    public function showServices()
    {
        $services = Service::all()->unique('id');
        return view('service', compact('services'));
    }
}
