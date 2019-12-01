# Project Name

Entry Management Application 

## Installation

1.Download xampp software. <br />
2.After installation of the software go to the xampp folder->htdocs and create a new file named Entry Management Software.<br />
3.Copy the files index.php, check_in.php, check_out.php and dbcon.php to Entry Management Software file.<br />
4.Using the xampp software set up a server on the local computer.<br />
5.Open phpmyadmin on the local host in any browser and import the visitorandhost.sql file provided.This will setup the backend database and table required for the application.<br />
6.Now for configuration of email address required to send email go to xampp folder->php and replace the php.ini file in the folder with the php.in file provided.<br />
7.Similarly go to xampp folder->sendmail and replace the sendmail.ini file with the given sendmail.ini file this will make the required configurations for sending emails.<br />
8.Now open the index.php file on the localhost and the application is ready to be used.<br />

## Approach

In order to built the software four php pages are created named index.php, check_in.php, check_out.php and dbcon.php and a database table is created to store the information gathered from the frontend to the backend server.
Following are the discription of each page and the database:<br />

### Database
A table named visitorandhost is created in the database and has the following attributes:<br />
id(primary key) - to store the unique id.<br />
H_Name - to store the host's name.<br />
H_email - to store the host's email.<br />
H_number - to store host's number.<br />
V_Name - to store the visitor's name.<br />
V_email - to store the visitor's email.<br />
V_number - to store visitor's number.<br />
time - to store the time of check-in.<br />

### index.php
This is the index page and has two links one to the check in page if the visitor wants to check in and other to the check out page of the visitor wants to check out.

### check_in.php
-This page will take all the requiered information from visitor and if the user clicks check in then the php code will store all the information in variables and make the required message out of it and send an email to host informing him of the visit and then store the data in the data base along with the timestamp.<br />
-There is a link to go back to the home page.<br />
-Once checked in the visitor is directed to the index page.<br />

### check_out.php
-This page displays the information of checked in visitors in form of a table by using the data from the database.<br />
-The visitor can see his/her unique id from the table and enter the id along with a check out time.<br />
-This will trigger an email to the visitor with a message made by information from the database about the details of the visit.<br />
-Once the email is sent the data corresponding to the given id is deleted from the database.<br />
-Once checked out the user is redirected to the index page.<br />
-There is a link to go back to the home page.<br />

### dbcon.php
This page is included in check in and check out page and is used to setup a connection to the database.
