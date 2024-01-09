# Assignment || PHP Developer


## Features

- **Screening Form:**
   - Captures the following information:
      1. Subject’s first name
      2. Subject’s date of birth
      3. Frequency of migraine headaches (Monthly, Weekly, Daily)
      4. Daily frequency of migraine headaches (1-2, 3-4, 5+) - only if the response to question 3 is 'Daily'
   - Includes a 'Submit' button.

- **Eligibility Logic:**
   - If the subject is under 18 years of age, they are ineligible and shown the message 'Participants must be over 18 years of age.'
   - If the applicant is over 18 years of age and experiences monthly or weekly migraine headaches, they are eligible and assigned to Cohort A.
   - If the applicant is over 18 years of age and experiences daily migraine headaches, they are eligible and assigned to Cohort B.

- **Results Page:**
   - Displays the subject’s eligibility and cohort assignment based on the rules mentioned above.

- **Database:**
   - Stores entered screening data and results.
  
## Getting Started

Follow these steps to set up your development environment:

1. Clone this repository to local machine:
   ```
   git clone https://github.com/deeppanara/laravel-assignment-deep.git
   ```
2. Navigate to the project directory:
    ```
    cd laravel-assignment-deep
    ```
3. Start the Docker containers:
    ```
    docker-compose up -d
    ```
5. Access your Laravel application in your web browser at `http://localhost:8080`.


6. Access the terminal within the `laravel-php` container:
    ```
    docker-compose exec laravel-php bash
    ```

7. Run `composer install` to install Laravel's dependencies.

8. After the installation is complete, exit the container's terminal:
    ```
    exit
    ```

Now, your Laravel project should be up and running on port 8080. You can access it in your web browser at `http://localhost:8080`.

## Pages And Content

### **Access the Screening Form:**

- Visit [http://localhost:8080/screening/form](http://localhost:8080/screening/form) to access the screening form.

### **View Screening Data:**

- Visit [http://localhost:8080/screening/process](http://localhost:8080/screening/process) to view a result of screening data.

### **Access all Screening Data:**

- Visit [http://localhost:8080/screenings](http://localhost:8080/screenings) to view old screening data.
