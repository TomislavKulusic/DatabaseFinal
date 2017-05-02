INSERT INTO category (category_name) VALUE ('Pre-Code Western');

INSERT INTO actors (first_name, last_name) VALUES ('Richard', 'Dix'), ('Irene', 'Dunne');

INSERT INTO directors (first_name, last_name) VALUES ('Wesley', 'Ruggles');

INSERT INTO mydb.movies (
  movie_title,
  movie_description,
  category_id,
  release_date,
  movie_link
) VALUES (
  'Cimarron',
  'The government opens up a territory in Oklahoma for settlement and Cravat claims a free land for himself. He moves his
   family there and soon becomes a leading citizen of Osage. Soon after the town is established he begins to feel confined
    and heads for the Cherokee Strip and leaves his family behind. During this and other absences, his wife Sabra learns to
     take care of herself and becomes important in her own right.',
  4,
  '1931-1-26',
  'tw5N0VJIvZA'
);

INSERT INTO movie_actors (movie_id, actor_id) VALUES (17, 6), (17, 7);

INSERT INTO movie_directors (movie_id, director_id) VALUES (17, 4);