create table tb_instagram_api(
	id int not null auto_increment primary key,
    token varchar(200) not null,
    user_id int not null,
    user_name varchar(100) not null,
    user_picture varchar(200) not null,
    user_full_name varchar(200) not null,
    user_bio text,
    usu_id int not null
);