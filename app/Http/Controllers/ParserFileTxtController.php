<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;


/**
 * Class ParserFileTxTController
 * @package App\Http\Controllers
 * @author  Daud Valentino Simbolon <daud.simbolon@gmail.com>
 */
class ParserFileTxtController extends Controller
{
    public function readFile()
    {
        /*$file = fopen(public_path('CabangKonvent.txt'),"r");
        $column = (fgetcsv($file, '|'));
        fclose($file);*/
        //$column = explode('|',$column[0]);

        $data = [];


        $column = [];
        foreach(file(public_path('CabangKonvent.txt')) as $key => $line) {

            //dd(str_replace("\n", '', $line));
            if($key == 0) {
                $column = explode('|', preg_replace('~[\r\n]~', '', $line));
                Arr::forget($column,50);
            } else {

                $parser = explode('|',$line);
                //Arr::forget($parser,50);

                $r = [];
                foreach($column as $k => $val) {
                    if(Arr::has($parser, $k)){
                        $r[str_replace(' ', '', $val)] =  mb_convert_encoding($parser[$k], "UTF-8");

                    }
                }
                if(count($r)) {
                    $data[] = $r;
                }
            }
        }

        //dd($data);


        Schema::dropIfExists('CabangKonvent');

        Schema::create('CabangKonvent', function(Blueprint $table) use ($column){
            $table->integer(Str::lower($column[0]),false);

            for($i = 1; $i < count($column);$i++) {
                $table->string(str_replace(' ', '', Str::lower($column[$i])),150)->nullable();
            }
        });

        DB::table('CabangKonvent')->insert($data);


        return response()->json([
            'success' => true,
            'message' => 'Sukses di buat tabel, beserta datanya!.'
        ]);

    }
}