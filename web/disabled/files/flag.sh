#!/bin/sh

sed -i "s/TYCTF{test_flag}/$GZCTF_FLAG/" /var/www/html/flag.php


export GZCTF_FLAG=not_flag
GZCTF_FLAG=not_flag

rm -f /flag.sh