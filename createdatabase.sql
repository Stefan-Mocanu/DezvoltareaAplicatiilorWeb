create table conturi(
    id integer(5) AUTO_INCREMENT,
    nume varchar(50) not null,
    prenume varchar(50) not null,
    email varchar(50) not null,
    parola varchar(50) not null,
    tip_cont integer(1) default 0,
    verificat boolean default 0,
    primary key(id)
);

create table pozitii(
    id integer(2) AUTO_INCREMENT,
    nume varchar(50),
    primary key(id)
);

create table angajat(
    id integer(5),
    pozitie integer(2),
    salariu integer(5),
    primary key(id),
    foreign key(id) references conturi(id),
    foreign key(pozitie) references pozitii(id)
);

create table etaj(
    id integer(2) primary key
);

create table facilitati(
    id integer(3) AUTO_INCREMENT,
    nume varchar(25),
    primary key(id)
);

create table camera(
    numar integer(4) primary key,
    etaj integer(2),
    foreign key(etaj) references etaj(id)
);

create table facilitati_etaj(
    etaj integer(2),
    facilitate integer(3),
    primary key(etaj,facilitate),
    foreign key(etaj) references etaj(id),
    foreign key(facilitate) references facilitati(id)
);

create table rezervare(
    id integer(5) AUTO_INCREMENT,
    user integer(5),
    etaj integer(2),
    data_check_in date,
    data_check_out date,
    primary key id,
    foreign key(user) references conturi(id),
    foreign key(etaj) references etaj(id)
);

create table curatenie_etaj(
    data date,
    angajat integer(5),
    etaj integer(2),
    primary key(data,angajat,etaj),
    foreign key(angajat) references angajat(id),
    foreign key(etaj) references etaj(id)
);
create table curatenie_camera(
    data date,
    angajat integer(5),
    camera integer(4),
    primary key(data,angajat,camera),
    foreign key(angajat) references angajat(id),
    foreign key(camera) references camera(numar)
);