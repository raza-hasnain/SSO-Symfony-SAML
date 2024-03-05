# SSO-Symfony-SAML

Following are information to setup sp and idp server, code attached with email, please check and let me know if you need any help.

===============================================
https://sp.sso-saml.com/test_sp.php

Demo users:
Username: student
Password: studentpass

Username: employee
Password: employeepass
===============================================

Admin user in sp and idp servers

Username: admin
Password: raza123

============================================================
Host entries:

127.0.0.1 sp.sso-saml.com
127.0.0.1 idp.sso-saml.com
========================================================== 

=========================================vhost information (change the path accordingly)=========================================

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
