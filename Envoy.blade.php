@servers(['mani'=>['deploy@161.35.126.169']])

@setup
$dir="/var/www/html/electronicworks"
@endsetup

@story('full-deploy')
site-down
git
backend
frontend
site-up

@endstory

@story('backend-deploy')
site-down
git
backend
site-up
@endstory

@story('frontend-deploy')
site-down
git
frontend
site-up
@endstory

@task('site-down')
cd {{$dir}}
php artisan down
@endtask

@task('git')
cd {{$dir}}
git checkout master
git pull
@endtask

@task('backend')
cd {{$dir}}
composer install --no-dev --ignore-platform-reqs --no-interaction --no-plugins --no-scripts --no-progress --no-suggest --optimize-autoloader
php artisan migrate --force
php artisan cache:clear
php artisan config:cache

@endtask

@task('frontend')
cd {{$dir}}
source ~/.nvm/nvm.sh
npm install --production
npm run production

@endtask

@task('site-up')
cd {{$dir}}
php artisan up
@endtask
