# PHP / Apache web stack vulnerable to Reflective XSS
NOTE: There is no DB attached to the web app which means you can put any username and password will.....bad security practice...I know ;)

# Purpose
- To understand the development side when identifying vulnerabilities in web applications
- Integrate on application security practices and web application developement

# Prerequisites
- Docker => ```docker --version``` to verify installation
- git => ```git --version``` to verify installation
- Visual Studio Code => code editor 
  NOTE: I used vi/vim for most of my coding for this repo

# Steps on how to run the container
- Download the repo => ```git clone https://github.com/p-cap/Php-Apache-Reflective-XSS.git```
- change the permissions on build-docker.sh => ```chmod 700 build-docker.sh```
- run the ```build-docker.sh```

# Synopsis
This repository contains not only php vulnerable code but also another version which sanitization is applied to mitigate such attack

# Usage
1. connect to ```http://localhost:8080/```
2. You'll start with the unsanitized version of the site
3. Put any username and password then click login
4. You'll be redirected to another page with a "WELCOME, $username"
5. The link *"Ready to be phished??"* will take you to another page which contains more links. The first link uses the script tag-alert combo to test if the site is vulnerable. The links contain html tags encoded differently to simulate a Reflective XSS attack
6. The *URL with url encoded HTML tags*, *URL encoded Link* and *Unicode* will redirect to another login page. The page is embedded in the links
7. When you enter you a username and password, those credentials are stored in a text file named *saved.txt*. The file simulates an attacker stealing usernames and passwords
8. Going to the home page, you can click on the last link that switches the site between the sanitized and unsanitized version of the site
9. You follow the same procedures but the difference is when you are redirected to the other login page, the page will show you that *you are not entering a username* 
