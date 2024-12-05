<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class AdminController extends Controller
{
    
    public function downloadReport()
    {
        // Получаем данные о заказах с предварительной загрузкой связанных моделей
        $orders = Order::with(['user', 'service'])->get();
    
        // Проверка наличия user_id в таблице orders
        $missingUsers = DB::table('orders as o')
            ->leftJoin('users as u', 'o.user_id', '=', 'u.id')
            ->whereNull('u.id')
            ->select('o.id', 'o.user_id')
            ->get();
    
        if ($missingUsers->isNotEmpty()) {
            echo "Найдены заказы без соответствующих пользователей:\n";
            foreach ($missingUsers as $order) {
                echo "Заказ ID: {$order->id}, user_id: {$order->user_id}\n";
            }
        } else {
            echo "Все заказы имеют соответствующих пользователей.\n";
        }
    
        // Проверка наличия service_id в таблице orders
        $missingServices = DB::table('orders as o')
            ->leftJoin('services as s', 'o.service_id', '=', 's.id')
            ->whereNull('s.id')
            ->select('o.id', 'o.service_id')
            ->get();
    
        if ($missingServices->isNotEmpty()) {
            echo "Найдены заказы без соответствующих услуг:\n";
            foreach ($missingServices as $order) {
                echo "Заказ ID: {$order->id}, service_id: {$order->service_id}\n";
            }
        } else {
            echo "Все заказы имеют соответствующие услуги.\n";
        }
    
        // Создаем новый документ Word
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
    
        // Добавляем заголовок
        $section->addText('Отчет о заказах услуг', ['bold' => true, 'size' => 16]);
        $section->addTextBreak();
    
        // Добавляем данные о заказах
        foreach ($orders as $order) {
            $section->addText("Заказ №{$order->id}", ['bold' => true]);
            if ($order->user) {
                $section->addText("Пользователь: {$order->user->name}");
            } else {
                $section->addText("Пользователь: Не указан");
            }
            if ($order->service) {
                $section->addText("Услуга: {$order->service->name}");
            } else {
                $section->addText("Услуга: Не указана");
            }
            $section->addText("Дата заказа: {$order->created_at}");
            $section->addTextBreak();
        }
    
        // Сохраняем документ в файл
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $tempFile = tempnam(sys_get_temp_dir(), 'word');
        $objWriter->save($tempFile);
    
        // Отправляем файл пользователю
        return response()->download($tempFile, 'report.docx')->deleteFileAfterSend(true);
    }
}