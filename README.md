# For the Part 1: Laravel Payment Processing it was created the database and  configured the file .env  
    - CREATE DATABASE databasename amortizationpaymentprocessing_db

# Then I created the migrations:
    -create_projects
    -create_amortizations
    -create_payments
    -create_promoters
    -create_profiles

 #  The Models:
  -Amortization
  -Payment
  -Project
  -Profile
  -Promoter 

  # The Controllers
  -Amortization
  -PaymentController (Where all the logic are implemented in the functions: payAmortizationsBeforeDate, sendDelayedPaymentEmails)

  # Also used the seeders tool to populate da database
  - seeds/TestSeeder.php

