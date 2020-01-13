<?php
// 40 じゃんけんを作成しよう！
// 下記の要件を満たす「じゃんけんプログラム」を開発してください。
// 要件定義
// ・使用可能な手はグー、チョキ、パー
// ・勝ち負けは、通常のじゃんけん
// ・PHPファイルの実行はコマンドラインから。
// ご自身が自由に設計して、プログラムを書いてみましょう！

const ROCK = 0;
const SCISSORS = 1;
const PAPER = 2;
const HAND_TYPE = array(
    ROCK => "グー",
    SCISSORS => "チョキ",
    PAPER => "パー",
);


const WIN = 2;
const LOSE = 1;
const DRAW = 0;
const RESULT_TYPE = array(
    WIN => "あなたの勝ちです",
    LOSE => "あなたの負けです",
    DRAW => "あいこです",
);

define("GAME_CONTINUE_YES", 0);




janken();

function inputValidation($input){
    if($input == ""){
        echo "入力がありません" . PHP_EOL;
        return false;
    }

    if(is_numeric($input) === false){
        echo "ジャンケンの手は数字で入力してください" . PHP_EOL;
        return false;
    }
    if($input <0 || $input >2){
        echo "ジャンケンの手は0か1か2で入力してください" . PHP_EOL;
        return false;
    }
    return true;
}


function inputYourHand(){
    $input = trim(fgets(STDIN));

    if (inputValidation($input) === false){
        inputYourHand();
        return;
    }

    switch($input){
        case ROCK:
            echo sprintf("あなた：%s", HAND_TYPE[$input]) . PHP_EOL;
            break;

        case SCISSORS:
            echo sprintf("あなた：%s", HAND_TYPE[$input]) . PHP_EOL;
            break;

        case PAPER:
            echo sprintf("あなた：%s", HAND_TYPE[$input]) . PHP_EOL;
            break;
    }
    return $input;
}




function getPcHand(){
    $pc_hand = mt_rand(0, 2);
    switch($pc_hand){
        case ROCK:
            echo sprintf("あなた：%s", HAND_TYPE[$pc_hand]) . PHP_EOL;
            break;

        case SCISSORS:
            echo sprintf("あなた：%s", HAND_TYPE[$pc_hand]) . PHP_EOL;
            break;

        case PAPER:
            echo sprintf("あなた：%s", HAND_TYPE[$pc_hand]) . PHP_EOL;
            break;
    }
    return $pc_hand;
}


function checkResult($your_hand, $pc_hand){
    $judge = ($your_hand - $pc_hand + 3) % 3;

    switch($judge){
        case WIN:
            echo sprintf("%s", RESULT_TYPE[$judge]) . PHP_EOL;
            break;

        case LOSE:
            echo sprintf("%s", RESULT_TYPE[$judge]) . PHP_EOL;
            break;

        case DRAW:
            echo sprintf("%s", RESULT_TYPE[$judge]) . PHP_EOL;
            break;
    }
    return;
}


function gameContinue(){

    echo "ゲームを続けますか？？--> Yes:0を押す, No:それ以外のキー";
    $input = trim(fgets(STDIN));
    
    switch($input){
        case GAME_CONTINUE_YES:
            echo "ゲームを再開します" . PHP_EOL;
            janken();
            break;

        case !GAME_CONTINUE_YES:
            echo "ゲームを終了します" . PHP_EOL;
            break;
    }

}



function janken() {
    echo "0：グー、1：チョキ、2：パーから手を選んでください" . PHP_EOL;
    //自分の手入力
    $your_hand = inputYourHand();
    //com の手取得
    $pc_hand = getPcHand();
    //判定
    //結果出力
    checkResult($your_hand, $pc_hand);
    gameContinue();
    return;
}






?>