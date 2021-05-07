-- TODO: create tables

-- CREATE TABLE `examples` (
-- 	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
-- 	`name`	TEXT NOT NULL
-- );


-- TODO: initial seed data

-- INSERT INTO `examples` (name) VALUES ('example-1');
-- INSERT INTO `examples` (name) VALUES ('example-2');

CREATE TABLE `users` (
    `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    `username` TEXT NOT NULL UNIQUE,
    `password` TEXT NOT NULL
);

INSERT INTO `users` (id, username, password) VALUES (1, 'acb123', '$2y$10$QtCybkpkzh7x5VN11APHned4J8fu78.eFXlyAMmahuAaNcbwZ7FH.'); -- password: monkey
INSERT INTO `users` (id, username, password) VALUES (2, 'asa277', '$2y$10$QtCybkpkzh7x5VN11APHned4J8fu78.eFXlyAMmahuAaNcbwZ7FH.'); -- password: monkey
INSERT INTO `users` (id, username, password) VALUES (3, 'mvp236', '$2y$10$QtCybkpkzh7x5VN11APHned4J8fu78.eFXlyAMmahuAaNcbwZ7FH.'); -- password: monkey

CREATE TABLE `songs` (
    `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    `title` TEXT NOT NULL UNIQUE,
    `artist` TEXT NOT NULL,
    `img_ext` TEXT NOT NULL,
    `source` TEXT,
    `user_id` INTEGER NOT NULL
);

INSERT INTO `songs` (id, title, artist, img_ext, source, user_id) VALUES (1, "Hand Me Downs", "Mac Miller", "jpg", "https://genius.com/", 1); -- Source: Genius.com (https://genius.com/Mac-miller-hand-me-downs-lyrics)
INSERT INTO `songs` (id, title, artist, img_ext, source, user_id) VALUES (2, "2009", "Mac Miller", "jpg", "https://music.amazon.com/", 1); -- Source: Amazon Music (https://www.amazon.com/2009-Explicit/dp/B07FB9K7F4)
INSERT INTO `songs` (id, title, artist, img_ext, source, user_id) VALUES (3, "Beyond", "Leon Bridges", "jpg", "https://music.amazon.com/", 1); -- Source: Amazon Music (https://www.amazon.com/Beyond-Live-Bridges-feat-Combs/dp/B07HGJ9397/ref=sr_1_2?dchild=1&keywords=beyond&qid=1620341968&s=dmusic&sr=1-2)
INSERT INTO `songs` (id, title, artist, img_ext, source, user_id) VALUES (4,  "Shy", "Leon Bridges", "jpg", "https://genius.com/", 2); -- Source: Genius.com (https://genius.com/Leon-bridges-shy-lyrics)
INSERT INTO `songs` (id, title, artist, img_ext, source, user_id) VALUES (5, "Hold On", "Justin Bieber", "jpg", "https://genius.com/", 2); -- Source: Genius.com (https://genius.com/Justin-bieber-hold-on-lyrics)
INSERT INTO `songs` (id, title, artist, img_ext, source, user_id) VALUES (6, "Off My Face", "Justin Bieber", "jpg", "https://genius.com/", 2); -- Source: Genius.com (https://genius.com/Justin-bieber-off-my-face-lyrics)
INSERT INTO `songs` (id, title, artist, img_ext, source, user_id) VALUES (7, "Ophelia", "The Lumineers", "jpg", "https://genius.com/", 2); -- Source: Genius.com (https://genius.com/The-lumineers-ophelia-lyrics)
INSERT INTO `songs` (id, title, artist, img_ext, source, user_id) VALUES (8, "Home", "Phillip Phillips", "jpg", "https://soundcloud.com/", 3); -- Source: SoundCloud (https://soundcloud.com/producer-chris-shaw/phillip-phillips-home)
INSERT INTO `songs` (id, title, artist, img_ext, source, user_id) VALUES (9, "CHICKEN TENDIES", "Clinton Kane", "jpg", "https://genius.com/", 3); -- Source: Genius.com (https://genius.com/Clinton-kane-chicken-tendies-lyrics)
INSERT INTO `songs` (id, title, artist, img_ext, source, user_id) VALUES (10, "Colors", "Black Pumas", "jpg", "https://blackpumas.bandcamp.com/", 3); -- Source: Black Pumas Bandcamp (https://blackpumas.bandcamp.com/track/colors)

CREATE TABLE `tags` (
    `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    `tag_name` TEXT NOT NULL UNIQUE
);

INSERT INTO tags (id, tag_name) VALUES (1, "Reading");
INSERT INTO tags (id, tag_name) VALUES (2, "Focus");
INSERT INTO tags (id, tag_name) VALUES (3, "Learning");
INSERT INTO tags (id, tag_name) VALUES (4, "Creativity");
INSERT INTO tags (id, tag_name) VALUES (5, "Writing");
INSERT INTO tags (id, tag_name) VALUES (6, "Brainstorm");
INSERT INTO tags (id, tag_name) VALUES (7, "Instrumental");
INSERT INTO tags (id, tag_name) VALUES (8, "Acoustic");
INSERT INTO tags (id, tag_name) VALUES (9, "Upbeat");
INSERT INTO tags (id, tag_name) VALUES (10, "Mellow");

CREATE TABLE `song_tags` (
    `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    `song_id` INTEGER NOT NULL,
    `tag_id` INTEGER NOT NULL
);

INSERT INTO `song_tags` (id, song_id, tag_id) VALUES (1, 1, 4);
INSERT INTO `song_tags` (id, song_id, tag_id) VALUES (2, 2, 10);
INSERT INTO `song_tags` (id, song_id, tag_id) VALUES (3, 3, 8);
INSERT INTO `song_tags` (id, song_id, tag_id) VALUES (4, 4, 1);
INSERT INTO `song_tags` (id, song_id, tag_id) VALUES (5, 5, 4);
INSERT INTO `song_tags` (id, song_id, tag_id) VALUES (6, 6, 6);
INSERT INTO `song_tags` (id, song_id, tag_id) VALUES (7, 7, 2);
INSERT INTO `song_tags` (id, song_id, tag_id) VALUES (8, 8, 5);
INSERT INTO `song_tags` (id, song_id, tag_id) VALUES (9, 9,  10);
INSERT INTO `song_tags` (id, song_id, tag_id) VALUES (10, 10, 3);
INSERT INTO `song_tags` (id, song_id, tag_id) VALUES (11, 2, 7);
INSERT INTO `song_tags` (id, song_id, tag_id) VALUES (12, 4, 4);
INSERT INTO `song_tags` (id, song_id, tag_id) VALUES (13, 5, 9);
INSERT INTO `song_tags` (id, song_id, tag_id) VALUES (14, 7, 1);
INSERT INTO `song_tags` (id, song_id, tag_id) VALUES (15, 9, 6);
INSERT INTO `song_tags` (id, song_id, tag_id) VALUES (16, 10, 7);
INSERT INTO `song_tags` (id, song_id, tag_id) VALUES (17, 8, 8);

CREATE TABLE `sessions` (
    `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    `user_id` INTEGER NOT NULL,
    `session` TEXT NOT NULL UNIQUE,
    `last_login` TEXT NOT NULL
);
