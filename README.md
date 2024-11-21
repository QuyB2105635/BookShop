# BookShop


# Cấu hình vhost:
<VirtualHost *:80>	
    DocumentRoot "C:/xampp/htdocs" 
    ServerName localhost
</VirtualHost>


<VirtualHost *:80>    
    DocumentRoot "D:\NLCS_QUY\BookShop" 
    ServerName book-shop.localhost

    <Directory "D:\NLCS_QUY\BookShop"> 
        Options Indexes FollowSymLinks Includes ExecCGI
        AllowOverride All
        Require all granted
    </Directory>    
</VirtualHost>
