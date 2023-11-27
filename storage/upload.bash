#!/bin/bash

######################################################################
# tarファイルを、さくらVPSへアップロードする。
# 利用例） sudo ./stress-check/storage/upload.bash tk2-233-26460.vs.sakura.ne.jp password

echo "--- Start $(date "+%Y/%m/%d %k:%M:%S") $0 $@"

# 実行ユーザーの確認
if [ ${EUID:-${UID}} != 0 ]; then
  echo "This is not super user. Please execute with sudo." >&2
  echo "--- End $(date "+%Y/%m/%d %k:%M:%S") ${0}"
  exit 1
fi

# 接続先
host="${1:-tk2-233-26460.vs.sakura.ne.jp}"

# ホストキーの更新
ssh-keygen -f ~/.ssh/known_hosts -R $host
ssh-keyscan -H $host >> ~/.ssh/known_hosts

# アップロード
sftp dmasuda1116@mail.com@$host << EOF
cd /var/laravel
put $PWD/stress-check.tar.gz
put $PWD/stress-check/storage/deploy.bash
bye
EOF

echo "--- End $(date "+%Y/%m/%d %k:%M:%S") ${0}"
