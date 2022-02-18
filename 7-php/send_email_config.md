# HOW TO CONFIGURE SENDING E-MAIL VIA XAMPP

1. Open XAMPP installation directory (i.e. **C:\\xampp**)
2. Go to **C:\\xampp\\php** and open *php.ini* file
3. Find [mail function] by pressing CTRL+F
4. Search and pass the following values:
~~~
SMTP=smtp.gmail.com
smtp_port=587
sendmail_from=YourGmailId@gmail.com
sendmail_path="\"C:\xampp\sendmail\sendmail.exe\" -t"
~~~
5. Now, go to **C:\\xampp\\sendmail** and open *sendmail.ini* file.
6. Find [sendmail] by pressing CTRL+F
7. Search and pass the following values
~~~
smtp_server=smtp.gmail.com
smtp_port=587
error_logfile=error.log
debug_logfile=debug.log
auth_username=YourGmailId@gmail.com
auth_password=Your-Gmail-Password
force_sender=YourGmailId@gmail.com(optional)
~~~

# FIX *Google* PREVENTING LOGIN FROM XAMPP SERVER

You need to enable `Allow less secure apps: ON` in your gmail account.

1. Go to <a href="https://myaccount.google.com/security" target="_blank">Gmail account security</a>
2. Click on **Sign-in & Security**
3. Scroll down, there will be an option `Allow less secure apps` which is set to OFF by default, just turn on the setting and check
