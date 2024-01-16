

# 系統畫面

## ◆會員 首頁
<a href="https://imgur.com/FXSG5A0"><img src="https://i.imgur.com/FXSG5A0.jpg" title="source: imgur.com" /></a>

## ◆會員查看商品資訊
<a href="https://imgur.com/9F4a8VX"><img src="https://i.imgur.com/9F4a8VX.jpg" title="source: imgur.com" /></a>
## ◆會員查看商品內容
<a href="https://imgur.com/ljWdVzx"><img src="https://i.imgur.com/ljWdVzx.jpg" title="source: imgur.com" /></a>


## ◆管理員 會員控制
<a href="https://imgur.com/N50u98b"><img src="https://i.imgur.com/N50u98b.jpg" title="source: imgur.com" /></a>
## ◆管理員 商品新增
<a href="https://imgur.com/bufIWeh"><img src="https://i.imgur.com/bufIWeh.jpg" title="source: imgur.com" /></a>
<a href="https://imgur.com/yJlpsOs"><img src="https://i.imgur.com/yJlpsOs.jpg" title="source: imgur.com" /></a>
## ◆管理員 商品修改
<a href="https://imgur.com/qjTw242"><img src="https://i.imgur.com/qjTw242.jpg" title="source: imgur.com" /></a>
## ◆管理員 商品刪除
<a href="https://imgur.com/N0ihkzx"><img src="https://i.imgur.com/N0ihkzx.jpg" title="source: imgur.com" /></a>
<a href="https://imgur.com/5Zs7oLu"><img src="https://i.imgur.com/5Zs7oLu.jpg" title="source: imgur.com" /></a>
# 系統名稱及作用
點餐系統
- 可以在上點餐
# 系統的主要功能與負責的同學
3B032062 陳逸達
3B032063 林昱均

- Route::get('/home', [HomeController::class, 'index'])->name('home.index');

- Route::get('/product',[ProductController::class,'index'])->name('product.index');
- Route::get('/product/{product}',[ProductController::class, 'show'])->name('product.show');
- Route::get('/',function (){
return view('product.index');
});
- Route::get('/product/index',function (){
return view('product.index');
})->name('product.index');
- Auth::routes();
## ERD
<a href="https://imgur.com/pHHDta6"><img src="https://i.imgur.com/pHHDta6.png" title="source: imgur.com" /></a>

## 關聯式綱要圖
<a href="https://imgur.com/KF5tbBd"><img src="https://i.imgur.com/KF5tbBd.png" title="source: imgur.com" /></a>

## 資料表欄位設計
<a href="https://imgur.com/eZnG3FY"><img src="https://i.imgur.com/eZnG3FY.png" title="source: imgur.com" /></a>
<a href="https://imgur.com/JTtDpWl"><img src="https://i.imgur.com/JTtDpWl.png" title="source: imgur.com" /></a>
<a href="https://imgur.com/jY2WrcP"><img src="https://i.imgur.com/jY2WrcP.png" title="source: imgur.com" /></a>

## 使用套件
- laravel/breeze:使用者登入登出，資料驗證
- encore/laravel-admin：網站後台建立
## 系統復原步驟
1. 複製 git@github.com:WISD-2023/final-06.git

   打開 cmder，進入www，輸入git clone git@github.com:WISD-2023/final-06.git
2. cmder輸入以下命令，復原專案
    - composer install
    - composer run-script post-root-package-install
    - composer run-script post-create-project-cmd 
    - npm install
    - npm run build
3. 修改.env檔案
    - DB_CONNECTION=mysql
    - DB_HOST=127.0.0.1
    - DB_PORT=33060
    - DB_DATABASE=final06
    - DB_USERNAME=root
    - DB_PASSWORD=root
4. 復原DB/建立資料庫
    - php artisan migrate


## 系統開發人員與工作分配
- 3B032062 陳逸達：路由設計、商品前台顯示、某一商品資訊、管理人員新增修改刪除
- 3B032063 林昱均：資料表設計、商品新增修改刪除、首頁
