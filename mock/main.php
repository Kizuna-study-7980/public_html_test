<?php
// 表示制御用変数
$display_control_no = 0;

// サーバのベースURL
$url_base = "https://study7980.cloudfree.jp/";

// ディレクトリのパスからURLを取得する処理（取得したい文字が検索文字より後にある場合）
$directory_path = dirname(__FILE__);
$search_string = "public_html/";
$posision = strpos($directory_path, $search_string) + strlen($search_string);
$path_this = substr($directory_path, $posision);
// ディレクトリのパスから一つ上階層を取得する処理
$directory_list = explode("/", $path_this);
$directory_list_quantity = count($directory_list);
$minimum_quantity = 2;
if ($directory_list_quantity > $minimum_quantity) {
    // $path_this を "/" で分割した配列の数が $minimum_quantity より大きいとき
    for ($i = 0; $i < count($directory_list) - $minimum_quantity; $i++) {
        if ($i === 0) {
            $path_up_directory = $directory_list[$i] . "/";
        } else {
            $path_up_directory .= $directory_list[$i] . "/";
        }
    }
} else {
    // $path_this 内で、始めに現れる "/" の前の文字列を取得する
    $search_string_parent_path = "/";
    $posision = strpos($path_this, $search_string_parent_path) + strlen($search_string_parent_path) - 1;
    $path_up_directory = substr($path_this, 0, $posision);
}
// ディレクトリのパスからファイル名を取得する処理
$posision = strpos(__FILE__, $path_this) + strlen($path_this);
$file_name = substr(__FILE__, $posision);

// URL
$url_this = $url_base . $path_this;
$url_up_directory = $url_base . $path_up_directory;
$url_login = $path_this;
// 下階層のpath
// $url_xxx = $url_home . "下階層フォルダ名" . "/";

// URLリスト表示用二次元配列
$url_list_no_url = 0;
$url_list_no_name = 1;
$url_list = [
    [$url_login, "戻る"]
];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--  タブ名称  -->
    <title><?php print $file_name; ?></title>
    <meta name="description" content="An interactive getting started guide for Brackets.">
    <link rel="stylesheet" href="main.css">
</head>

<body>

    <h2>メイン画面</h2>

    <ul>
        <?php
        for ($i = 0; $i < count($url_list); $i++) {
            print "<li>";
            print "<a href='" . $url_base . $url_list[$i][$url_list_no_url] . "'>" . $url_list[$i][$url_list_no_name] . "</a>";
            print "</li>";
        }
        ?>
    </ul>


</body>

</html>