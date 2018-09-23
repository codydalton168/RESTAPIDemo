# RESTAPIDemo
REST API 表現層狀態轉換


直觀簡短的網址
傳輸的資源: JSON, XML, YAM。
資源的操作  POST，GET，PUT ，DELETE。


htaccess 配置規則


# 開啟重寫功能
Options +FollowSymlinks
RewriteEngine on

# 重寫規則
RewriteRule ^site/list/$   RestController.php?view=all [nc,qsa]
RewriteRule ^site/list/([0-9]+)/$   RestController.php?view=single&id=$1 [nc,qsa]
