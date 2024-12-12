<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Log; // Добавляем для логирования

class AdminController extends Controller
{
    public function downloadReport()
    {
        $orders = Order::with(['user', 'service'])->get();

        // Логируем информацию о ненайденных пользователях и услугах
        $missingUsers = DB::table('orders as o')
            ->leftJoin('users as u', 'o.user_id', '=', 'u.id')
            ->whereNull('u.id')
            ->select('o.id', 'o.user_id')
            ->get();

        if ($missingUsers->isNotEmpty()) {
            foreach ($missingUsers as $order) {
                Log::warning("Заказ ID: {$order->id} не имеет соответствующего пользователя (user_id: {$order->user_id})");
            }
        }

        $missingServices = DB::table('orders as o')
            ->leftJoin('services as s', 'o.service_id', '=', 's.id')
            ->whereNull('s.id')
            ->select('o.id', 'o.service_id')
            ->get();

        if ($missingServices->isNotEmpty()) {
            foreach ($missingServices as $order) {
                Log::warning("Заказ ID: {$order->id} не имеет соответствующей услуги (service_id: {$order->service_id})");
            }
        }


        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        $section->addText('Отчет о заказах услуг', ['bold' => true, 'size' => 16]);
        $section->addTextBreak();

        foreach ($orders as $order) {
            $section->addText("Заказ №{$order->id}", ['bold' => true]);
            $section->addText("Пользователь: " . ($order->user ? $order->user->name : 'Не указан'));
            $section->addText("Услуга: " . ($order->service ? $order->service->name : 'Не указана'));
            $section->addText("Дата заказа: {$order->created_at}");
            $section->addTextBreak();
        }

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $tempFile = tempnam(sys_get_temp_dir(), 'word');
        $objWriter->save($tempFile);

        return response()->download($tempFile, 'report.docx')->deleteFileAfterSend(true);
    }
}

