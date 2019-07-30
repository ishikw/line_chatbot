cd /docker-entrypoint-initdb.d/

# いつか必要になると思うので，インポートしたい時は下の用に書くと良いらしいです

# echo "import data1..."
# gzip -dc ./dump1.gz | mysql -h localhost -u root -ppassword -P 3306 test_db1
# 
# echo "import data2..."
# gzip -dc ./dump2.gz | mysql -h localhost -u root -ppassword -P 3306 test_db2

# echo "done."
