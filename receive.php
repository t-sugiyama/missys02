<!--?php
// GitHub WebHooks のIPアドレスは以下の３つ
// WebHooks のページに記載があるので要確認。
$githubIPs = array( "207.97.227.253", "50.57.128.197", "108.171.174.178" );
$errorStatus = "HTTP/1.1 500 Internal Server Error";<br ?--><br />if( !in_array( $_SERVER[ "REMOTE_ADDR" ], $githubIPs ) )
{
// GitHub 以外からのアクセスには 500 を返す
    header( $errorStatus );
    die;
}<br /><br />// 受け取ったJSONをデコード
$payload = json_decode($_REQUEST['payload']);<br /><br />// リポジトリ名で git pull するVirtualhost
switch($payload->repository->name) {
    case "Hoge": // Hoge リポジトリなら
        $vhost = "hoge.dev.example.com";
        break;
// 以下、プロジェクト（リポジトリごとに case を書く)
}<br /><br />$dirpath = "/home/web/".$vhost;<br /><br />exec("cd /home/chatii/web".$vhost);
exec("/usr/bin/expect gitpull.exp", $output);