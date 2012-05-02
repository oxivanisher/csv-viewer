#!/bin/bash
ScpDst="USER@HOST:DIR"

DIR="/home/*/www_data/*"

OUT="/tmp/wwwsize-$(hostname).csv"

find $DIR -maxdepth 0 -type d -exec du -Lsb {} \; | while read LINE;
do
        if [ "$(echo $LINE | awk '{print $2}')" != "/home/lost+found" ];
        then
                echo $LINE | awk '{ print $1 ";" $2 }'
        fi
done > $OUT

scp $OUT $ScpDst >/dev/null 2>&1

