# ベースイメージとしてPHP 8.4.2とApacheを使用
FROM php:8.4.2-apache

# 必要なパッケージのインストール
RUN apt-get update \
    && apt-get install -y libzip-dev unzip libpng-dev libjpeg-dev libfreetype6-dev \
       libxml2-dev git curl \
    && apt-get clean

# PHP拡張のインストール
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mysqli zip gd opcache

# Redis拡張のインストール
RUN yes '' | pecl install redis \
    && docker-php-ext-enable redis

# Composerのインストール
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 最新安定版のNode.jsとnpmのインストール
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean

# gitのインストール
RUN apt-get update && apt-get install -y git \
    && git config --global --add safe.directory /var/www/html/src/

# Apacheの設定ファイルを上書き
# COPY apache-virtualhost.conf /etc/apache2/sites-available/000-default.conf

# サーバーの起動スクリプトをコピーし、実行権限を付与（今回は不要）
# COPY server.sh /usr/local/bin/server.sh
# RUN chmod +x /usr/local/bin/server.sh

# 起動後にシェルを実行
ENTRYPOINT ["apache2-foreground"]

# ポート80を開放
EXPOSE 80
