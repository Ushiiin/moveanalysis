<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //追加
use App\Models\Timeline; // さっき作成したモデルファイルを引用

class UploadController extends Controller
{
    //
    public function index() {
        return view('upload');
    }

    public function action(Request $request) {
        $request->validate([
            'timeline_file' => 'required' // requiredというのはこれがないとエラーになるという意味？
        ]);

        // ユーザー名を取り込む。
        $user = Auth::user();
        $username = $user->name;
        echo $user;
        echo $username;
        echo '<br>';

        // dd($request);
        // 一旦アップロードしたパスを読み込む。
        // $requestの中のfileメソッドで'upload_file'という名前を読み込んで、その一時保存Pathを取得。
        $text_path = $request->file('timeline_file')->path();
        // そのパスから全てのファイルコンテンツを取得。
        $content = file_get_contents($text_path);
        $content_json = json_decode($content, true);
        $content_array = $content_json["timelineObjects"];
        // dd($content_array);
        foreach($content_array as $o=>$v) {
            // echo array_key_exists("activitySegment", $v) . "XX";
            // echo $o; 
            // dd($v["activitySegment"]);
            if (array_key_exists("activitySegment", $v)) {
                // echo $o . "<br>";
                // dd($v);
                $date = substr($v["activitySegment"]["duration"]["startTimestamp"],0,10);
                $type = $v["activitySegment"]["activityType"];
                $distance = $v["activitySegment"]["distance"];
                echo $date . " " . $type . " " . $distance . "<br>";

                // データベーステーブルにデータを格納する。
                // Modelの中のTimelineを呼んできてinsertをする。
                Timeline::insert(["username" => $username, "date" => $date, "moveType" => $type, "distance" => $distance]);
            }
            // echo dd($v);
            // echo PHP_EOL;
        }
        
        echo "Your monthly timeline has been successfully uploaded";
        exit;
    }
}
