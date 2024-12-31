# MariaDBの公式イメージをベースにします
FROM mariadb:10.11.10

# コンテナ内のタイムゾーンを設定
ENV TZ=Asia/Tokyo

# 初期化用SQLスクリプトをコンテナ内にコピー
COPY ./init.sql /docker-entrypoint-initdb.d/

# 必要に応じて、カスタム設定ファイルをコピー
COPY ./my.cnf /etc/mysql/my.cnf

# データベースの初期設定
# init.sql は、DBの作成やテーブルの作成などを行うSQLファイル
# my.cnf は、MariaDBの設定ファイルで、必要に応じて設定を変更できます

# 必要なポートを公開
EXPOSE 3306