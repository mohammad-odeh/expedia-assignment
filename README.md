# Expedia Assignment


## General Information
* This is an Expedia coding exercise.
* PHP Laravel (lumen) framework.

## Install and deploy on your local machine

If you are familiar with [Vagrant](https://www.vagrantup.com/) I really recommend using [Homestead Vagrant](https://laravel.com/docs/5.6/homestead), it will be much easy to setup your environment other wise you will have to make sure to install all requirements (php7.1,  Apache2 /Nginx, Composer, Git)

#### - [Homestead Vagrant Steps - building environment](https://laravel.com/docs/5.6/homestead)
-------------
1. ``git clone https://github.com/laravel/homestead.git ~/Homestead``
2. ``cd ~/Homestead``
3. ``git checkout v7.1.2``
4. ``bash init.sh``
5. ``vim Homestead.yaml`` (Change the configuration of folder in order to learn the vagrant which file to sync with your local machine)
6. Add the vagrant IP to /etc/hosts file on your mentioned (sudo vim /etc/hosts).

#### - Run Code
-------------
1. Download code to your local machine
2. Go to code source (``cd /var/www/$sitename``)
3. Connect to Vagrant if you used Vagrnat.
4. Run composer install (To load framework files)
5. Browse you website by using local domain you mentioned into hosts file.