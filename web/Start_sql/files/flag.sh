#!/bin/sh

# 说明： 如果需要将FLAG写到数据库，可以在下面去掉注释，并调整位置
mysql -e "USE tyctf;UPDATE user SET password=$GZCTF_FLAG where username='sql_select'" -uroot -proot
# 其中，qsnctf是数据库名称，user是表名称，password、id均为字段。


echo $GZCTF_FLAG > /flag

export GZCTF_FLAG=not_flag
GZCTF_FLAG=not_flag

rm -f /flag.sh