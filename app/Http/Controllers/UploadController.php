<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
        ]);

        $file = $request->file('file');
        $filePath = $file->store('public'); // сохранение в storage/app/public

        // Выводим "123" в консоль сервера, чтобы увидеть его в логах
        \Log::info("123");

        // Возвращаем JSON-ответ с путем к загруженному файлу
        return response()->json(['file_path' => $filePath], 200);
    }

}