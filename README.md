Lucky Draw System

Welcome to my Lucky Draw System.

If you are new, 
There are few steps to kick start the application:
1. Clone the project to your local
2. Setup your environment (.env file)
3. Run `php artisan migrate --seed`
4. Login with the credentials given below.

If you cloned the project and ran the migration before,
There are little different steps for you:
1. Pull the latest changes
2. Run `php artisan migrate:refresh --seed`
3. Login with the credentials given below.

Login credentials:
1. Admin
  Email: `admin@test.com`
  Password: `password`
  
2. Member
  Email: `john@test.com`
  Password: `password`
  
Only 3 to 4 steps then you are good to go! 

Hope you enjoy the system! Thank you!

The functionalities including:
1. Admin
  - able to login and draw the winner among the users randomly
  - able to reset the draw result and draw again
  - able to specify the winner's number
  
2. Member
  - able to login to the system
  - able to enter a new winning number

3. Both
  - able to view the result in the first page
