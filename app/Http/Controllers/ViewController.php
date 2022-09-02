<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //追加
use App\Models\Timeline; // さっき作成したモデルファイルを引用

class ViewController extends Controller
{
    public function index() {
        $move_type_number = array(); // 移動をKeyとしてそれを何回やったか。
        $move_total_distance = array(); // 移動をKeyとしてそれによる距離がいくつか。

        $all_data = Timeline::get();
        // ユーザー名を取り込む。
        $user = Auth::user();
        $username = $user->name;
        // dd($all_data);
        foreach ($all_data as $data) {
            // 自分以外のデータはSkip
            if ($data->username != $username) {
                continue;
            }
            // echo $data;
            $type = $data->moveType;
            $dis = $data->distance; // $disの型は整数。
            // echo gettype($dis);
            // echo $data->id;
            // echo "<br>";
            if (array_key_exists($type,$move_total_distance)){
                $move_type_number[$type] += 1;
                $move_total_distance[$type] += $dis/1000;
            } else {
                $move_type_number[$type] = 1;
                $move_total_distance[$type] = $dis/1000;
            }
        }
        // var_dump($move_total_distance);
        // var_dump($move_type_number);
        // echo "XXX <br>";
        // Valueをすべてint -> strにする
        foreach ($move_type_number as $k=>$v) {
            // $move_type_number->$k = (string) $v;
            $v = (string) $v;
            $move_type_number[$k] = $v;
            // echo $v;
            // echo gettype($v);
            // echo gettype($move_type_number[$k]);
        }
        foreach ($move_total_distance as $k=>$v) {
            // $move_total_distance->$k = (string) $v;
            $v = (string) $v;
            $move_total_distance[$k] = $v;
            // echo $v;
            // echo gettype($v);
            // echo gettype($move_total_distance[$k]);
        }
        // var_dump($move_total_distance);
        // echo "<br>";
        // var_dump($move_type_number);
        // return view('up.simple_view');
        return view('view', compact('move_type_number','move_total_distance'));
    }
}
