# SEMultiCommands
Multi-message responses triggered by single command.

Multi-messages are by default limited to max 5 messages per pattern. You can increase it by modifying the SQL table and `/api/db.php` file.

## Installation
### Composer
Install dependencies using  `/api/composer.json`

### SQL Database
Create table using the [patternList.sql](../blob/main/patternList.sql) file

### Web server
Download the repository, place all the files in your desired destination.

Locate `/api/config.example.php` copy the file rename to `config.php` and fill your credentials as explained here:
* `$key` - random string used to prevent unwanted requests
* `$bearer` - Bearer token found [here](https://streamelements.com/dashboard/account/channels) (after clicking *"show secrets"*)
* `$db` - credentials for accessing database

## Usage
### Adding patters
**This build is still in beta, so only way to add patterns is directly through SQL database**
> Please bear in mind, that in future, pattern id will be 10 random characters

### Calling patterns
After you have successfully added pattern to your database, you can add command to StreamElements following this example:
```
${customapi.example.com/semulticommands/api/chat.php?key=75fBu4EP4U2YTTbh&pattern=jNACabNDNA}
```
