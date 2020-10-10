# Hub (extend git commands)
alias git=hub

# Directories
alias ll='ls -FGlAhp'
alias ..="cd ../"
alias ...="cd ../../"
alias ....="cd ../../../"
alias .....="cd ../../../../"

alias df="df -h"
alias diskusage="df"
alias fu="du -ch"
alias folderusage="fu"
alias tfu="du -sh"
alias totalfolderusage="tfu"

alias finder='open -a 'Finder' .'

# Vagrant
alias vagrantgo="vagrant up && vagrant ssh"
alias vgo="vagrantgo"
alias vhalt="vagrant halt"
alias vreload="vagrant reload && vgo"

# PHP
alias c='composer'
alias cr='composer require'
alias cda='composer dumpautoload'
alias co='composer outdated --direct'
alias update-global-composer='cd ~/.composer && composer update'
alias composer-update-global='update-global-composer'

alias a='php artisan'
alias pa='php artisan'
alias phpa='php artisan'
alias art='php artisan'
alias amakecontroller='php artisan make:controller'
alias serve='npm run dev & php artisan serve'
alias serve80='npm run dev & php artisan serve --port 80 '
alias servenet='npm run dev & php artisan serve --host 192.168.1.10 --port 80'

# PHP - Laravel
alias ammigration='php artisan make:migration' ;#Create_nombre_table
alias amseeder='php artisan make:seeder'       ;#NombreTableSeeder
alias aseed='php artisan db:seed'              ;#Carga la informacion en las tablas,borrando primero la información anterior para insertar la nueva
alias amigrate='php artisan migrate'           ;#Ejecutar migraciones pendientes
alias amrollback='php artisan migrate:rollback';#Devuelve las ultima migracion, si son varios se debe especificar la cantidad
alias amreset='php artisan migrate:reset'      ;#Eliminar todas las tablas
alias amrefresh='php artisan migrate:refresh'  ;#Eliminar y crea de nuevo todas las tablas
alias amestado='php artisan migrate:status'    ;#Ver que migraciones han sido realizadas a la BD
alias appkey='php artisan key:generate'        ;#genera la APP_KEY en el archivo .env
alias routes='php artisan route:list'          ;#Lista todas las rutas creadas
alias laravel_clean='php artisan cache:clear & php artisan view:clear & php artisan config:cache'          ;#Limpia la los archivos cache de Laravel


alias test='vendor/bin/phpunit';

alias y='yarn'
alias yr='yarn run'

# Homestead
alias edithomestead='open -a "Visual Studio Code" ~/Homestead/Homestead.yaml'
alias homesteadedit='edithomestead'
alias dev-homestead='cd ~/Homestead && vgo'
alias homestead-update='cd ~/Homestead && vagrant box update && git pull origin master'
alias update-homestead='homestead-update'

# Variado
alias editaliases='open -a "Visual Studio Code" ~/.bash_aliases'
alias showpublickey='cat ~/.ssh/id_ed25519.pub'
alias ip="curl icanhazip.com"
alias localip="ifconfig | grep -Eo 'inet (addr:)?([0-9]*\.){3}[0-9]*' | grep -Eo '([0-9]*\.){3}[0-9]*' | grep -v '127.0.0.1'"
alias copy='rsync -avv --stats --human-readable --itemize-changes --progress --partial'

alias djserver='python manage.py runserver'







# Functions
mkcdir ()
{
    mkdir -p -- "$1" &&
    cd -P -- "$1"
}

function homestead() {
    ( cd ~/Homestead && vagrant $* )
}





