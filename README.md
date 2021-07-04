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
2. Put any username and password then click login
3. You'll be redirected to another page with a "WELCOME, $username"
4. The link "Ready to be phished??" will take you to another page which contains more links. The links serve as html tags encoded differently to simulate the Reflective XSS 
