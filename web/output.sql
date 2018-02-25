--
-- PostgreSQL database dump
--

-- Dumped from database version 10.2 (Ubuntu 10.2-1.pgdg14.04+1)
-- Dumped by pg_dump version 10.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: conference; Type: TABLE; Schema: public; Owner: ebajcfpjkshtru
--

CREATE TABLE conference (
    conference_id integer NOT NULL,
    year smallint NOT NULL,
    is_spring boolean NOT NULL
);


ALTER TABLE conference OWNER TO ebajcfpjkshtru;

--
-- Name: conference_conference_id_seq; Type: SEQUENCE; Schema: public; Owner: ebajcfpjkshtru
--

CREATE SEQUENCE conference_conference_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE conference_conference_id_seq OWNER TO ebajcfpjkshtru;

--
-- Name: conference_conference_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ebajcfpjkshtru
--

ALTER SEQUENCE conference_conference_id_seq OWNED BY conference.conference_id;


--
-- Name: recipe; Type: TABLE; Schema: public; Owner: ebajcfpjkshtru
--

CREATE TABLE recipe (
    recipe_id integer NOT NULL,
    name character varying(50) NOT NULL,
    meal_type integer NOT NULL
);


ALTER TABLE recipe OWNER TO ebajcfpjkshtru;

--
-- Name: recipe_recipe_id_seq; Type: SEQUENCE; Schema: public; Owner: ebajcfpjkshtru
--

CREATE SEQUENCE recipe_recipe_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE recipe_recipe_id_seq OWNER TO ebajcfpjkshtru;

--
-- Name: recipe_recipe_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ebajcfpjkshtru
--

ALTER SEQUENCE recipe_recipe_id_seq OWNED BY recipe.recipe_id;


--
-- Name: recipes; Type: TABLE; Schema: public; Owner: ebajcfpjkshtru
--

CREATE TABLE recipes (
    recipeid integer NOT NULL,
    userid integer NOT NULL,
    recipetitle character varying(50) NOT NULL,
    recipecategory character varying(20) NOT NULL,
    recipedate date DEFAULT now() NOT NULL,
    recipeingredients text NOT NULL,
    recipedirections text NOT NULL
);


ALTER TABLE recipes OWNER TO ebajcfpjkshtru;

--
-- Name: recipes_recipeid_seq; Type: SEQUENCE; Schema: public; Owner: ebajcfpjkshtru
--

CREATE SEQUENCE recipes_recipeid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE recipes_recipeid_seq OWNER TO ebajcfpjkshtru;

--
-- Name: recipes_recipeid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ebajcfpjkshtru
--

ALTER SEQUENCE recipes_recipeid_seq OWNED BY recipes.recipeid;


--
-- Name: scriptures; Type: TABLE; Schema: public; Owner: ebajcfpjkshtru
--

CREATE TABLE scriptures (
    id integer NOT NULL,
    book character varying(32) NOT NULL,
    chapter smallint NOT NULL,
    verse smallint NOT NULL,
    content character varying(256) NOT NULL
);


ALTER TABLE scriptures OWNER TO ebajcfpjkshtru;

--
-- Name: scriptures_id_seq; Type: SEQUENCE; Schema: public; Owner: ebajcfpjkshtru
--

CREATE SEQUENCE scriptures_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE scriptures_id_seq OWNER TO ebajcfpjkshtru;

--
-- Name: scriptures_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ebajcfpjkshtru
--

ALTER SEQUENCE scriptures_id_seq OWNED BY scriptures.id;


--
-- Name: speaker; Type: TABLE; Schema: public; Owner: ebajcfpjkshtru
--

CREATE TABLE speaker (
    speaker_id integer NOT NULL,
    name character varying(50) NOT NULL
);


ALTER TABLE speaker OWNER TO ebajcfpjkshtru;

--
-- Name: speaker_speaker_id_seq; Type: SEQUENCE; Schema: public; Owner: ebajcfpjkshtru
--

CREATE SEQUENCE speaker_speaker_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE speaker_speaker_id_seq OWNER TO ebajcfpjkshtru;

--
-- Name: speaker_speaker_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ebajcfpjkshtru
--

ALTER SEQUENCE speaker_speaker_id_seq OWNED BY speaker.speaker_id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: ebajcfpjkshtru
--

CREATE TABLE users (
    userid integer NOT NULL,
    firstname character varying(20) NOT NULL,
    lastname character varying(20) NOT NULL,
    email character varying(45) NOT NULL,
    password character varying(255) NOT NULL
);


ALTER TABLE users OWNER TO ebajcfpjkshtru;

--
-- Name: users_userid_seq; Type: SEQUENCE; Schema: public; Owner: ebajcfpjkshtru
--

CREATE SEQUENCE users_userid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_userid_seq OWNER TO ebajcfpjkshtru;

--
-- Name: users_userid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ebajcfpjkshtru
--

ALTER SEQUENCE users_userid_seq OWNED BY users.userid;


--
-- Name: conference conference_id; Type: DEFAULT; Schema: public; Owner: ebajcfpjkshtru
--

ALTER TABLE ONLY conference ALTER COLUMN conference_id SET DEFAULT nextval('conference_conference_id_seq'::regclass);


--
-- Name: recipe recipe_id; Type: DEFAULT; Schema: public; Owner: ebajcfpjkshtru
--

ALTER TABLE ONLY recipe ALTER COLUMN recipe_id SET DEFAULT nextval('recipe_recipe_id_seq'::regclass);


--
-- Name: recipes recipeid; Type: DEFAULT; Schema: public; Owner: ebajcfpjkshtru
--

ALTER TABLE ONLY recipes ALTER COLUMN recipeid SET DEFAULT nextval('recipes_recipeid_seq'::regclass);


--
-- Name: scriptures id; Type: DEFAULT; Schema: public; Owner: ebajcfpjkshtru
--

ALTER TABLE ONLY scriptures ALTER COLUMN id SET DEFAULT nextval('scriptures_id_seq'::regclass);


--
-- Name: speaker speaker_id; Type: DEFAULT; Schema: public; Owner: ebajcfpjkshtru
--

ALTER TABLE ONLY speaker ALTER COLUMN speaker_id SET DEFAULT nextval('speaker_speaker_id_seq'::regclass);


--
-- Name: users userid; Type: DEFAULT; Schema: public; Owner: ebajcfpjkshtru
--

ALTER TABLE ONLY users ALTER COLUMN userid SET DEFAULT nextval('users_userid_seq'::regclass);


--
-- Data for Name: conference; Type: TABLE DATA; Schema: public; Owner: ebajcfpjkshtru
--

COPY conference (conference_id, year, is_spring) FROM stdin;
\.


--
-- Data for Name: recipe; Type: TABLE DATA; Schema: public; Owner: ebajcfpjkshtru
--

COPY recipe (recipe_id, name, meal_type) FROM stdin;
\.


--
-- Data for Name: recipes; Type: TABLE DATA; Schema: public; Owner: ebajcfpjkshtru
--

COPY recipes (recipeid, userid, recipetitle, recipecategory, recipedate, recipeingredients, recipedirections) FROM stdin;
4	2	Sandwich	Lunch	2018-02-25	Bread\r\nOther stuff	Make it
3	2	German Pancakes	Breakfast	2018-02-25	Pancake Batter\r\n6 large eggs\r\n1 cup 2% milk\r\n1 cup all-purpose flour\r\n1/2 teaspoon salt\r\n2 tablespoons butter, melted\r\n\r\nBUTTERMILK SYRUP:\r\n1/2 cup butter, cubed\r\n1-1/2 cups sugar\r\n3/4 cup buttermilk\r\n2 tablespoons corn syrup\r\n1 teaspoon baking soda\r\n2 teaspoons vanilla extract\r\nConfectioners&#39; sugar\r\nFresh blueberries, optional	Preheat oven to 400°. Place first four ingredients in a blender; process just until smooth.\r\nPour melted butter into a 13x9-in. baking dish; tilt dish to coat. Add batter; bake, uncovered, until puffed and golden brown, about 20 minutes.\r\nMeanwhile, place butter, sugar, buttermilk, corn syrup and baking soda in a small saucepan; bring to a boil. Cook, uncovered, 7 minutes. Remove from heat; stir in vanilla.\r\nRemove pancake from oven. Dust with confectioners&#39; sugar; serve immediately with syrup and, if desired, fresh blueberries. Yield: 8 servings (2 cups syrup).\r\n\r\nRecipe courtesy of tasteofhome.com
6	2	Ice Cream	Dessert	2018-02-25	2 large eggs\r\n3⁄4 cup sugar\r\n2 cups heavy whipping cream\r\n1 cup milk\r\n2 teaspoons vanilla extract	Whisk the eggs in a mixing bowl until light and fluffy, 1 to 2 minutes.\r\nWhisk in the sugar, a little at a time, then continue whisking until completely blended, about 1 minute more. Pour in the cream, milk, and vanilla and whisk to blend.\r\nTransfer the mixture to an ice cream maker and freeze following the manufacturer&#39;s instructions.\r\nMakes 1 Quart \r\n\r\n**Variation: add 1 cup coarsely chopped Reese&#39;s Peanut butter cups, after ice cream stiffens (about 2 minutes before it is done) let it continue processing.\r\n\r\nRecipe courtesy of geniuskitchen.com
5	2	Borsch	Dinner	2018-02-25	2 quarts beef, chicken, or vegetable broth\r\n1 tablespoon vegetable oil\r\n2 onions, diced\r\n2 garlic cloves, minced\r\n1 teaspoon dried marjoram\r\n2 celery stalks, trimmed, thinly sliced\r\n2 parsnips, peeled, thinly sliced\r\n1 carrot, peeled, thinly sliced\r\n1 leek, white and light green parts, thinly sliced\r\n1/2 head savoy cabbage, shredded\r\n1 bay leaf\r\n1 teaspoon salt, or to taste\r\n1/2 teaspoon freshly ground black pepper, or to taste\r\n2 beets, peeled, grated\r\n1/4 cup dill, minced\r\n2-3 tablespoons red wine vinegar, or as needed\r\n1/2 cup sour cream	Bring the broth to a simmer while you peel and prepare the vegetables. Heat a large soup pot over medium heat with the oil. Add the onions and garlic. Cook, stirring frequently, until the onions are tender and golden, about 5 minutes. Stir in the marjoram.\r\nAdd the celery, parsnips, carrot, leek, and cabbage. Cover and cook over low heat, stirring occasionally, until the vegetables are slightly tender, about 8 minutes\r\nAdd the broth and the bay leaf. Season to taste with salt and pepper. Bring the soup to a simmer and cook, partially covered, for 10 minutes before grating the beets directly into the soup. Simmer, partially covered, until the soup is flavorful and the vegetables are completely tender, about 15 minutes. Stir in the dill. Add the red wine vinegar, salt, and pepper to taste. Garnish the soup with sour cream and serve.\r\n\r\nRecipe courtesy of epicurious.com.
\.


--
-- Data for Name: scriptures; Type: TABLE DATA; Schema: public; Owner: ebajcfpjkshtru
--

COPY scriptures (id, book, chapter, verse, content) FROM stdin;
1	John	1	5	The light shineth in darkenss, and the darkness comrehendeth it not
2	John	1	5	And the light shineth in darkness; and the darkness comprehended it not.
3	D&C	93	28	He that keepeth his commandments receiveth truth and light, until he is\n glorified in truth and knoweth all things.
4	John	1	5	And the light shineth in darkness; and the darkness comprehended it not.
5	D&C	88	49	The light shineth in darkness, and the darkness comprehendeth it not;\n nevertheless, the day shall come when you shall comprehend even God, being\n quickened in him and by him.
6	D&C	93	28	He that keepeth his commandments receiveth truth and light, until he is\n glorified in truth and knoweth all things.
7	Mosiah	16	9	He is the light and the life of the world; yea, a light that is endless,\n that can never be darkened; yea, and also a life which is endless, that there\n can be no more death.
\.


--
-- Data for Name: speaker; Type: TABLE DATA; Schema: public; Owner: ebajcfpjkshtru
--

COPY speaker (speaker_id, name) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: ebajcfpjkshtru
--

COPY users (userid, firstname, lastname, email, password) FROM stdin;
1	Spencer	Browning	stbrowning4@gmail.com	$2y$10$84keiDdsLxkcnctLzSDfseu83BFSak.gHn3JeykBzoX3OxDW/8TNy
2	Steve	Rogers	example@example.com	$2y$10$fBvw3QBJOg2Bcsc.B7qBAO8auMiuvg5mvnZFMi6Bm0pHCruMR9rJS
\.


--
-- Name: conference_conference_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ebajcfpjkshtru
--

SELECT pg_catalog.setval('conference_conference_id_seq', 1, false);


--
-- Name: recipe_recipe_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ebajcfpjkshtru
--

SELECT pg_catalog.setval('recipe_recipe_id_seq', 1, false);


--
-- Name: recipes_recipeid_seq; Type: SEQUENCE SET; Schema: public; Owner: ebajcfpjkshtru
--

SELECT pg_catalog.setval('recipes_recipeid_seq', 6, true);


--
-- Name: scriptures_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ebajcfpjkshtru
--

SELECT pg_catalog.setval('scriptures_id_seq', 7, true);


--
-- Name: speaker_speaker_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ebajcfpjkshtru
--

SELECT pg_catalog.setval('speaker_speaker_id_seq', 1, false);


--
-- Name: users_userid_seq; Type: SEQUENCE SET; Schema: public; Owner: ebajcfpjkshtru
--

SELECT pg_catalog.setval('users_userid_seq', 2, true);


--
-- Name: conference conference_pkey; Type: CONSTRAINT; Schema: public; Owner: ebajcfpjkshtru
--

ALTER TABLE ONLY conference
    ADD CONSTRAINT conference_pkey PRIMARY KEY (conference_id);


--
-- Name: recipe recipe_pkey; Type: CONSTRAINT; Schema: public; Owner: ebajcfpjkshtru
--

ALTER TABLE ONLY recipe
    ADD CONSTRAINT recipe_pkey PRIMARY KEY (recipe_id);


--
-- Name: recipes recipes_pkey; Type: CONSTRAINT; Schema: public; Owner: ebajcfpjkshtru
--

ALTER TABLE ONLY recipes
    ADD CONSTRAINT recipes_pkey PRIMARY KEY (recipeid);


--
-- Name: scriptures scriptures_pkey; Type: CONSTRAINT; Schema: public; Owner: ebajcfpjkshtru
--

ALTER TABLE ONLY scriptures
    ADD CONSTRAINT scriptures_pkey PRIMARY KEY (id);


--
-- Name: speaker speaker_pkey; Type: CONSTRAINT; Schema: public; Owner: ebajcfpjkshtru
--

ALTER TABLE ONLY speaker
    ADD CONSTRAINT speaker_pkey PRIMARY KEY (speaker_id);


--
-- Name: users users_email_key; Type: CONSTRAINT; Schema: public; Owner: ebajcfpjkshtru
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_email_key UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: ebajcfpjkshtru
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (userid);


--
-- Name: recipes recipes_userid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: ebajcfpjkshtru
--

ALTER TABLE ONLY recipes
    ADD CONSTRAINT recipes_userid_fkey FOREIGN KEY (userid) REFERENCES users(userid);


--
-- Name: public; Type: ACL; Schema: -; Owner: ebajcfpjkshtru
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO ebajcfpjkshtru;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO ebajcfpjkshtru;


--
-- PostgreSQL database dump complete
--

