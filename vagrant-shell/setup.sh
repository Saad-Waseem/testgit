 "Provisioning virtual machine..."
echo "Install Apache2"
sudo apt-get install -y apache2
echo "Updating PHP "
apt-get install python-software-properties build-essential -y
add-apt-repository ppa:ondrej/php5 -y
apt-get update > /dev/null
echo "Installing PHP"
apt-get install php5-common php5-dev php5-cli php5-fpm -y
echo "Install PHP extensions"
apt-get install curl php5-curl php5-gd php5-mcrypt php5-mysql -y
apt-get install debconf-utils -y
debconf-set-selections <<< "mysql-server mysql-server/root_password password saad"
debconf-set-selections <<< "mysql-server mysql-server/root_password_again password saad"
apt-get install mysql-server -y 
