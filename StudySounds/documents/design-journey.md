# Project 3: Design Journey

Be clear and concise in your writing. Bullets points are encouraged.

**Everything, including images, must be visible in Markdown Preview.** If it's not visible in Markdown Preview, then we won't grade it. We won't give you partial credit either. This is your warning.


## Design Plan

### Project 1 or 2
> Do you plan to reuse your Project 1 or 2 site?
> Which project?

No, I do not plan on re-using Project 1 or Project 2.

> If yes, please include sketches of the site's current design (you may copy the "final" sections from those assignments.)

N/A


### Describe your Media Catalog (Milestone 1)
> What will your collection be about?
> What type of media will your site display? (images, videos, audio)

My collection will be about a public forum for people to add share and tag study songs for different types of studying (reading, studying, memorization, background music, focus, relax). My media will support images of song album covers files and information about the song.


### Audiences (Milestone 1)
> Briefly explain your site's audiences. Be specific and justify why each audience is appropriate for your site.
> You are required to have **two** audiences: "information consumers" and "site administrators"

Information Consumer: The audience for the information consumer is for high school, college and graduate students looking for good music when they study. This could be anybody in school, or studying for a exam/assignment/project who listens to music while they prepare. This audience is appropriate for this website because the catalog will support album covers and information about each song. Information consumers will be able to participate in the forum by being able to tag, create tags and filter by tags of songs. While information consumers will not be able to upload or delete, they will be still be able to access the song titles and filter by the various tag selections.

Site Administrator: The audience for the site administrator is for people that desire and support a catalog for good study songs/host of StudySound website. This audience is specifically looking for the overall great song selections by tags and wants to administer the site to ensure all entries are clean and correctly populated. This audience is appropriate because this persona will be able to edit entries, upload entries, delete entries and delete tags. That way they can ensure that the catalog is sufficiently populated and clean.


### Personas (Milestone 1)
> Your personas must have a name and a "depiction". This can be a photo of a face or a drawing, etc.
> There is no required format for the persona.
> You may type out the persona below with bullet points or include an image of the persona. Just make sure it's easy to read the persona when previewing markdown.
> Your personas should focus on the goals, obstacles, and factors that influence behavior of each audience.

> Persona for your "consumer" audience:

![Mac](/documents/mac-persona.png)
![Mac Persona](/documents/personafile-mac.jpg)


> Persona for your "administrator" audience:

![Daniel](/documents/Daniel-persona.png)
![Daniel](/documents/personafile-daniel.jpg)

### Site Design (Milestone 1)
> Document your _entire_ design process. **We want to see iteration!**
> Show us the evolution of your design from your first idea (sketch) to the final design you plan to implement (sketch).
> Show us the process you used to organize content and plan the navigation, if applicable (card sorting).
> Plan your URLs for the site.
> Provide a brief explanation _underneath_ each design artifact. Explain what the artifact is, how it meets the goals of your personas (**refer to your personas by name**).
> Clearly label the final design.

#### First Iteration of Design (Milestone 1)


![Card Sorting 1 ](/documents/card-sorting2.jpg)
In the first iteration of the card-sorting, I decided to organize the section with login, filter, edit, delete and catalog on the home page. I thought this would be best to have the catalog with all accessors and editors and have upload on its own separate page.

![Card Sorting 2](/documents/card-sorting1.jpg)
In the second, iteration of the card-sorting, I realized that only authorized users who are logged in can insert, edit or delete information. So it would make more sense to have the uploads page contain the section about editing, deleting existing entries.

![Home Page](/documents/sketch1-home.jpg)
The home page has the initial header that is included in a partial that will be on each page with different content. It made sense to have a little about section before the filtering, edit, deletion and catalog sections. The log-in would make sense to be on the home page but may consider moving it later on.

![Upload Page](/documents/sketch1-uploads.jpg)
The upload page will have the same initial header with different content specific to the page. Below it will have the upload form and a confirmation if an upload was successful. I thought this was a good design practice because I wanted to keep the information for Mac on this one specific page.

![Citations Page](/documents/sketch1-citations.jpg)
The citations page will contain the same header with content dependent information. Below it will have a section regarding the citations associated with each entry.

#### Second Iteration of Design (Milestone 1)
After the second card-sorting activity, I thought it would be best, to restructure the content to where uploads contains upload, edit and delete, and only home page has the about, catalog and filter sections since only authorized users can do inserting, editing and deletion. **Additionally, after the second design iteration, I decided it would be too challenging to deal with audio files so I changed it to album/single covers. This fully still meets the design needs/wants/desires of my two persona so I did not flag it as an issue.

![Home Page 2nd](/documents/sketch2-home.jpg)
It made more sense to move all editing, deleting options to the uploads page where only authorized users can manipulate and upload new entries. This way the home page with the catalog supports filtering and changing/adding/removing tags as well as displaying the catalog. This adheres to the needs and wants of Mac because the scope of his use of the page is in one place.

![Upload Page 2nd](/documents/sketch2-uploads.jpg)
The uploads page now contains the editing and deleting options, as well as the uploads option. This ensures that all authorized behavior occurs on the uploads portion of the page. This supports the needs and wants of Daniel because he would like all information on one section due to behavioral tendencies and circumstances.

#### Final Iteration of Design (Milestone 2/Final Submission)
Will revisit after implementing other aspects, potentially causing design to change.

![Home Page Final](/documents/home-final.jpg)
For my final design iteration, I decided to have the keep the bulk about section. The next section is the filter, add tag and tag entry section. Since this is all stuff that can be accessed and utilized by non-users, it made sense to keep it all here on the home page. The catalog is below everything and adjusts pending any filters, new tags nad new entries. Overall, after considering my initial design schemes and original card-sorting, this was the best way to organize the section.

![Upload Page Final - Logged Out](/documents/logOut-upload.jpg)
For this final design iteration, I wanted to keep the upload section accessible but force all the functionality to be only available to logged in users. So if a user is logged out, they are prompted with the log-in and they are also only limited to the catalog. This way the page is available for people to reach the information page but they do not access any of the user required functionality.

![Upload Page Final - Logged In](/documents/logIN-upload.jpg)
If a user is logged in, the upload page contains functionality to delete entries and click on entries to view their information and edit them. Also, if they are logged in, the login form is no longer there and is replaced with the upload new song entry form. I decide to include this on upload because this page was supposed to encompass all functionality that is limited to users only. Therefore, if you are logged in you can be prompted the log-out in the navigation, as well as the upload form and the ability to delete entries.

![Information Page Final - Logged Out](/documents/logOut-information.jpg)
If a user is logged out, the information page (accessed through clicking the song on the catalog on the uploads page) displays a larger image of the cover art as well as the song title, song artist, source link and tags. A non-user can still access the information page and view all the information about the song.

![Information Page Final - Logged In](/documents/logIN-information.jpg)
If a user is logged IN, the information page displays the same as it would for a logged out user but also prompts an edit link that brings up an edit form to edit the information of the song. Additionally, there is a delete button next to each associated tag to allow users to delete the associated tag from the song.
### Design Patterns (Milestone 1)
> Write a one paragraph reflection explaining how you used the design patterns in your site's design.

I used various design principles in my initial design. As it pertains to the content, I structured a brief about section within the home page to indicate purpose and overview of platform. I sectioned the content around the catalog and filtering on the home page, below the about. This ensures that it is clear for both Mac and Daniel to follow the content. The upload page also has clear content structure for uploading a image file, editing and deleting existing entries and creating an entry. The citation page implores a similar design schema to the upload page. As it pertains to the design patterns associated with the styling, I wanted to make the styling clean and cohesive. I chose a solid color pallet with an initial large photo and then corresponding associated relational colors. I styled it with multiple flexboxes to make the content aesthetically appealing and clean looking. I wanted to ensure strong hierarchy principle, so each section has a background color of a different associated color. The about has one color, the filter options has another color and the catalog will have another color. I also ensured that instances of text-align and bolding were not distracting and "amateur" looking. I found good icons to represent the different feature functionality, which further adheres to the usability desires of both persona Mac and Daniel. Additionally, I wanted to ensure that the color contrast was sufficient, so I WAVE checked after each styling change.



## Implementation Plan

### Requests (Milestone 1. Revise in Milestone 2)
> Identify and plan each request you will support in your design.
> List each request that you will need (e.g. view image details, view gallery, edit book, tag product, etc.)
> For each request, specify the request type (GET or POST), how you will initiate the request: (form or query string URL), and the HTTP parameters necessary for the request.

Example:
- Request: view movie details
  - Type: GET
  - URL: /movie/details?id=X
  - Params: id _or_ movie_id (movies.id in DB)

- Request: Upload song and create new entry
  - Sub Request: Upload song
    - Type: POST
    - URL: in HTTP header
    - Params: song.title, song.artist, song.id, song.source song.img_ext

- Request: add tag to entry
  - Type: POST
  - URL: in HTTP header
  - Params: song_tags.song_id, song_tags.tag_id, tags.tag_name

- Request: create a tag
  - Type: POST
  - URL: in HTTP header
  - Params: tag.id, tag.name

- Request: remove tag from entry
  - Type: GET
  - URL: /upload/information?action=delete-tag&id=song_id&tag=tag_id
  - Params: tag.id, song_tags.song_id, song_tags.tag_id

- Request: view song details (including tags)
  - Type: GET
  - URL: /upload/information?id=song_id
  - Params: song.id, song_tags.song_id, song_tags.tag_id, tags.tag_name, song.artist, song.title, song.source, song.img_ext

- Request: edit existing entry
  - Type: GET
  - URL: /upload/information?edit=song_id
  - Params: song.id, song.name, song.artist, song.img_ext, song_tags.song_id, song_tags.tag_id, tags.tag_name

- Request: delete existing entry
  - Type: POST
  - URL: /upload
  - Params: song.id, song.name, song.artist, song.img_ext, song.source, song_tags.song_id,

- Request: filter by tag
  - Type: GET
  - URL: /home?filter-tag=Mellow&filter=
  - Params: tags.id, tags.tag_name, song_tags.song_id, song_tags.tag_id




### Database Schema (Milestone 1. Revise in Milestone 2)
> Describe the structure of your database. You may use words or a picture. A bulleted list is probably the simplest way to do this. Make sure you include constraints for each field.

> Hint: You probably need a table for "entries", `tags`, `"entry"_tags` (stores relationship between entries and tags), and a `users` tables.

> Hint: For foreign keys, use the singular name of the table + _id. For example: `image_id` and `tag_id` for the `image_tags` (tags for each image) table.

Table: movies
- field1: TYPE {constraints...},
- field2...
- TODO

Table: users
- field1: id {NOT NULL, PRIMARY KEY, AUTOINCREMENT, UNIQUE}
- field2: username TEXT {NOT NULL, UNIQUE}
- field3: password TEXT {NOT NULL}

Table: songs
- field1: id INTEGER {NOT NULL, PRIMARY KEY, AUTOINCREMENT, UNIQUE}
- field2: title TEXT {NOT NULL, UNIQUE}
- field3: artist TEXT {NOT NULL}
- field4: img_ext TEXT
- field5: source TEXT {}
- field6: user_id FOREIGN KEY {NOT NULL, PRIMARY KEY, AUTOINCREMENT, UNIQUE}

Table: song_tags
- field1: id INTEGER {NOT NULL, PRIMARY KEY, AUTOINCREMENT, UNIQUE}
- field2: song_id FOREIGN KEY {NOT NULL, PRIMARY KEY, AUTOINCREMENT, UNIQUE}
- field3: tag_id FOREIGN KEY {NOT NULL, PRIMARY KEY, AUTOINCREMENT, UNIQUE}

Table: tags
- field1: id INTEGER {NOT NULL, PRIMARY KEY, AUTOINCREMENT, UNIQUE}
- field2: tag_name TEXT {NOT NULL, UNIQUE}

### Database Query Plan (Milestone 1. Revise in Milestone 2)
> Plan your database queries. You may use natural language, pseudocode, or SQL.

* View Song Details
```sql
SELECT songs.title, songs.artist, songs.img_ext, songs.source, tags.tag_name FROM song_tags INNER JOIN songs ON songs_tags.id = songs.id LEFT OUTER JOIN tags ON tags.id = song_tags.tag_id;
```
* Upload a new song/entry
```sql
INSERT INTO songs (title, artist, img_ext, user_id source) VALUES (:title, :artist, :img, :user_id, :source);
```
* Add tag to existing entry
```sql
SELECT id FROM songs WHERE (title = :song_name);
SELECT id FROM tags WHERE (tag_name = :ex_tag);
INSERT INTO song_tags (song_id, tag_id) VALUES ('id from songs', 'id from tags')
```

* Create a tag
```sql
INSERT INTO tags (tag_name) VALUES (;tag_name);
```

* Remove tag from entry
```sql
DELETE FROM song_tags WHERE tag_id = :tag_id AND song_id = :song_id;

```
* Edit existing entry
```sql
UPDATE songs SET title = :title, artist = :artist, source = :source WHERE (id = :current_id);
```

* Delete existing energy
```sql
DELETE FROM songs WHERE songs.id = :song_id;
```

* Filter by tag
```sql
SELECT song.title, songs.id, songs.artist, song.img_ext FROM songs_tags INNER JOIN songs ON song_tags.id = song.id LEFT OUTER JOIN tags ON tags.id = song_tag.tag_id WHERE (tags.tag_name LIKE '%' || :filter_param || '%');
```

* Show all tags for song
```sql
SELECT song.title, tags.tag_name FROM songs_tags INNER JOIN songs ON song_tags.id = song.id LEFT OUTER JOIN tags ON tags.id = song_tag.tag_id;
```

### Code Planning (Milestone 1. Revise in Milestone 2)
> Plan any PHP code you'll need here using pseudocode.
> Use this space to plan out your form validation and assembling the SQL queries, etc.
> Tip: Break this up by pages. It makes it easier to plan.

#### HOME PAGE
```

// FILTER BY TAGS

get a list of tags from sql query

if got a tag list successful{
  fetch all
}

if filter was selected{
  has filter is true
  get the filter parameter from GET form
}

if has filter is true{
  query to filter by tags with array of parameters
}else{
  query to display all entries of catalog
}

// CREATING A TAG

instantiate feedback classes
instantiate sticky variables

if create tag form was submitted{
  get value of new tag
  form valid is true

  query DB to see if already exists
  if already exits{
    form valid false
    show feedback
  }
  if form valid{
    insert query new tag into tags table
  }else{
    sticky variable for tag name
  }
}

// TAGGING AN EXISTING ENTRY

query for a list of songs
instantiate has tagged success variable as false

if (song list retrieval successful){
  fetch all
}

if can get tag entry selection, and song selection and list of tags{
  get song to tag
  get desired tag

  get id of song by querying id for matching song title

  get id of tag by querying id for matching tag name

  insert query into song_tags by song id and tag id

  if result was successful{
    has tagged success is true
  }
}
```

#### UPLOADS

```
// UPLOADING A SONG ENTRY

define the max file size of 2MB

if the user is logged in{
  instantiate feedback classes
  instantiate upload variables
  instantiate sticky values


  if the user submitted upload form{
    retrieve values from form (title, artist, source and upload file)

    form valid is True

    if upload has No errors{
      pass file name and extension
    }else{
      form is invalid
    }

    if song title is empty{
      form is invalid
      show feedback class
    }

    if song artist is  empty{
      form is invalid
      show feedback class
    }

    if song source is empty{
      set variable to null
    }

    if the form is valid{
      insert query to insert song into database

      if insert was successful{
        retrieve last insert id
        create new path with concatenation
        move uploaded file
        upload success is true
      }
    }else{
      show feedback classes
      set sticky values
    }
}

// DELETING SONG ENTRY

get list of songs

instantiate deletion success variables

if get list of songs worked{
  fetch all
}

if user is logged in and delete was submitted{
  get song title of delete

  if song title was retrieved{
    get song id query
    get img ext query

    get song id
    get img extension

    create variable file path

    delete query to delete song


    if delete was successful{
      delete from song tags query

      if delete from song tags was successful{
        unlink the variable file path
        delete success variable is true
      }
    }
  }
}

```
#### INFORMATION
```
// EDITING A SONG

get id of song for page

get instance of url for the song_id

instantiate editing variables

if a user is logged in{
  edit is allowed
}else{
  edit is not allowed
}

if a user selected edit link{
  edit toggle screen variable is true
  get song_id
}

if got song_id was successful{
  query to get remaining information about that song

  if retrieve successful{
    first instance of array is the song
  }

if valid song{

  if someone edited it and hit save{
    get variables of edited values

    if the title is not null{
      update new information into table with query

      retrieve new song information
    }
  }
}
}

// DELETING TAGS

get tag id
get song id
get action

if action is to delete{
  delete query to delete tag from song
}
```

## Submission

### Audience (Final Submission)
> Tell us how your final site meets the needs of the audiences. Be specific here. Tell us how you tailored your design, content, etc. to make your website usable for your personas. Refer to the personas by name.

Styling: As it pertains to styling, my site design meets the criteria of both my audiences. I wanted a professionally looking website with a strong aesthetic appeal. This ensures that both Daniel and Mac do not question the validity of the webpage nor question any of the information on the site. I used the a bunch of flexbox orientation on the main functionality and content sections so both users can easily read and understand how to operate the site. Additionally, I made sure to use a colorful and bright schema but also ensured that it did not distract the information consumer or administrator in there understanding of the webpage. With mostly light colors, every font is readable and able to comprehend. I wanted to also keep consistency amongst all pages so I used a common header, common font and layout and common catalog design. The user will not be thrown off by any of the information being presented via the styling measures. I also incorporated some neat icons that clearly identify what they represent and add an extra aesthetic to the page. In selecting my image sizes and content display, I chose to not overwhelm any user with too big image sizes and made sure that the associated song information is easy to read and comprehend.

Content: As it pertains to content, I wanted to structure everything so that the information consumer Mac and the administrator Daniel can both access their relevant information and functionality with ease. I structured most information consumer audience functionality and content on the home page so no users have to go to uploads page unless they want to reach the information page for each song. This adheres to Mac's needs because he doesn't have all the time in the world and all possible audience functionality for him is on one page. Additionally, the about section is also on that same home page for new visitors from that audience to get a sense of what the webpage entails. I structured all the content for users on the upload page. If you are logged in, then you can upload a song, delete entries and edit entries, delete tags from the information page. Daniel is slower with technology so it made sense to keep all user access controlling features on that one section of pages so he doesn't confuse himself when going about the site. Upload, deletion and editing are all within the upload page and sub-pages so there removes any room for confusion.


### Additional Design Justifications (Final Submission)
> If you feel like you haven’t fully explained your design choices in the final submission, or you want to explain some functions in your site (e.g., if you feel like you make a special design choice which might not meet the final requirement), you can use the additional design justifications to justify your design choices. Remember, this is place for you to justify your design choices which you haven’t covered in the design journey. You don’t need to fill out this section if you think all design choices have been well explained in the design journey.

I wanted to justify a few design features that I implemented/decided upon that didn't necessarily align with the direct applications of the project scope. For one, I wanted to mention that show all tags would have added an unnecessary amount of redundancy in my project where a user can just fill out the filter form and see all tags when they want to filter by a tag. A user can also view all tags by the tag dropdown for tagging an entry. Inclusion of a separate show all tags section would've NOT aligned with the needs of my audience members and persona. They are seeking quick, efficient and simple functionality. Viewing all tags can be done in many different ways, and having a third section with the same capabilities would've been redundant, especially after having had queried for that same information countless times prior.

I placed deletion of tags in the information section because it would be easiest for a user to click on a song and be able to individually delete tags, as opposed to have to query for the song, then query for the associated tags and then delete query for specific tag by id. Again this falls under the removing redundancy logic behind my decision making. The option is still there but I thought it would be cleaner if I situated that portion within the information section for an individual song.

Another idea that I came up with during the design and implementation process of this project was to only prompt login on the uploads page. There is no point of prompting login on the home page if all functionality of tagging, adding tags and creating tags does not require user access. By only prompting it on the uploads page, it is clear that only users can access the functionality of upload and deletion by means of the uploads page and being logged in. Information consumers main functionality is on the home page and within the information section, so it should make logical sense to have it prompted on the uploads page.

The final thing I wanted to justify was the user access control selection. I thought that given that the administrators audience is a collaborative unit, as mentioned previously, that all users can upload, delete and edit regardless of whether or not it was their initial upload. I chose to do this because only administrators are granted user login capabilities and if one user needs to monitor the populated catalog, they should be able to edit or remove other entries from other administrators. Otherwise, that would defeat the whole purpose of being an administrator, and everyone else could be users. That being said, I allowed information consumers to create tags and tag entries because that is the scope of the site that they are accessing it for. The collaborative aspect also exists among that audience because they should be able to tag entries and create tags but it should be on the users to monitor that behavior.

__Router.php is displaying an error that it doesn't interpret NULL value but my entire project works and I copied the router.php from the sample code that was provided to us and that we are suggested to use with router.php.__

### Self-Reflection (Final Submission)
> Reflect on what you learned during this assignment. How have you improved from Project 1? What things did you have trouble with?

I learned a ton on project 3. While I was confident in my abilities after both Project 1 and Project 2, this latest assignment really tested my determination and understanding of the material. I thought I was pretty strong with form validation but where I was less confident was my SQL understanding. This required me to really reflect on old material to help me figure out the tagging functionality. Project 1 gave me a refresher of the 1300 basics, but at this point I think I could hard code a website from scratch and make it do whatever I want it to functionality wise. I was intimidated by this assignment coming in, but after a ton of late nights and confidence in my abilities, I was able to get all required functionality working and all styling in line with what I envisioned back in early April. Overall, I'd say I learned a ton about backend development. While all the user access controls and hard coding aspects were easier to me because of my experience, I definitely struggled with the SQL material as well as the upload and database manipulation. Being able to really flesh out ideas and test out your own code provides opportunity for trial and error and really allows you to learn.


### Grading: Mobile or Desktop (Final Submission)
> When we grade your final site, should we grade this with a mobile screen size or a desktop screen size?

Desktop screen size


### Grading: Step-by-Step Instructions (Final Submission)
> Write step-by-step instructions for the graders.
> The project if very hard to grade if we don't understand how your site works.
> For example, you must login before you can delete.
> For each set of instructions, assume the grader is starting from /

Viewing all entries:
1. Open up home page
2. Scroll Down to catalog

View all entries for a tag:
1. Open up home page
2. Scroll down to the tagging and filtering section
3. Go to the filter by tag box
4. Select the tag that you want to filter by
5. Click filter
6. The adjusted catalog will be at the bottom of the page, with all entries for a particular tag.

View a single entry and all the tags for that entry:
1. Open up the upload page
2. Scroll down to the catalog on the uploads page.
3. Click the title of the song or the image
4. You will be prompted to the information page which includes all information and tags for that entry

How to insert and upload a new entry:
1. Open up the upload page
2. small scroll to the log in prompt
3. log in with username 'asa277' and password 'monkey'
4. fill out the upload form with song title, artist, image file and source
5. click upload button
6. view your new entry on either the catalog on the home page or the catalog on the same page (upload)

How to delete an entry:
1. Open up the upload page
2. small scroll to the log in prompt
3. log in with username 'asa277' and password 'monkey'
4. scroll down to the Deleting Entries Section
5. go to the delete a song box
6. select a song to delete from the dropdown
7. click Delete

How to view all tags at once:
1. Open up home page
2. Scroll Down to Tagging Entries Section
3. Either go to the filter by tag section or the tag an entry section
4. open the dropdown of the filter by tag or if you chose tag an entry, open the dropdown of tags
5. you will see all tags at once

How to add a tag to an existing entry:
1. Open up home page
2. Scroll Down to Tagging Entries Section
3. Go to the 3rd box that prompts the list of songs and list of tags.
4. open the drop down for song list and select a song you want to tag
5. open the drop down for tag list and select a tag you want to tag the song with
6. click tag

How to remove a tag from an existing entry:
1. open up the upload page
2. small scroll to the log in prompt
3. log in with username 'asa277' and password 'monkey'
4. click on the song that you want to remove a tag from by going down to the catalog and selecting the song (click on image or title)
5. you will be prompted to the information page
6. on that page, you will see a list of tags associated with the song
7. click delete next to the tag you want to delete
