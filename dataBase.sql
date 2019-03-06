CREATE DATABASE IF NOT EXISTS instagram;
use instagram;

CREATE TABLE users(

    id                  int(255) auto_increment not null,
    role                varchar(20),
    name                varchar(100) not null,
    surname             varchar(200),
    nick                varchar(100),
    email               varchar(255),
    password            varchar(255) not null,
    image               varchar(255),
    created_at          datetime,
    updated_at          datetime,
    remember_token      varchar(255),

    CONSTRAINT pk_users PRIMARY KEY(id),
    CONSTRAINT uq_nick  UNIQUE(nick)

)ENGINE=InnoDb;

INSERT INTO users VALUES(null, 'user', 'Nitai', 'Fraire', 'n3T6i', 'nitai@gmail.com', '1234', null, CURTIME(), CURTIME(), null);
INSERT INTO users VALUES(null, 'user', 'Juan', 'Lopez', 'juanito', 'juanito@gmail.com', '1234', null, CURTIME(), CURTIME(), null);
INSERT INTO users VALUES(null, 'user', 'Manolo', 'Garcia', 'manolo', 'manolo@gmail.com', '1234', null, CURTIME(), CURTIME(), null);

CREATE TABLE images(

    id                  int(255) auto_increment not null,
    user_id             int(255) not null,
    image_path          varchar(255),
    description         text,
    created_at          datetime,
    updated_at          datetime,
    
    CONSTRAINT pk_images PRIMARY KEY(id),
    CONSTRAINT fk_images_users FOREIGN KEY(user_id) REFERENCES users(id)
    
)ENGINE=InnoDb;

INSERT INTO images VALUES(null, 1, 'test.jpg', 'desc prueba 1', CURTIME(), CURTIME());
INSERT INTO images VALUES(null, 1, 'playa.jpg', 'desc prueba 2', CURTIME(), CURTIME());
INSERT INTO images VALUES(null, 1, 'arena.jpg', 'desc prueba 3', CURTIME(), CURTIME());
INSERT INTO images VALUES(null, 3, 'familia.jpg', 'desc prueba 4', CURTIME(), CURTIME());

CREATE TABLE comments(

    id                  int(255) auto_increment not null,
    user_id             int(255) not null,
    image_id            int(255) not null,
    content             text,
    created_at          datetime,
    updated_at          datetime,

    CONSTRAINT pk_comments PRIMARY KEY(id),
    CONSTRAINT fk_comments_users FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_comments_images FOREIGN KEY(image_id) REFERENCES images(id)

)ENGINE=InnoDb;

INSERT INTO comments VALUES(null, 1, 4, 'buena foto de familia', CURTIME(), CURTIME());
INSERT INTO comments VALUES(null, 2, 1, 'buena foto de playa', CURTIME(), CURTIME());
INSERT INTO comments VALUES(null, 2, 4, 'bueno!!', CURTIME(), CURTIME());

CREATE TABLE likes(

    id                  int(255) auto_increment not null,
    user_id             int(255) not null,
    image_id            int(255) not null,
    created_at          datetime,
    updated_at          datetime,

    CONSTRAINT pk_likes PRIMARY KEY(id),
    CONSTRAINT fk_likes_users FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_likes_images FOREIGN KEY(image_id) REFERENCES images(id)

)ENGINE=InnoDb;

INSERT INTO likes VALUES(null, 1, 4, CURTIME(), CURTIME());
INSERT INTO likes VALUES(null, 2, 4, CURTIME(), CURTIME());
INSERT INTO likes VALUES(null, 3, 4, CURTIME(), CURTIME());
INSERT INTO likes VALUES(null, 3, 2, CURTIME(), CURTIME());
INSERT INTO likes VALUES(null, 2, 1, CURTIME(), CURTIME());