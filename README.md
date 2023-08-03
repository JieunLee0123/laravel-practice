# Laravel Practice

<br/>

## Set 
1. Php v8.1
2. Laravel v10.15.0
3. Livewire v3

<br/>

## Installation
### docker compose<br/>
1. docker-compose up -d<br/>

### permission<br/>
1. chmod -R 777 storage/<br/>

### env<br/>
1. .env.example -> .env
2. add TMDB_ENDPOINT / TMDB_APP_KEY to .env

### generate app key<br/>
1. php artisan key:generate<br/>

### lievewire3<br/>
1. install livewire3<br/>
composer require livewire/livewire:^3.0@beta<br/>

### volt<br/>
1. install volt<br/>
composer require livewire/volt:^1.0@beta<br/>
2. install Volt's service provider file<br/>
php artisan volt:install<br/>

### folio<br/>
1. install folio<br/>
composer require laravel/folio:^1.0@beta<br/>
2. install folio's service provider file<br/>
php artisan folio:install<br/>

### livewire-charts<br/>
1. install livewire-charts<br/>
composer require asantibanez/livewire-charts<br/>
2. install livewire-charts's service provider file<br/>
php artisan livewire-charts:install<br/>

<br/>

## Practice Livewire3
1. Making a Livewire component<br/>
  1-1. class 생성 - 데이터 전달 - app/Livewire<br/>
  1-2. blade 생성 - 뷰 - resources/views/livewire<br/>
  1-3. route 생성 - 렌더링 - routes<br/>

<br/>

## Practice Server Side Render
[TALL Stack Practices](https://www.notion.so/benefitplus/TALL-Stack-Practices-76bf47c8e49043ea9363acb3d7032620)<br/>
[TMDB - Movie API](https://developer.themoviedb.org/docs)<br/>
1. Get API Key
2. Configure .env file
3. Configure service file
4. Create Routes
5. Create Controller File
6. Create Demo Blade View File

<br/>

## 트러블 슈팅
1. object 는 component 로 pass 불가 => array 로 변경 후 data 전달 가능<br/>
2. volt - component 로만 사용가능<br/>
3. reactive props - 하위 컴포넌트로 업데이트된 데이터를 전달할 때,<br/>
  [#[Reactive]](https://livewire.laravel.com/docs/nesting#reactive-props) 를 사용하면 된다고 나와있지만, 작동하지 않음.<br/> [key="{{ Str::random() }}"](https://github.com/livewire/livewire/discussions/2097)을 적용하여 해결함.

<br/>

## 참고링크
[Docker]<br/>
[How to setup Laravel in Docker?](https://www.golinuxcloud.com/setup-laravel-in-docker/#Installing_Docker_on_Windows)<br/>

[Livewire3]<br/>
[Upcoming Livewire v3 Features and Changes](https://laravel-news.com/livewire-v3-features)<br/>
[Laravel Livewire V3 – Getting Started](https://ajaxray.com/blog/laravel-livewire-v3-getting-started/)<br/>
[livewire3 Components](https://livewire.laravel.com/docs/components)<br/>
[Volt](https://livewire.laravel.com/docs/volt)<br/>
[Charts in Livewire 3 & Volt & folio](https://nunomaduro.com/charts_in_livewire_3_and_volt)<br/>

[Xdebug]<br/>
[Setup Xdebug WITH DOCKER and debug in VSCode](https://www.youtube.com/watch?v=it7JQKPfWTU)<br/>

[API]<br/>
[Working with TMDb API in Laravel 9](https://blog.devops.dev/working-with-tmdb-api-in-laravel-9-4b4c578b75e4)<br/>
[GET Request Query Parameters](https://laravel.com/docs/10.x/http-client#get-request-query-parameters)<br/>




