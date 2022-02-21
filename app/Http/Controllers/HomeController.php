<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function docs(){
        $data=array(
            '42. Правила приема на обучение по программам доп. проф. образования в университете. Утверждены 27.04.2015.pdf',
            '87. Порядок разработки, выдачи и учета документов о квалиф.Утвержден 25.02.16.pdf',
            '89. Порядок организации итоговой аттестации при реализ.доп проф.программ. Утверждено 25.02.16.pdf',
            '120 Положение о пребывании иностранных граждан. Утверждено 27.09.16.pdf',
            'ПГУ имени Шолом-Алейхема Начальнику Департамента здравоохранения Правительства ЕАО Лебедеву А.А..pdf'
        );
        return view('docs',['data'=>$data]);
    }

    public function docsUpload(Request $request) {

        // $request->validate([
        //     'document' => 'image|nullable|max:1999',
        //   ]);
        // if( $request->hasFile('document')){
        // // Имя и расширение файла
        // $filenameWithExt = $request->file('document')->getClientOriginalName();
        // // Только оригинальное имя файла
        // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // // Расширение
        // $extention = $request->file('document')->getClientOriginalExtension();
        // // Путь для сохранения
        // $fileNameToStore = "main_image/".$filename."_".time().".".$extention;
        // // Сохраняем файл
        // $path = $request->file('main_image')->storeAs('public/', $fileNameToStore);
        // }

        //   // При выводе файла на странице нудно будет прибавить в начале "storage/"
        // $fileNameToStore . "storage/";

        return view('admin.upload-docs');
    }
}