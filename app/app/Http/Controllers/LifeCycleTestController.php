<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifeCycleTestController extends Controller
{
    public function showServiceProviderTest() {
        $encrypt = app()->make('encrypter');
        $password = $encrypt->encrypt('password');

        $sample = app()->make('serviceProviderTest');

        dd($sample, $password, $encrypt->decrypt($password));
    }

    public function showServiceContainerTest() {
        app()->bind('lifeCycleTest', function(){
            return 'ライフサイクルのテスト';
        });

        $test = app()->make('lifeCycleTest');

        // サービスコンテナなしのパターン
        // インスタンス化したMessageクラスをSampleクラスに渡す必要がある。（MessageとSampleは依存関係にある）
        // $message = new Message();
        // $sample = new Sample($message);
        // $sample->run();

        // サービスコンテナありのパターン
        // インスタンス化せずに、依存関係も解決した状態で呼び出せる
        app()->bind('sample', Sample::class);
        $sample = app()->make('sample');
        $sample->run();

        dd($test, app());
    }
}

class Sample
{
    public $message;
    public function __construct(Message $message){
        $this->message = $message;
    }
    public function run(){
        $this->message->send();
    }
}

class Message
{
    public function send(){
        echo('メッセージ表示');
    }
}
