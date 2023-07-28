# Laravel Practice

<br/>

## Set ( docker compose )
1. Php v8.1
2. Laravel v10.15.0
3. Livewire v3

<br/>

## Installation
### lievewire3<br/>
1. install livewire3<br/>
composer require livewire/livewire:^3.0@beta<br/>

### volt<br/>
1. install volt<br/>
composer require livewire/volt:^1.0@beta<br/>
2. install Volt's service provider file<br/>
php artisan volt:install<br/>

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
1. object 는 component 로 pass 불가 => array 로 변경 후 전달 가능<br/>
2. volt - counter 동작 안함. 아마 바인딩이 안되는 것 같음.<br/>

<br/>

## 참고링크
[Docker]<br/>
[How to setup Laravel in Docker?](https://www.golinuxcloud.com/setup-laravel-in-docker/#Installing_Docker_on_Windows)<br/>

[Livewire3]<br/>
[Upcoming Livewire v3 Features and Changes](https://laravel-news.com/livewire-v3-features)<br/>
[Laravel Livewire V3 – Getting Started](https://ajaxray.com/blog/laravel-livewire-v3-getting-started/)<br/>
[livewire3 Components](https://livewire.laravel.com/docs/components)<br/>
[Volt](https://livewire.laravel.com/docs/volt)<br/>

[Xdebug]<br/>
[Setup Xdebug WITH DOCKER and debug in VSCode](https://www.youtube.com/watch?v=it7JQKPfWTU)<br/>

[API]<br/>
[Working with TMDb API in Laravel 9](https://blog.devops.dev/working-with-tmdb-api-in-laravel-9-4b4c578b75e4)<br/>
[GET Request Query Parameters](https://laravel.com/docs/10.x/http-client#get-request-query-parameters)<br/>




