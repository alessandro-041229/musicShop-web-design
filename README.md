# MUSIC SHOP

this repository contains a finished project regarding an online website for a music shop,
which allows the users to buy the various songs copies for their own with a system for recharge their own
online wallet for the app.

at same time with a section dedicated to the administrators from which they will be able to 
edit and change the informations regarding the songs disponibility and even add new songs
or artists to the list of the ones already present.

# requisites


* to run the following program is necessary to utilize XAMPP.
XAMPP is a completely free and easy to install Apache distribution containing MySQL, PHP and Perl.
link to website for download: https://www.apachefriends.org/it/index.html


* the installation of heidiSQL to run the database and test it.
HeidiSQL is a free and open-source administration tool for MariaDB, MySQL, as well as Microsoft SQL Server, PostgreSQL and SQLite.
link to website for download: https://www.heidisql.com/

* as last, just utilize any program of choice who can run php, html, css code(visual studio as example) for visualize the main code behind the web site

# how to run

1. for start one must open the xampp controll panel for start up the control panel showed in the picture,
and as next step just press on start for both apache and SQL

![xampp controll panel](https://images.javatpoint.com/tutorial/xampp/images/xampp-control-panel12.png)

2. after you download the databse .sql you will have to open it on sql, you can do that by

2a. press on file on the top left

2b. select the file to upoload and upload it

2c. run the database so that it will get saved on the app

![SQL page](https://i0.wp.com/blogs.embarcadero.com/wp-content/uploads/2021/05/Screenshot-2021-05-23-195219-1775337.png?resize=707%2C437&ssl=1)

3. for last you will need to download all of the files within the Github repository and move them inside an unique folder alongside the database.

4. going back to the XAMPP control pannel you must press on the button 'admin' on the apache section for access and visualize the web sites contained 
in the 'local host' 

# Additional notes

all informations for the various logins can be found in the database where the accounts are listed
for access the database is necessary to open the application installed of hidelSQL after XAMPP is started up
once done that you can simply open the application and select the database to run and control


# how to use

1. it's based on a simple login interface, you can register new users when you want as a client
but administrators who can add and edit songs can be added only in the database directly
  * the credential for the first administrator are 'TEE03' as username and 'abcd.1234' as password

2. once runned upon loading credits you'll be able to buy musical discs or songs without trouble and as administrator you'll be able to add new products or singers
