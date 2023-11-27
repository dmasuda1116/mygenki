#!/bin/bash

######################################################################
# Laravelプロジェクトのtarファイルを解凍し、Dockerへデプロイする。
# 利用例） sudo ./deploy.bash in_package.tar.gz

echo "--- Start $(date "+%Y/%m/%d %k:%M:%S") $0 $@"

# 実行ユーザーの確認
if [ ${EUID:-${UID}} != 0 ]; then
  echo "This is not super user. Please execute with sudo." >&2
  echo "--- End $(date "+%Y/%m/%d %k:%M:%S") ${0}"
  exit 1
fi

# ディレクトリ存在チェック
if [ -d $PWD/stress-check-master ]; then
  echo "stress-check-master directry already exists. Please backup first." >&2
  echo "--- End $(date "+%Y/%m/%d %k:%M:%S") ${0}"
  exit 1
fi

# 解凍するファイル名称
package_file="$PWD/${1-stress-check.tar.gz}"

# 解凍先（デプロイ元）のディレクトリ
target_dir=$PWD/stress-check-master

# tarファイルを解凍（stress-check-masterディレクトリが作成されなければならない）
tar -zxf $package_file



# ログの削除
rm -fr $target_dir/storage/logs/*.log
rm -fr $target_dir/storage/logs/nginx/*.log
# DBの削除
rm -fr $target_dir/storage/volumes/meilisearch # DBのVersionが合わない場合があるので、削除必須
rm -fr $target_dir/storage/volumes/mysql
rm -fr $target_dir/storage/volumes/redis

# アクセス権の制限
chgrp -R dev $target_dir
chmod -R g+rwx $target_dir
chgrp -R sail $target_dir/storage
chmod -R 770 $target_dir/storage # Othreユーザーは参照不可
chmod 774 $target_dir/storage

# WinSCPエラー対策（WinSCPはグループ所有のパーミッションに該当するとき、正しくアップロードはできるが、エラーメッセージが表示される。）
if [ $(getent passwd yoshida) != "" ];then
  chown yoshida $target_dir/resources/views/stresscheck/*.blade.php
fi

# 環境設定ファイルの変更
cp $target_dir/.env.staging $target_dir/.env



echo "IN:[$package_file], TARGET:[$target_dir]"
echo "--- End $(date "+%Y/%m/%d %k:%M:%S") ${0}"
