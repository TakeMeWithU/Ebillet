INSERT INTO `client`(`email`, `password`, `civility`, `name`, `firstname`, `address`, `postal_code`, `city`, `country`, `birthday`, `phone`) VALUES
('test@test.com','123456','M','Thomas','Vedis','12 rue dazda','12345','Puil','France','1997/05/11','0605332655'),
('thomas@dzad.com','123456','M','Thomas','Vedis','12 rue dazda','12345','Puil','France','1997/05/11','0605332655'),
('thomdzadas@dzad.com','123456','M','Thomas','Vedis','12 rue dazda','12345','Puil','France','1997/05/11','0605332655');

INSERT INTO `artist`(`name`, `firstname`, `birthday`, `phone`) VALUES
('Charlie','Winston','1978/09/14',NULL),
('Blanche','Gardin','1977/04/03',NULL),
('Mass','Hysteria','1993/01/01',NULL),
('Dropkick','Murphys','1996/01/01',NULL);

INSERT INTO `product`(`image`, `designation`, `address`, `description`, `category`, `sub_category`, `places`, `departure`, `enddate`, `price`) VALUES
('images/products/charlieWinston.jpg','CHARLIE WINSTON', 'La Rochelle',"Ce premier single « The weekend » annonce le retour de Charlie Winston, une chanson ludique et estivale qui raconte comment, le week-end, nous devenons d'autres versions de nous-mêmes. Des prémices à l'image du quatrième album de Charlie Winston à venir « Square 1 », qui traversent les thèmes récurrents chez l'artiste, de l'art de vivre aux sujets plus engagés comme celui des réfugiés politiques.",
'Concert','Pop','200','2018/12/12','2018/12/21','203'),
('images/products/charlieWinston.jpg','CHARLIE WINSTON 2', 'La Rochelle',"Ce premier single « The weekend » annonce le retour de Charlie Winston, une chanson ludique et estivale qui raconte comment, le week-end, nous devenons d'autres versions de nous-mêmes. Des prémices à l'image du quatrième album de Charlie Winston à venir « Square 1 », qui traversent les thèmes récurrents chez l'artiste, de l'art de vivre aux sujets plus engagés comme celui des réfugiés politiques.",
'Concert','Pop','200','2018/12/12','2018/12/21','203'),
('images/products/charlieWinston.jpg','CHARLIE WINSTON 3', 'La Rochelle',"Ce premier single « The weekend » annonce le retour de Charlie Winston, une chanson ludique et estivale qui raconte comment, le week-end, nous devenons d'autres versions de nous-mêmes. Des prémices à l'image du quatrième album de Charlie Winston à venir « Square 1 », qui traversent les thèmes récurrents chez l'artiste, de l'art de vivre aux sujets plus engagés comme celui des réfugiés politiques.",
'Concert','Pop','200','2018/12/12','2018/12/21','203'),
('images/products/charlieWinston.jpg','CHARLIE WINSTON 4', 'La Rochelle',"Ce premier single « The weekend » annonce le retour de Charlie Winston, une chanson ludique et estivale qui raconte comment, le week-end, nous devenons d'autres versions de nous-mêmes. Des prémices à l'image du quatrième album de Charlie Winston à venir « Square 1 », qui traversent les thèmes récurrents chez l'artiste, de l'art de vivre aux sujets plus engagés comme celui des réfugiés politiques.",
'Concert','Pop','200','2018/12/12','2018/12/21','203'),
('images/products/BLANCHE_2018.jpg','BONNE NUIT BLANCHE', 'Paris',"Blanche nous propose son nouveau stand-up, création 2018. Elle n'épargne personne. Même pas ses propres tripes, qu'elle nous livre encore fumantes sur l'autel de l'autodérision. Lire la suite",
'Spectacle','Woman Show','100','2018/11/08',NULL,'103' ),
('images/products/hellfest_2018.png','HELLFEST','Nantes',"Fondé en 2006 sur les cendres du FURYFEST, le festival HELLFEST a été pensé et imaginé par Benjamin Barbaud ( fondateur ) et Yoann Le Neve ( Co-Fondateur ).

Installé depuis 13 ans dans la petite ville de Clisson ( 44 - nantes ), le HELLFEST s'est imposé rapidement comme l'un des leaders des festivals européens qui proposent des musiques extrêmes.

Chaque année, plus de 160 groupes viennent se produire sur les 6 scènes du HELLFEST.",
'Evenement','Festival','1000','2019/06/21','2019/06/23','98');


INSERT INTO `contract`(`artist_id`, `product_id`) VALUES 
(1,1),(1,2),(1,3),(1,4),(2,5),(3,6),(4,6);


INSERT INTO `admin`(`email`, `password`, `name`, `firstname`) VALUES 
('admin@ebillet.com','admin','Admin','Admin');