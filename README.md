## 這是啥？

本專案已整合了新北市 OpenID 登入，實作了基本身分驗證系統。

- 本機帳號登入
- 新北市 OpenID 登入，初次登入時會建立本機帳號，密碼隨機產生

-----

### 系統需求

- PHP 建議使用 8.0.11 以上

-----

### 使用方式

以下 `FOLDER_NAME` 自行替換成想要的資料夾名稱

- 執行 `git clone https://github.com/t301000-laravel/laravel-ntpcopenid-skeleton.git FOLDER_NAME`
- `cd FOLDER_NAME`
- 將 `.env.example` 複製為 `.env` 並修改資料庫或其他設定
- 執行 `composer install`
- 執行 `php artisan key:generate`
- 執行 `php artisan migrate --seed`
