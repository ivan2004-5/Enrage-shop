<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Order, OrderItem};
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Log;

class AdminController extends Controller
{
    public function downloadReport()
    {
        // Получаем заказы с связанными пользователями и товарами
        $orders = Order::with(['user', 'orderItems.service'])->get();

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        $section->addText('Отчет о заказах услуг', ['bold' => true, 'size' => 16]);
        $section->addTextBreak();

        foreach ($orders as $order) {
            $section->addText("Заказ №{$order->id}", ['bold' => true]);
            $section->addText("Пользователь: " . ($order->user ? $order->user->name : 'Не указан'));
            $section->addText("Дата заказа: {$order->created_at}");

            // Обрабатываем товары в заказе
            if ($order->orderItems->isNotEmpty()) {
                foreach ($order->orderItems as $item) {
                    $section->addText("Услуга: " . ($item->service ? $item->service->title : 'Не указана') . ", Количество: {$item->quantity}, Цена: {$item->price}");
                }
            } else {
                $section->addText('Товары в заказе отсутствуют.');
            }

            $section->addTextBreak();
        }

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $tempFile = tempnam(sys_get_temp_dir(), 'word');
        $objWriter->save($tempFile);

        return response()->download($tempFile, 'report.docx')->deleteFileAfterSend(true);
    }
}

