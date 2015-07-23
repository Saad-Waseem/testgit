 "files can be accessed at"
for filename in /var/www/in.php;
do
  echo $(basename $filename)
done;
