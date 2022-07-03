## About Laravel Security Api

Laravel Security API is a small API application using the Laravel framework. The API has two functions: to verify the employees who enter the building and obtain the cardholder information. The authentication API is required for providing SIP and RFID card numbers. SIP is used to simulate the office with a static IP address. Only those who set up SIP can make post request, so as to avoid hackers sending spam or gaining access. I have added a restriction on the authentication API request that employees will not be able to enter from one building to another within 10 minutes. I don't think anyone could be able to travel between two locations within 10min.

As this is a security system, the request per minute could be restricted based on office staff (e.g 100 request  per min).  Will the company consider when staff leave the site?


## User Story

As a developer in the USA.
I want to access to The Benjamin Franklin building office in USA. 
So that I can work in the office.

Acceptance Criteria:
- User able to access to the build provided with RFID card number and location SIP
- User able to access location if department are associated
- User unable to use the same RFID card to access different building within 10min

As a Staff Security.
I want to know who is the own of the lost RFID card.
So that I can return the card to.

Acceptance Criteria:
- Security able to access to the RFID card number and able to view the card holder information (user name and departement details)


# CRUD
| Verb | Path | Action | Route Name
| :---:   | :-: | :-: | :-: |
| GET | /api/getCardHolderInfo | getCardHolderInfo | Access.getCardHolderInfo
| GET | /api/authentication/cn={rfid}&ip={location_ip} | authentication | Access.authentication

# Used
- Laravel 8
- PHP 7.4
- mysql 5.7.22
- XAMPP v3.2.4

## Installation
1. extra zip file then go into the extra the project folder
2. Copy .env.example to .env
2. Once the Database has been connected (Detail can be found .env)
3. Open a new terminal migrate database [php artisan migrate:fresh --seed]
6. then run command on terminal start the Laravel server [php artisan serve]

## Testing
1. I have created a phpunit test on tests/Feature/AuthenticationTest.php and CardHolderInfoTest
Run command in termal with the project folder [php vendor/bin/phpunit]
