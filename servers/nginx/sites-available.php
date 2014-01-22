# Simple sample config for a php site using nginx and php5-fpm

server {
    # Adjust this to allow for different size file uploads
    client_max_body_size 10M;
    listen 80;
    
    # XXX: Change this
    root /path/to/public_html/folder/www
    
    index index.php index.html index.htm;

    # XXX: Change this
    server_name domainname.com www.domainname.com;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
    }

    location / {
        try_files $uri $uri/ /index.php;
    }
}

