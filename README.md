# JNU online judge
This website is based on [BNUOJ](https://github.com/51isoft/bnuoj/) project, which is originally developed by the BNU ACM-ICPC Team.

## Dependencies

**dispatcher** ：`mysql-devel` `libpthread`

**judger** : `libpthread` `gcc` `openjdk` `python2` `python3` and so on, depend on list of languages supported by the OJ

**vjudge** : `glib2.0` `re2-devel` `libcurl` `libjpeg` `htmlcxx` `libcrypto`

Take `htmlcxx` as an example:

> wget https://jaist.dl.sourceforge.net/project/htmlcxx/htmlcxx/0.86/htmlcxx-0.86.tar.gz  
cd ./htmlcxx-0.86  
./configure  
sudo make && make install  

## Configuration

### 0. Cloning the repo

> git clone https://gitlab.jnuacm.club/Semprathlon/jnuoj

### 1. Web service

> cd ./web  
curl -sS https://getcomposer.org/installer | php  
php composer.phar install

Prepare the `Nginx` and `Mysql` services and edit `config.php` (see `config.sample.php` as a reference).
> GRANT SELECT, INSERT, UPDATE, DELETE ON '[database]'.'*' TO '[username]'@'[hostname]' IDENTIFIED BY '[password]';  

### 2. Judger

Compile the source codes for the judger.
> cd ./judger  
./configure  
make

Create a user with limited privileges for the sake of local judging.
> sudo useradd [username]  
sudo passwd [username]  

Check for the UID of the user just created by
> awk -F: '/\/home/ {printf "%s:%s\n",$1,$3}' /etc/passwd  

Edit `config.ini` (see `config.sample.ini` as a reference) with the UID.

### 3. Dispatcher

Compile the source codes for the dispatcher.
> cd ./dispatcher  
./configure  
make

Edit `config.ini` (see `config.sample.ini` as a reference).

### 4. Vjudger

Do just as what to do with **dispatcher**.

## Quick Start

- Start **dispatcher**, **judger** and **vjudger** in the way of
> cd ./judger  
nohup ./src/judger&

- Launch `Nginx` and `Mysql` services.

## Notes

- Testdata are placed in the `testdata` under the directory of `judger`.

- Give the permission of `judger/tmpfile` to the judging user appropriately.