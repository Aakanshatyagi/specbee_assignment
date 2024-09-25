Requirements:
   Drupal Version: 10.3.5
   PHP: 8.2.13 
   Apache/2.4.54
   MySQL: 8.1.0
   Drush

Setup Steps:
    Clone the repository : git clone git@github.com:Aakanshatyagi/specbee_assingment.git
    Import the database : mysql -u <username> -p <database_name> < /path/to/db_dump.sql
    Run Composer Install
    drush cr

Finally:
    Access your Drupal site via a browser, ensuring that your Apache server is running and that your hosts file and virtual hosts (if set up) are correctly configured.
    Check for any issues in the logs and resolve any configuration problems.
