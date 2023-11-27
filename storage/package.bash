#!/bin/bash

######################################################################
# Laravelプロジェクトを、tarファイルにまとめて、カレントディレクトリに出力する。
# 利用例） sudo ./stress-check/storage/package.bash out_package.tar.gz

echo "--- Start $(date "+%Y/%m/%d %k:%M:%S") $0 $@"

# 実行ユーザーの確認
if [ ${EUID:-${UID}} != 0 ]; then
  echo "This is not super user. Please execute with sudo." >&2
  echo "--- End $(date "+%Y/%m/%d %k:%M:%S") ${0}"
  exit 1
fi

# 出力するファイル名称
out_file="$PWD/${1:-stress-check.tar.gz}"
# 圧縮するディレクトリ（package.sbash -> /home/sasaki/laravel/stress-check/storage -> /home/sasaki/laravel/stress-check）
target_dir=$(cd $(dirname $0); cd ..; pwd)

# tarファイルを作成
#tar -zcf $out_file --exclude='*/storage' --exclude='*/vendor' --exclude='*/node_modules' $(basename $target_dir)
tar -zcf $out_file $(basename $target_dir)

# 解凍用Shellをコピー
cp $target_dir/storage/deploy.bash $(dirname $out_file)

echo "IN:[$target_dir], OUT:[$out_file]"
echo "--- End $(date "+%Y/%m/%d %k:%M:%S") ${0}"
