#banco do brechoó

create table tb_produtos(
	id int not null auto_increment primary key,
    tb_clientes int default 1,
    tb_fornecedores int default 1,
    slug varchar(200) not null ,
	data_recebimento timestamp not null DEFAULT '1970-01-01 00:00:01',
    data_cadastro timestamp not null DEFAULT '1970-01-01 00:00:01',
	valor decimal(10,2) not null,
    imagem varchar(600) not null default 'FILE',
    texto longtext not null
);


create table tb_clientes(
	id int not null auto_increment primary key,
    slug varchar(200) not null ,
	sobrenome varchar(200) not null ,
	email varchar(200) not null ,
	data_recebimento timestamp not null DEFAULT '1970-01-01 00:00:01',
    data_cadastro timestamp not null DEFAULT '1970-01-01 00:00:01',
	credito decimal(10,2) not null,
    imagem varchar(600) not null default 'FILE',
    texto longtext not null,
    ultima_doacao varchar(200) not null,
    ultima_compra varchar(200) not null 
);

 
 create table tb_fornecedores(
	id int not null auto_increment primary key,
    slug varchar(200) not null ,
	razao_social varchar(200) not null ,
    nome_fatansia varchar(200) not null ,
    cnpj varchar(200) not null ,
	email varchar(200) not null ,
	data_recebimento timestamp not null DEFAULT '1970-01-01 00:00:01',
    data_cadastro timestamp not null DEFAULT '1970-01-01 00:00:01',
	credito decimal(10,2) not null,
    imagem varchar(600) not null default 'FILE',
    texto longtext not null,
    tb_status int default 1,
    ultima_venda varchar(200) not null
);

 create table tb_status(
	id int not null auto_increment primary key,
    slug varchar(200) not null ,
    tb_categorias_status int default 1,
	ativo int not null ,
    cor varchar(200) not null ,
    tb_icone int default 1,
    data_cadastro timestamp not null DEFAULT '1970-01-01 00:00:01'
);

 create table tb_categorias_status(
	id int not null auto_increment primary key,
    slug varchar(200) not null ,
	ativo int not null ,
    cor varchar(200) not null ,
    tb_icone int default 1,
    data_cadastro timestamp not null DEFAULT '1970-01-01 00:00:01'
);


