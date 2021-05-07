# StudySounds
### Music Catalog for Activity Based Genres
Created a project for INFO2300, Intermediate Design and Programming for the Web, at Cornell University. I created front and backend website to support tagging, login/logout, file upload. 
Website supports tagging new entries, filtering through catalog by tag and tagging existing entries. Within the information page, you can edit existing entries, delete tags, delete entries and upload new entries.
To operate as administrator (upload, edit, delete) you must be logged in. The generic logins are situated in init.sql, (username: asa277, password: monkey).

Home Page Functionality
* Creating new tags
* Tagging existing entries
* Filter catalog by tags

Upload Page Functionality
* View song specific page
* Edit existing entries
* Delete existing entries
* Upload new entries (file upload)

Implemented server side form validation for all forms and form elements within the web page. The hard code of the webpage is done in HTML and dynamic accessibility is done in PHP. The SQL database is intitialized in init.sql and can be viewed in browsers that support SQLite.
Login/Logout supports cookies and sessions, for users to remain logged in within a certain time frame. The SQL database tables initialize the user information, the song information, the tag information and foreign key (song_tags) to link tags to songs. SQL queries were written using SQL JOINS to access tag information. Other SQL queries were used to query database, update information, delete entries and check element validity.
