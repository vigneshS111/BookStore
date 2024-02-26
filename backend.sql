 create database bookStore;
 use bookStore;
 create table OWNER (USERNAME varchar(255),PASSWORD varchar(255));
 insert into OWNER values("ADMIN","admin@123");
  create table PRODUCT_INFO (PRODUCT_ID int, PRODUCT_NAME varchar(255), QUANTITY int ,PRICE varchar(255));