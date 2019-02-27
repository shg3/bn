## 概要
創作文芸サークル「文文文庫」に属していた知人から制作依頼されたもの。
公式（？）HPという位置付け。
 - `top`
 - `info`
 - `discography`
 - `member`
 - `contact`
 
という5セクション。
情報量があまりないことが分かっていたので、無理にページに分けずに1枚で構成。
CSS3はデスクトップ用。



## 開発環境
 - iMac (Retina 5K, 27-inch, 2017)
 - ローカル：XAMPP 7.2.12-0
 - サーバー：Apache 2.4.38, MySQL 5.7, PHP 7.2.14
 - エディター：Atom 1.34.0


## contactページの仕組みメモ
#### 必須項目
 - `name`
 - `email`
 - `maintext`

#### 流れ
1. 必須項目が`index.php`から`mailCheck.php`にPOSTされる。遷移。
2. `mailCheck.php`でメールの内容を確認してもらう。OKなら必須項目をSESSIONに格納し、`mailCheck_on.php`に遷移。
2. `mailCheck_on.php`ではメールのテキストと暗証番号を作成。メール送信。`index.php`へのリンクから遷移。
