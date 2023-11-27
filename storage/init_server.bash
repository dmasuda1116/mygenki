#!/bin/bash

######################################################################
# Ubuntuに本番環境を構築する。
# 利用例） sudo /bin/bash ./init_server.bash
# サーバー証明書の発行時に、"n"を入力

echo "--- Start $(date "+%Y/%m/%d %k:%M:%S") $0 $@"

# 実行ユーザーの確認
if [ ${EUID:-${UID}} != 0 ]; then
  echo "This is not super user. Please execute with sudo." >&2
  echo "--- End $(date "+%Y/%m/%d %k:%M:%S") ${0}"
  exit 1
fi

# osのアップデート
sudo apt update
sudo apt full-upgrade -y
sudo apt autoremove

# dockerのインストール
curl -fsSL get.docker.com -o get-docker.sh
sudo sh get-docker.sh
rm get-docker.sh
# docker-composeのインストール
sudo curl -L https://github.com/docker/compose/releases/download/1.29.0/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose

# サーバー証明書の発行（--standaloneオプションが利用するので、ポート80番は開けておき、非Listen状態にしておくこと）
if [ $(hostname) = "tk2-233-26460" ]; then
#  sudo apt -y install certbot
#  sudo certbot certonly --standalone --agree-tos --email h_sasaki@fb3.so-net.ne.jp -d wakoku.org <<EOF
#  n
#EOF
echo "------ $(hostname) ------"
fi

#メールアドレス入力
#a→利用条件同意
#n→メールへお知らせを送ってよいか

# システムアカウント/グループを作成
sudo groupadd --gid 1100 sail # GroupID固定
sudo useradd --uid 1337 --no-create-home --no-user-group -s /bin/false sail # UserID固定
sudo usermod -aG sail sail
sudo groupadd dev
# ユーザーを作成
#sudo useradd -m -s /bin/bash -G sudo,docker,dev,sail -p $(perl -e 'print crypt("Tomc@t1230", "\$6\$salt00")') sasaki
sudo useradd -m -s /bin/bash -G sudo,docker,dev,sail -p $(perl -e 'print crypt("Sasakiss0922", "\$6\$salt00")') sasaki #←@は利用不可
sudo useradd -m -s /bin/bash -G sudo,docker,dev,sail -p $(perl -e 'print crypt("test", "\$6\$salt00")') yoshida

# [/home/sasaki/.profile]の末尾に以下を追加
cat <<EOF >> /home/sasaki/.bashrc

alias sail='bash vendor/bin/sail'
alias redock='docker-compose down && docker-compose up -d && docker-compose ps'
EOF
cat <<EOF >> /home/yoshida/.bashrc

alias sail='bash vendor/bin/sail'
alias redock='docker-compose down && docker-compose up -d && docker-compose ps'
EOF

cd /var
sudo mkdir laravel
sudo chgrp dev ./laravel
sudo chmod g+rwx ./laravel

echo "--- End $(date "+%Y/%m/%d %k:%M:%S") ${0}"
