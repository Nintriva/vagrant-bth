#Setup Vagrant
vagrant up

#Edit host  /etc/hosts (for *nix only)  and add below line
192.168.56.101  awesome.dev www.awesome.dev

192.168.56.101  bth.dev www.bth.dev


#Go to vagrant root folder & clone to awesome folder
git clone git@github.com:Nintriva/businesstrainerhub.git awesome

cd awesome/

git checkout develop


#Copy data to vacant root folder


#Login to vagrant root
vagrant ssh

cd /var/www/awesome

export LC_ALL=C

sudo apt-get install -y autoconf g++ make openssl libssl-dev libcurl4-openssl-dev pkg-config libsasl2-dev libpcre3-dev

sudo pecl install mongo

#Copy Mongo
extension=mongo.so //(/etc/php5/mods-available/mongodb.ini)

sudo /etc/init.d/apache2 restart

sudo service php5-fpm restart

composer global require "fxp/composer-asset-plugin:~1.1.1"

composer install

php init


#You may need Git OAuth token (https://github.com/settings/tokens)

#Import Data
cd /var/www/awesome/data

mongorestore  . --db businesstrainerhub

#change 
main-local.php in (common,console,frontend,backend) 
params.php 

#Solr Update
/opt/solr/solr-4.10.2/bin/solr stop -all

// mkdir /usr/java

// ln -s /usr/lib/jvm/java-7-openjdk-amd64 /usr/java/default

sudo add-apt-repository ppa:openjdk-r/ppa

sudo apt-get update

sudo apt-get install openjdk-8-jdk

// sudo update-alternatives --config java
// sudo update-alternatives --config javac
cd /opt

wget http://archive.apache.org/dist/lucene/solr/6.0.0/solr-6.0.0.tgz

tar -xvf solr-6.0.0.tgz

cp -R solr-6.0.0 /opt/solr

cd /opt/solr

/opt/solr/bin/solr start -p 8984

cp -Rf /opt/solr/server/solr/configsets/basic_configs/conf/ /opt/solr/server/solr/businesstrainerhub/conf/

#Create core with name businesstrainerhub 
# Add filed 
curl -X POST -H 'Content-type:application/json' --data-binary '{
  "add-field":{
     "name":"latlon",
     "type":"location",
     "indexed":true,
     "multiValued":false,
     "stored":true }
}' http://localhost:8984/solr/businesstrainerhub/schema
