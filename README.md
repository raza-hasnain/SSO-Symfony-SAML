# SSO-Symfony-SAML

Following are information to setup sp and idp server, code attached with email, please check and let me know if you need any help.

https://sp.sso-saml.com/test_sp.php

**Demo users:**

===============================

Username: student

Password: studentpass

=================================

Username: employee

Password: employeepass

=====================================

Admin user in sp and idp servers

Username: admin
Password: raza123

===================================

Host entries:
````
127.0.0.1 sp.sso-saml.com

127.0.0.1 idp.sso-saml.com
````

======== vhost information (change the path accordingly) =========
````
<VirtualHost *:80>
   ServerName idp.sso-saml.com
   Redirect / https://idp.sso-saml.com
</VirtualHost>

<VirtualHost *:443>
   ServerName idp.sso-saml.com
   DocumentRoot "D:/xampp/htdocs/idp-simplesamlphp/www"
   ErrorLog "logs/idp-simplesamlphp-error.log"
   CustomLog "logs/idp-simplesamlphp-access.log" common
   SSLEngine On
   SSLCertificateFile "D:/xampp/htdocs/idp-simplesamlphp/cert/idp.crt"
   SSLCertificateKeyFile "D:/xampp/htdocs/idp-simplesamlphp/cert/idp.pem"
</VirtualHost>

<VirtualHost *:80>
   ServerName sp.sso-saml.com
   Redirect / https://sp.sso-saml.com
</VirtualHost>

<VirtualHost *:443>
   ServerName sp.sso-saml.com
   DocumentRoot "D:/xampp/htdocs/simplesamlphp/www"
   ErrorLog "logs/simplesamlphp-error.log"
   CustomLog "logs/simplesamlphp-access.log" common
   SSLEngine On
   SSLCertificateFile "D:/xampp/htdocs/simplesamlphp/cert/sp.crt"
   SSLCertificateKeyFile "D:/xampp/htdocs/simplesamlphp/cert/sp.pem"
</VirtualHost>
````

## Author Raza Hasnain

<div>
    <a href="https://github.com/aliraza170"><img src="https://avatars.githubusercontent.com/u/18546274?v=4" width="40" /></a>
</div>

## If you liked it then 

<a href="https://www.buymeacoffee.com/razadubai" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: 41px !important;width: 174px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>
