## **セットアップ手順**
**（Laravelバージョン：8.x）**  

本プロジェクトをローカル PC のフォルダにクローンする。  

フォルダに「.env」ファイルを作成し，次の内容を入れる。  
ポート番号は自由に指定するのは，ローカル PC に既存なプロジェクトのポートとコンフリクトしないようにするため。例：  
```
IP=127.0.0.1
```

dokcerを立ち上げる
```
docker-compose build
docker-compose up -d
```

次のコマンドを実行し，Docker コンテナに入る。  
```
docker exec <container_name> bash
```

次のコマンドを実行し，依頼パッケージをインストールする。  
```
composer install
```

次のコマンドを実行し，アプリケーションの「.env」ファイルを作成する。  
```
cp .env.example .env
```

次のコマンドを実行し，「.env」ファイルの `APP_KEY` を生成する。  
```
php artisan key:generate
```

次のコマンドを実行し，`public/storage` から `storage/app/public` へシンボリックリンクを張る。  
```
php artisan storage:link
```

「.env」ファイルの編集を行う。  
```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=local_db
DB_USERNAME=mysqluser
DB_PASSWORD=mysqlpassword
```

次のコマンドを実行し，データテーブルを作成する。  
```
# テーブルを作成するのみ
php artisan migrate

# 開発向きダミーデータを入れる
php artisan migrate  --seed
```

次のコマンドを実行し，`IDE helper` を利用する。これは，`scope` などが補完されるようになる。  
```
php artisan ide-helper:model --nowrite
```

# メモ

## 更新したが反映されない場合
キャッシュ削除
```
composer dump-autoload
php artisan config:cache