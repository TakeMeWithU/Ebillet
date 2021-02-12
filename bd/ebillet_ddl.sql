	DROP TABLE IF EXISTS client, artist, product, contract, booking, admin;

	CREATE TABLE client(
		client_id SERIAL PRIMARY KEY,
		avatar VARCHAR(128) DEFAULT 'images/logo_user.png',
		email VARCHAR(128) NOT NULL,
		password VARCHAR(128) NOT NULL,
		civility CHAR(1),
		name VARCHAR(128) NOT NULL,
		firstname VARCHAR(128) NOT NULL,
		address VARCHAR(128), 
		postal_code INTEGER,
		city VARCHAR(32),
		country VARCHAR(32),
		birthday DATE NOT NULL,
		phone CHAR(13)
	);
	CREATE TABLE artist(
		artists_id SERIAL PRIMARY KEY,
		avatar VARCHAR(128) DEFAULT 'images/logo_user.png',
		name VARCHAR(128) NOT NULL,
		firstname VARCHAR(128) NOT NULL,
		birthday DATE NOT NULL,
		phone CHAR(13)

	);

	CREATE TABLE product(
		product_id SERIAL PRIMARY KEY,
		image VARCHAR(128) NOT NULL,
		designation VARCHAR(128) NOT NULL UNIQUE,
		address VARCHAR(128), 
		description TEXT,
		category VARCHAR(64) NOT NULL,
		sub_category VARCHAR(64) NOT NULL,
		places INT NOT NULL,
		departure DATETIME NOT NULL,
		enddate DATETIME ,
		price DOUBLE NOT NULL	

	);

	CREATE TABLE contract(
		contract_id SERIAL PRIMARY KEY,
		artist_id INT REFERENCES artists(artist_id),
		product_id INT REFERENCES products(product_id)
	);

	CREATE TABLE booking(
		booking_id SERIAL PRIMARY KEY,
		client_id INT REFERENCES clients(client_id),
		product_id INT REFERENCES products(product_id),
		total_price DOUBLE NOT NULL,
		quantity INT NOT NULL,
		bookingDate DATETIME DEFAULT CURRENT_TIMESTAMP
	);

	CREATE TABLE admin(
		admin_id SERIAL PRIMARY KEY,
		avatar VARCHAR(128) DEFAULT 'images/logo_user.png',
		email VARCHAR(128) NOT NULL,
		password VARCHAR(128) NOT NULL,
		name VARCHAR(128) NOT NULL,
		firstname VARCHAR(128) NOT NULL
	);
