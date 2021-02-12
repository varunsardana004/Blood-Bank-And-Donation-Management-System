create database blood_donation; /* creating database*/
use blood_donation;

/*create table donor_details in which all donor information gets stored.*/
create table donor_details(
donor_id int auto_increment NOT NULL,
donor_name varchar(50) NOT NULL,
donor_number varchar(10) NOT NULL,
donor_mail varchar(50),
donor_age int(60) NOT NULL,
donor_gender varchar(10) NOT NULL,
donor_blood varchar(10) NOT NULL,
donor_address varchar(100) NOT NULL,
Primary key(donor_id)
);
/*create table admin_info in which all admin information gets stored.*/
create table admin_info(
admin_id int(10) NOT NULL UNIQUE AUTO_INCREMENT,
admin_name varchar(50) NOT NULL,
admin_username varchar(50) NOT NULL UNIQUE,
admin_password varchar(50) NOT NULL,
Primary key(admin_id)
);

/*  insert admin data into admin_info table*/
insert into admin_info(admin_name,admin_username,admin_password)
values("Varun","varunsardana004",123);

/*create table blood in which all blood group is stored.*/
create table blood(
blood_id int auto_increment Not Null,
blood_group varchar(10) NOT NULL,
primary key(blood_id)
);

/* insert all blood groups*/
insert into blood(blood_group)
values("B+"),("B-"),("A+"),("O+"),("O-"),("A-"),("AB+"),("AB-");


/*create table pages in which all pages information gets stored.*/
create table pages(
page_id int NOT NULL auto_increment UNIQUE,
page_name varchar(255) NOT NULL,
page_type varchar(255) NOT NULL,
page_data longtext NOT NULL
);
ALTER TABLE pages
MODIFY COLUMN page_type varchar(50) UNIQUE;

/*create table contact_info in which your site contact information is stored.*/
create table contact_info(
contact_id int auto_increment Not Null,
contact_address varchar(100) NOT NULL,
contact_mail varchar(50) NOT NULL,
contact_phone varchar(100) NOT NULL,
primary key(contact_id)
);

insert into contact_info(contact_address,contact_mail,contact_phone)
values("Hisar,Haryana(125001)","bloodbank@gmail.com","7056550477");



INSERT INTO pages (page_id, page_name, page_type, page_data) VALUES
(2, 'Why Become Donor', 'donor', '<span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">Blood is the most precious gift that anyone can give to another person — the gift of life. A decision to donate your blood can save a life, or even several if your blood is separated into its components — red cells, platelets and plasma — which can be used individually for patients with specific conditions. Safe blood saves lives and improves health. Blood transfusion is needed for:
1)women with complications of pregnancy, such as ectopic pregnancies and haemorrhage before, during or after childbirth.
2)children with severe anaemia often resulting from malaria or malnutrition.
3)people with severe trauma following man-made and natural disasters.
4)many complex medical and surgical procedures and cancer patients.
It is also needed for regular transfusions for people with conditions such as thalassaemia and sickle cell disease and is used to make products such as clotting factors for people with haemophilia. There is a constant need for regular blood supply because blood can be stored for only a limited time before use. Regular blood donations by a sufficient number of healthy people are needed to ensure that safe blood will be available whenever and wherever it is needed.</span>'),
(3, 'About Us ', 'aboutus', '<span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;">Blood bank is a place where blood bag that is collected from blood donation events is stored in one place. The term “blood bank” refers to a division of a hospital laboratory where the storage of blood product occurs and where proper testing is performed to reduce the risk of transfusion related events . The process of managing the blood bag that is received from the blood donation events needs a proper and systematic management. The blood bag must be handled with care and treated thoroughly as it is related to someone’s life. The development of Web-based Blood Bank And Donation Management System (BBDMS) is proposed to provide a management functional to the blood bank in order to handle the blood bag and to make entries of the individuals who want to donate blood and who are in need.</span>');



INSERT INTO pages (page_id, page_name, page_type, page_data) VALUES
(4, 'The Need For Blood', 'needforblood', '<span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;">There are many reasons patients need blood. A common misunderstanding about blood usage is that accident victims are the patients who use the most blood. Actually, people needing the most blood include those:
1) Being treated for cancer<br>
2) Undergoing orthopedic surgeries<br>
3) Undergoing cardiovascular surgeries<br>
4) Being treated for inherited blood disorders</span>');

INSERT INTO pages (page_id, page_name, page_type, page_data) VALUES
(5, 'Blood Tips', 'bloodtips', '<span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;">
1) You must be in good health. <br>
2) Hydrate and eat a healthy meal before your donation.<br>
3) You’re never too old to donate blood. <br>
4) Rest and relaxed.<br>
5) Don’t forget your FREE post-donation snack. 
</span>'),
(6, 'Who you could Help', 'whoyouhelp', '<span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;">
Every 2 seconds, someone in the World needs blood. Donating blood can help:

1) People who go through disasters or emergency situations.<br>
2) People who lose blood during major surgeries.<br>
3) People who have lost blood because of a gastrointestinal bleed.<br>
4) Women who have serious complications during pregnancy or childbirth.<br>
5) People with cancer or severe anemia sometimes caused by thalassemia or sickle cell disease.<br>
</span>');
INSERT INTO pages (page_id, page_name, page_type, page_data) VALUES
('7','Blood Groups','bloodgroups','<span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;">
  <p>  Blood group of any human being will mainly fall in any one of the following groups.</p>
                <ul>

                  <li>A positive or A negative</li>
                  <li>B positive or B negative</li>
                  <li>O positive or O negative</li>
                  <li>AB positive or AB negative.</li>
                </ul>
                <p>Your blood group is determined by the genes you inherit from your parents.<br>
                  A healthy diet helps ensure a successful blood donation, and also makes you feel better!
                </p>

</span>'),
('8','Universal Donors And Recepients','universal','<span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;">
  <p>
The most common blood type is O, followed by type A.

Type O individuals are often called "universal donors" since their blood can be transfused into persons with any blood type. Those with type AB blood are called "universal recipients" because they can receive blood of any type.</p>

            For emergency transfusions, blood group type O negative blood is the variety of blood that has the lowest risk of causing serious reactions for most people who receive it. Because of this, it\'s sometimes called the universal blood donor type.

</span>');


update pages
set page_data='<span style="color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;">Blood is the most precious gift that anyone can give to another person — the gift of life. A decision to donate your blood can save a life, or even several if your blood is separated into its components — red cells, platelets and plasma — which can be used individually for patients with specific conditions. Safe blood saves lives and improves health. Blood transfusion is needed for:
<ul><li>women with complications of pregnancy, such as ectopic pregnancies and haemorrhage before, during or after childbirth.
</li><li>children with severe anaemia often resulting from malaria or malnutrition.
</li><li>people with severe trauma following man-made and natural disasters.
</li><li>many complex medical and surgical procedures and cancer patients.</li></ul>
<br>It is also needed for regular transfusions for people with conditions such as thalassaemia and sickle cell disease and is used to make products such as clotting factors for people with haemophilia. There is a constant need for regular blood supply because blood can be stored for only a limited time before use. Regular blood donations by a sufficient number of healthy people are needed to ensure that safe blood will be available whenever and wherever it is needed.</span>'
    where page_type="donor";
    
    
    /*create table contact_query in which all querier inforamation gets stored.*/
create table contact_query(
query_id int auto_increment Not Null,
query_name varchar(100) NOT NULL,
query_mail varchar(120) NOT NULL,
query_number char(11) NOT NULL,
query_message longtext NOT NULL,
query_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
query_status int(11) DEFAULT NULL,
Primary key(query_id)
);    
alter table contact_query modify column query_date
timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;


insert into contact_query (query_name,query_mail,query_number,query_message) values
("Anuj","anuj@gmail.com","9923471025","I need O+ Blood.");

update contact_query set query_status="1" where query_id="1";

/*create table query_stat in which query status is stored.*/
CREATE TABLE query_stat(
  id INT NOT NULL Unique,
 query_type VARCHAR(45) NOT NULL,
  PRIMARY KEY (id)
  );
  
  
  insert into query_stat(id,query_type)
  values('1',"Read"),
  ('2',"Pending");
  
