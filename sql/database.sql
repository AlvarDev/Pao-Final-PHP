use finalPHP;

CREATE TABLE usuario(
	codusu int NOT NULL AUTO_INCREMENT,
  email varchar(21) NOT NULL,
  password varchar(21) NOT NULL,
  nomusu varchar(21) NOT NULL,
  profesion varchar(60) NOT NULL,
  foto varchar(255) NOT NULL,
  PRIMARY KEY (codusu)
);

CREATE TABLE amistades(
	 codusu int NOT NULL,
     codami int NOT NULL,
     estado int NOT NULL,
	PRIMARY KEY (codusu, codami),
	FOREIGN KEY (estado) REFERENCES usuario(codusu)
);

-- REGISTRAR NUEVO USUARIO
DELIMITER //
CREATE PROCEDURE sp_register_new_user(
	IN emailIn varchar(21),
	IN passwordIn varchar(21),
	IN nomusuIn varchar(21),
	IN profesionIn varchar(60),
	IN fotoIn varchar(255))

BEGIN
  INSERT INTO usuario(email, password, nomusu, profesion, foto) 
  values(emailIn, passwordIn, nomusuIn, profesionIn, fotoIn);
END //
DELIMITER ;

CALL sp_register_new_user('alvardev@google.com','brasil21','AlvarDev', 'Android Dev', 'https://scontent.fcwb1-1.fna.fbcdn.net/v/t1.0-9/12472824_761620513937453_3396642389945947222_n.jpg?oh=50ade16485988b84cefd506fb36a7c5e&oe=57D1538E');
CALL sp_register_new_user('pao@google.com', 'peru21', 'Pao', 'Software Dev', 'https://scontent.fcwb1-1.fna.fbcdn.net/t31.0-8/q81/s960x960/13041292_1068079236588381_4231572010446298894_o.jpg');

-- LOGIN
DELIMITER //
CREATE PROCEDURE sp_login(
	IN emailIn varchar(21),
	IN passwordIn varchar(21))

BEGIN
  SELECT codusu from usuario where email=emailIn AND password=passwordIn;
END //
DELIMITER ;

CALL sp_login('alvardev@google.com','brasil21');

-- OBTENER PERFIL
DELIMITER //
CREATE PROCEDURE sp_get_profile(
	IN codusuIn int)
BEGIN
  SELECT nomusu, profesion, foto from usuario where codusu=codusuIn;
END //
DELIMITER ;

CALL sp_get_profile(1);

-- BUSCAR USUARIOS
DELIMITER //
CREATE PROCEDURE sp_search_users(
	IN nomusuIn varchar(21))
BEGIN
  SELECT codusu, nomusu, foto from usuario where nomusu like '%'+nomusuIn+'%';
END //
DELIMITER ;

CALL sp_search_users('Pao');

-- ADMINISTRAR AMISTAD
DELIMITER //
CREATE PROCEDURE sp_manage_friendship(
	IN codusuIn int,
    IN codamiIn int,
    IN estadoIn int)
BEGIN
  INSERT INTO amistades (codusu, codami, estado)
  values(codusuIn, codamiIn, estadoIn);
END //
DELIMITER ;

CALL sp_manage_friendship(1, 2 , 3);
CALL sp_manage_friendship(1, 2 , 2);




















