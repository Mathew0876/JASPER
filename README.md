# JASPER
## Threat Modeling for Security Requirements Management
<p align="center">
  <img width="" height="" src="Logo.png">
</p>

The purpose of project JASPER is to generate security requirements from threat model diagrams created using the OWASP Threat Dragon Tool. The JASPER system serves as a management platform for the generated security requirements and provides tooling to further refine the requirements. The JASPER system is a stand alone application with features that include tracking completion status of requirements, user collaboration, and traceability. The target audience for the application includes engineers, security analysts, undergraduate and graduate students, and companies centered in the software security field.  The objective of this project is to streamline the elicitation and management of security requirements.


## Helpful links
Checkout the wiki: https://github.com/Mathew0876/JASPER/wiki  
Style Guide: https://www.php-fig.org/psr/psr-12/  
Git Branching Strategy: https://guides.github.com/introduction/flow/  
Jira https://jasper-project.atlassian.net/  
Laracast - must watch - https://laracasts.com/series/laravel-6-from-scratch

## Getting Started
### Installing
The first step in development was setting up the development environment. This included downloading and setting up Vagrant for managing virtual machines. At the start of the project Laravel recommended using a pre-configured Vagrant environment called Homestead when developing on Windows Devices. These instructions were followed to set up the virtual machines with virtual box: https://laravel.com/docs/8.x/homestead#introduction. Now Laravel installation guide recommends using Docker Desktop https://laravel.com/docs/8.x#getting-started-on-windows but this has not been tested. This was developed using Laravel 8.

### Building
After pulling the code and configuring the environment. Rename the `.env.example` to `.env`  
Modify the following lines to configure the database
```
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=jasper  
DB_USERNAME=    
DB_PASSWORD=  
````
To refresh the cache if dependences have not been modified and package-lock.json exists  
`npm ci`  
To seed the database with the requirement mapping data, first install the seeder  
`composer install`  
To compile tailwind and Laravel Mix after making changes to css files  
`npm run dev`  
Then populate the databse  
`php artisan db:seed`  

Now the application is ready to run!  

## Developers
[Mathew0876](https://github.com/Mathew0876)  
[sammytripp](https://github.com/sammytripp)  
[thatSoftwareGirl](https://github.com/thatSoftwareGirl)
