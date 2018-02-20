CREATE TABLE public.users
(
user_id SERIAL NOT NULL PRIMARY KEY,
userName varchar(20) NOT NULL UNIQUE,
password varchar(12) NOT NULL

);

CREATE TABLE public.meal
(
meal_id SERIAL NOT NULL PRIMARY KEY,
name varchar(50) NOT NULL,

);

CREATE TABLE public.recipe
(
recipe_id SERIAL NOT NULL PRIMARY KEY,
name varchar(50) NOT NULL,
meal_type INT NOT NULL

);

CREATE TABLE public.note
(
note_id SERIAL NOT NULL PRIMARY KEY,
user_id INT NOT NULL REFERENCES public.users(user_id),
meal_id INT NOT NULL REFERENCES public.meal(meal_id),
recipe_id INT NOT NULL REFERENCEs public.recipe(recipe_id),
note_text text NOT NULL
);