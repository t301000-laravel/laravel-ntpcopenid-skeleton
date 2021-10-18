## 這是啥？

本專案已整合了新北市 OpenID 登入，實作了基本身分驗證系統。

- 本機帳號登入
- 新北市 OpenID 登入，初次登入時會建立本機帳號，密碼隨機產生

-----

### 系統需求

- PHP 建議使用 8.0.11 以上

-----

### 使用方式

- 執行 `git clone https://github.com/t301000-laravel/laravel-ntpcopenid-skeleton.git`
- 將 `.env.example` 複製為 `.env` 並修改資料庫設定
- 執行 `composer install`
- 執行 `php artisan key:generate`
- 執行 `php artisan migrate --seed`
